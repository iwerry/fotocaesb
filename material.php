<?php
/**
 * Página: Baixe o Material
 */
require __DIR__ . '/includes/bootstrap.php';

$pagina    = $site['material'];
$materiais = data_load('materiais.json')['itens'] ?? [];
$titulo    = $pagina['titulo'];
include __DIR__ . '/includes/header.php';
?>

<section class="cabecalho-pagina">
    <div class="envoltorio">
        <h1><?= e($pagina['titulo']) ?></h1>
        <p class="cabecalho-subtitulo"><?= e($pagina['subtitulo']) ?></p>
    </div>
</section>

<section class="secao">
    <div class="envoltorio">
        <?php if (!$materiais): ?>
            <p class="aviso"><?= e($pagina['vazio']) ?></p>
        <?php else: ?>
            <div class="grade-cards">
                <?php foreach ($materiais as $item): ?>
                    <?php
                    $arquivo = $item['arquivo'];
                    $existe  = is_file(__DIR__ . '/' . $arquivo);
                    $tamanho = $existe ? tamanho_legivel((int) filesize(__DIR__ . '/' . $arquivo)) : '';
                    ?>
                    <div class="card card-material">
                        <span class="card-etiqueta"><?= e($item['tipo']) ?><?= $tamanho ? ' · ' . e($tamanho) : '' ?></span>
                        <h3><?= e($item['titulo']) ?></h3>
                        <p><?= e($item['descricao']) ?></p>
                        <?php if ($existe): ?>
                            <a class="botao botao-primario" href="<?= e($arquivo) ?>" download>
                                Baixar material
                            </a>
                        <?php else: ?>
                            <span class="aviso">Arquivo ainda não disponível.</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <p class="dica"><?= e($pagina['dica']) ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="secao secao-clara">
    <div class="envoltorio envoltorio-estreito">
        <h2 class="secao-titulo">E depois de ler?</h2>
        <p class="texto-grande">
            Pratique! Abra a página <a href="camera.php">Camera</a>, leia o material da Camera e
            clique para abrir a Camera do Puter. Fotografando é que o olhar se acostuma.
        </p>
        <div class="hero-acoes">
            <a class="botao botao-primario" href="camera.php">Ir para a Camera</a>
            <a class="botao botao-secundario" href="galeria.php">Ver a Galeria</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
