<?php
/**
 * Página: Prof. Daniel
 */
require __DIR__ . '/includes/bootstrap.php';

$pagina = $site['prof_daniel'];
$titulo = $pagina['titulo'];
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
        <div class="duas-colunas">
            <figure class="foto-professor">
                <img src="assets/img/daniel-capa.jpg" alt="Professor Daniel Rodrigues" loading="lazy">
                <figcaption><?= e($config['professor']) ?></figcaption>
            </figure>

            <div class="texto-professor">
                <?php foreach ($pagina['paragrafos'] as $paragrafo): ?>
                    <p class="texto-grande"><?= e($paragrafo) ?></p>
                <?php endforeach; ?>

                <blockquote class="citacao">
                    “<?= e($pagina['citacao']) ?>”
                    <cite>— <?= e($config['professor']) ?></cite>
                </blockquote>

                <ul class="lista-destaques">
                    <?php foreach ($pagina['destaques'] as $destaque): ?>
                        <li><?= e($destaque) ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="hero-acoes">
                    <a class="botao botao-primario" href="<?= e(whatsapp_url('Olá, Prof. Daniel! Vim pelo site do Curso de Fotografia.')) ?>"
                       target="_blank" rel="noopener noreferrer"><?= e($pagina['cta']) ?></a>
                    <a class="botao botao-secundario" href="<?= e($config['instagram']) ?>" target="_blank" rel="noopener noreferrer">
                        Instagram: <?= e($config['instagram_txt']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="secao secao-clara">
    <div class="envoltorio">
        <h2 class="secao-titulo">Um convite do professor</h2>
        <p class="texto-grande">
            Fotografar é um prazer que não tem idade. Se ficou com qualquer dúvida, mande uma mensagem
            no WhatsApp — será um prazer conversar com você.
        </p>
        <div class="hero-acoes">
            <a class="botao botao-primario" href="<?= e(whatsapp_url()) ?>" target="_blank" rel="noopener noreferrer">Chamar no WhatsApp</a>
            <a class="botao botao-secundario" href="material.php">Baixar o material</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
