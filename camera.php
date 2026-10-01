<?php
/**
 * Página: Camera
 *  - Abre a Camera do Puter (Puter.js) com alternativas locais
 *  - Material de leitura "Conheça sua Camera"
 */
require __DIR__ . '/includes/bootstrap.php';

$pagina   = $site['camera'];
$material = data_load('camera.json')['secoes'] ?? [];
$titulo   = $pagina['titulo'];
include __DIR__ . '/includes/header.php';
?>

<section class="cabecalho-pagina">
    <div class="envoltorio">
        <h1><?= e($pagina['titulo']) ?></h1>
        <p class="cabecalho-subtitulo"><?= e($pagina['subtitulo']) ?></p>
    </div>
</section>

<!-- ===================== ABRIR A CAMERA (PUTER) ===================== -->
<section class="secao secao-camera">
    <div class="envoltorio envoltorio-estreito">
        <div class="painel-camera">
            <h2 class="secao-titulo">Sua Camera, aqui mesmo</h2>

            <div class="camera-acoes">
                <button class="botao botao-primario botao-grande" id="abrir-camera-puter" type="button">
                    📷 <?= e($pagina['botao']) ?>
                </button>
                <button class="botao botao-secundario" id="conectar-puter" type="button">
                    <?= e($pagina['botao_conectar']) ?>
                </button>
                <button class="botao botao-secundario" id="abrir-camera-local" type="button">
                    Usar a Camera do meu aparelho
                </button>
            </div>

            <p class="camera-status" id="camera-status" role="status" aria-live="polite"></p>

            <!-- Camera local (usada como alternativa, sem cadastro) -->
            <div class="camera-local" id="camera-local" hidden>
                <video id="camera-local-video" autoplay playsinline muted></video>
                <canvas id="camera-local-canvas" hidden></canvas>
                <div class="camera-acoes">
                    <button class="botao botao-primario" id="camera-local-capturar" type="button">Tirar foto</button>
                    <a class="botao botao-secundario" id="camera-local-baixar" download="foto-do-curso.jpg" hidden>Baixar foto</a>
                    <a class="botao botao-whatsapp" id="camera-local-whatsapp" target="_blank" rel="noopener noreferrer" hidden>Enviar pelo WhatsApp</a>
                    <button class="botao botao-secundario" id="camera-local-fechar" type="button">Fechar Camera</button>
                </div>
            </div>

            <h3><?= e($pagina['ajuda_titulo']) ?></h3>
            <ol class="lista-numerada">
                <?php foreach ($pagina['ajuda'] as $passo): ?>
                    <li><?= e($passo) ?></li>
                <?php endforeach; ?>
            </ol>

            <p class="dica"><?= e($pagina['aviso']) ?></p>
        </div>
    </div>
</section>

<!-- ====================== MATERIAL DE LEITURA ====================== -->
<section class="secao secao-clara">
    <div class="envoltorio">
        <h2 class="secao-titulo"><?= e($pagina['material_titulo']) ?></h2>
        <p class="texto-grande"><?= e($pagina['material_subtitulo']) ?></p>

        <?php foreach ($material as $secao): ?>
            <article class="material-bloco">
                <h3><?= e($secao['titulo']) ?></h3>
                <?php if (!empty($secao['introducao'])): ?>
                    <p class="texto-grande"><?= e($secao['introducao']) ?></p>
                <?php endif; ?>

                <?php if (!empty($secao['destaque'])): ?>
                    <blockquote class="citacao"><?= e($secao['destaque']) ?></blockquote>
                <?php endif; ?>

                <?php if (!empty($secao['itens'])): ?>
                    <div class="grade-2">
                        <?php foreach ($secao['itens'] as $item): ?>
                            <div class="card card-material">
                                <h4><?= e($item['titulo']) ?></h4>
                                <p><?= e($item['texto']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>

        <p class="dica"><?= e($pagina['creditos']) ?></p>
    </div>
</section>

<script src="<?= e($config['puter_script']) ?>"></script>
<script src="assets/js/camera-puter.js"></script>
<?php include __DIR__ . '/includes/footer.php'; ?>
