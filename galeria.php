<?php
/**
 * Página: Galeria
 *  - Abas: Fotos do Professor / Fotos dos Alunos
 *  - Categorias com filtros + visualização em tela cheia (lightbox)
 */
require __DIR__ . '/includes/bootstrap.php';

$pagina  = $site['galeria'];
$galeria = data_load('galeria.json');
$titulo  = $pagina['titulo'];
include __DIR__ . '/includes/header.php';

/** Junta categorias com a origem (professor|alunos) para o filtro. */
$lista = [];
foreach (($galeria['professor'] ?? []) as $cat) {
    $cat['origem'] = 'professor';
    $lista[] = $cat;
}
foreach (($galeria['alunos'] ?? []) as $cat) {
    $cat['origem'] = 'alunos';
    $lista[] = $cat;
}
?>

<section class="cabecalho-pagina">
    <div class="envoltorio">
        <h1><?= e($pagina['titulo']) ?></h1>
        <p class="cabecalho-subtitulo"><?= e($pagina['subtitulo']) ?></p>
    </div>
</section>

<section class="secao">
    <div class="envoltorio">

        <!-- Abas -->
        <div class="abas" role="tablist" aria-label="Origem das fotos">
            <button class="aba aba-ativa" type="button" data-aba="professor" role="tab" aria-selected="true">
                <?= e($pagina['aba_professor']) ?>
            </button>
            <button class="aba" type="button" data-aba="alunos" role="tab" aria-selected="false">
                <?= e($pagina['aba_alunos']) ?>
            </button>
        </div>

        <!-- Filtros por categoria -->
        <div class="filtros" id="filtros-galeria">
            <button class="filtro filtro-ativo" type="button" data-categoria="todas"><?= e($pagina['todas']) ?></button>
            <?php foreach ($lista as $cat): ?>
                <button class="filtro" type="button"
                        data-origem="<?= e($cat['origem']) ?>"
                        data-categoria="<?= e($cat['id']) ?>"><?= e($cat['titulo']) ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Grade de fotos -->
        <div class="grade-fotos" id="grade-fotos">
            <?php $indice = 0; ?>
            <?php foreach ($lista as $cat): ?>
                <?php foreach ($cat['fotos'] as $foto): ?>
                    <figure class="foto-miniatura"
                            data-origem="<?= e($cat['origem']) ?>"
                            data-categoria="<?= e($cat['id']) ?>"
                            data-indice="<?= $indice++ ?>"
                            data-full="<?= e($foto['arquivo']) ?>"
                            data-titulo="<?= e($foto['titulo']) ?>"
                            data-categoria-nome="<?= e($cat['titulo']) ?>">
                        <img src="<?= e($foto['arquivo']) ?>" alt="<?= e($foto['titulo']) ?>" loading="lazy">
                        <figcaption><?= e($cat['titulo']) ?></figcaption>
                    </figure>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>

        <p class="dica"><?= e($pagina['legenda']) ?></p>
        <p class="aviso" id="galeria-vazia" hidden><?= e($pagina['vazio']) ?></p>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox" hidden role="dialog" aria-modal="true" aria-label="Foto em tela cheia">
    <button class="lightbox-fechar" type="button" aria-label="Fechar">×</button>
    <button class="lightbox-anterior" type="button" aria-label="Foto anterior">‹</button>
    <figure>
        <img id="lightbox-imagem" src="" alt="">
        <figcaption id="lightbox-legenda"></figcaption>
    </figure>
    <button class="lightbox-proxima" type="button" aria-label="Próxima foto">›</button>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
