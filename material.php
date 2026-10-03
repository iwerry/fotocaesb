<?php
/**
 * Página: Baixe o Material Didático
 * Curso de Fotografia — Edição Caesb
 */
require_once __DIR__ . '/includes/bootstrap.php';

$pagina = $site['material'] ?? [
    'titulo' => 'Apostila e podcast',
    'subtitulo' => 'Baixe o PDF do Curso de Fotografia Express e ouça no site o podcast Do olhar biológico à fotografia intencional.',
    'vazio' => 'Os materiais do curso estarão disponíveis em breve.',
    'dica' => 'Leia a apostila ou ouça o episódio e depois pratique os exercícios com o celular.'
];

$materiais = data_load('materiais.json')['itens'] ?? [];

$pageTitle = $pagina['titulo'];
$pageDesc = $pagina['subtitulo'];
$extraJs = 'assets/js/material-player.js';

include __DIR__ . '/includes/header.php';
?>

<section class="cabecalho-pagina">
    <div class="envoltorio scroll-reveal">
        <h1><?= e($pagina['titulo']) ?></h1>
        <p class="cabecalho-subtitulo"><?= e($pagina['subtitulo']) ?></p>
    </div>
</section>

<section class="secao" id="materiais">
    <div class="envoltorio">
        <?php if (empty($materiais)): ?>
            <p class="aviso"><?= e($pagina['vazio']) ?></p>
        <?php else: ?>
            <div class="grade-cards">
                <?php foreach ($materiais as $index => $item): ?>
                    <?php
                    $arquivo = $item['arquivo'];
                    $existe  = is_file(__DIR__ . '/' . $arquivo);
                    $tamanho = $existe ? tamanho_legivel((int) filesize(__DIR__ . '/' . $arquivo)) : '';
                    $ehAudio = strtoupper((string) ($item['tipo'] ?? '')) === 'MP3';
                    $delayClass = 'delay-' . (($index % 3) + 1);
                    ?>
                    <div class="card-material material-card scroll-reveal <?= $delayClass ?><?= $ehAudio ? ' material-audio-card' : '' ?>">
                        <span class="card-etiqueta"><?= e($item['tipo']) ?><?= $tamanho ? ' · ' . e($tamanho) : '' ?></span>
                        <h3><?= e($item['titulo']) ?></h3>
                        <p><?= e($item['descricao']) ?></p>
                        <?php if ($existe): ?>
                            <?php if ($ehAudio): ?>
                                <?php $audioId = 'material-audio-' . (int) $index; ?>
                                <div class="material-audio-player">
                                    <audio id="<?= e($audioId) ?>" controls controlsList="nodownload" preload="none">
                                        <source src="<?= e($arquivo) ?>" type="audio/mpeg">
                                        Seu navegador não oferece suporte à reprodução de áudio.
                                    </audio>
                                    <div class="audio-speed-control">
                                        <label for="audio-speed-<?= (int) $index ?>">Velocidade</label>
                                        <select id="audio-speed-<?= (int) $index ?>" data-audio-player="<?= e($audioId) ?>">
                                            <option value="1" selected>1×</option>
                                            <option value="1.25">1,25×</option>
                                            <option value="1.5">1,5×</option>
                                            <option value="1.75">1,75×</option>
                                            <option value="2">2×</option>
                                        </select>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a class="botao botao-primario" href="<?= e($arquivo) ?>" download>
                                    Baixar apostila
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <span class="aviso">Arquivo em atualização.</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="dica scroll-reveal">
                <strong>Dica do professor:</strong> <?= e($pagina['dica']) ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="secao secao-clara scroll-reveal">
    <div class="envoltorio envoltorio-estreito" style="text-align: center;">
        <h2 class="secao-titulo">Depois da aula, pratique</h2>
        <p class="texto-grande">
            Experimente foco, exposição e linhas de composição na Camera Pro ou observe luz, gesto e enquadramento na galeria.
        </p>
        <div class="hero-acoes" style="justify-content: center; margin-top: 2rem;">
            <a class="botao botao-primario" href="camera.php">
                Praticar na Camera Pro
            </a>
            <a class="botao botao-secundario" href="galeria.php">
                Estudar a galeria
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
