<?php
/**
 * Camada de armazenamento local.
 *  - Preferência: SQLite (data/storage/site.sqlite)
 *  - Fallback: arquivo JSON (data/storage/newsletter.json)
 * Usado para as inscrições do formulário de novidades.
 */

function storage_caminho_sqlite(): string
{
    return STORAGE_DIR . '/site.sqlite';
}

function storage_pode_sqlite(): bool
{
    return extension_loaded('pdo_sqlite');
}

/** Garante que a pasta de dados existe. */
function storage_preparar(): void
{
    if (!is_dir(STORAGE_DIR)) {
        @mkdir(STORAGE_DIR, 0775, true);
    }
}

/**
 * Salva uma inscrição de newsletter.
 * Retorna ['ok' => bool, 'mensagem' => string].
 */
function newsletter_inscrever(string $email): array
{
    $email = strtolower(trim($email));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['ok' => false, 'mensagem' => 'E-mail inválido.'];
    }

    storage_preparar();

    if (storage_pode_sqlite()) {
        try {
            $pdo = new PDO('sqlite:' . storage_caminho_sqlite());
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec('CREATE TABLE IF NOT EXISTS newsletter (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT NOT NULL UNIQUE,
                criado_em TEXT NOT NULL
            )');
            $existe = $pdo->prepare('SELECT COUNT(*) FROM newsletter WHERE email = ?');
            $existe->execute([$email]);
            if ((int) $existe->fetchColumn() > 0) {
                return ['ok' => true, 'mensagem' => 'Você já está inscrito(a)!'];
            }
            $insere = $pdo->prepare('INSERT INTO newsletter (email, criado_em) VALUES (?, ?)');
            $insere->execute([$email, date('c')]);
            return ['ok' => true, 'mensagem' => 'Inscrito com sucesso!'];
        } catch (Throwable $erro) {
            // Se o SQLite falhar por qualquer motivo, cai no JSON.
        }
    }

    // ---- Fallback: arquivo JSON -------------------------------------
    $arquivo = STORAGE_DIR . '/newsletter.json';
    $lista = [];
    if (is_file($arquivo)) {
        $lista = json_decode((string) file_get_contents($arquivo), true) ?: [];
    }
    foreach ($lista as $item) {
        if (strcasecmp((string) ($item['email'] ?? ''), $email) === 0) {
            return ['ok' => true, 'mensagem' => 'Você já está inscrito(a)!'];
        }
    }
    $lista[] = ['email' => $email, 'criado_em' => date('c')];
    file_put_contents($arquivo, json_encode($lista, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    return ['ok' => true, 'mensagem' => 'Inscrito com sucesso!'];
}

/** Lista inscrições (para uso administrativo futuro). */
function newsletter_listar(): array
{
    storage_preparar();
    if (storage_pode_sqlite() && is_file(storage_caminho_sqlite())) {
        try {
            $pdo = new PDO('sqlite:' . storage_caminho_sqlite());
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec('CREATE TABLE IF NOT EXISTS newsletter (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT NOT NULL UNIQUE,
                criado_em TEXT NOT NULL
            )');
            return $pdo->query('SELECT email, criado_em FROM newsletter ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $erro) {
            // segue para o JSON
        }
    }
    $arquivo = STORAGE_DIR . '/newsletter.json';
    if (is_file($arquivo)) {
        return json_decode((string) file_get_contents($arquivo), true) ?: [];
    }
    return [];
}
