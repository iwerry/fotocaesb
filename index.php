<?php
/**
 * Página inicial — Curso de Fotografia Edição Caesb
 */
require __DIR__ . '/includes/bootstrap.php';

$home = $site['home'];
$hero = $site['hero'];
$yt   = $config['hero_youtube_id'];

// Vídeo local (opcional) tem prioridade sobre o YouTube
$video_local = (string) ($config['hero_video_local'] ?? '');
$usa_video_local = $video_local !== '' && is_file(__DIR__ . '/' . $video_local);

$titulo = null;
include __DIR__ . '/includes/header.php';
?>

<!-- ============================ HERO ============================ -->
<section class="hero">
    <div class="hero-video" aria-hidden="true">
        <?php if ($usa_video_local): ?>
            <video autoplay muted loop playsinline preload="auto">
                <source src="<?= e($video_local) ?>" type="video/mp4">
            </video>
        <?php else: ?>
            <iframe
                src="https://www.youtube.com/embed/<?= e($yt) ?>?autoplay=1&mute=1&loop=1&playlist=<?= e($yt) ?>&controls=0&showinfo=0&rel=0&disablekb=1&modestbranding=1&playsinline=1"
                title="Video de capa"
                frameborder="0"
                allow="autoplay; encrypted-media; picture-in-picture"
                loading="lazy"></iframe>
        <?php endif; ?>
    </div>
    <div class="hero-sobreposicao"></div>

    <div class="hero-conteudo">
        <span class="hero-selo"><?= e($hero['badge']) ?></span>
        <h1><?= e($hero['titulo']) ?></h1>
        <p><?= e($hero['subtitulo']) ?></p>
        <div class="hero-acoes">
            <a class="botao botao-claro" href="<?= e($hero['cta_primario']['url']) ?>"><?= e($hero['cta_primario']['label']) ?></a>
            <a class="botao botao-contorno" href="<?= e($hero['cta_secundario']['url']) ?>" target="_blank" rel="noopener noreferrer"><?= e($hero['cta_secundario']['label']) ?></a>
        </div>
    </div>

    <div class="hero-scroll" aria-hidden="true">
        <span></span>
    </div>
</section>

<!-- ========================= BOAS-VINDAS ========================= -->
<section class="secao secao-boasvindas">
    <div class="envoltorio">
        <h2 class="secao-titulo"><?= e($home['boas_vindas']['titulo']) ?></h2>
        <?php foreach ($home['boas_vindas']['paragrafos'] as $paragrafo): ?>
            <p class="texto-grande"><?= e($paragrafo) ?></p>
        <?php endforeach; ?>
    </div>
</section>

<!-- =========================== ATALHOS =========================== -->
<section class="secao secao-atalhos">
    <div class="envoltorio">
        <h2 class="secao-titulo"><?= e($home['atalhos']['titulo']) ?></h2>
        <div class="grade-cards">
            <?php foreach ($home['atalhos']['itens'] as $item): ?>
                <a class="card card-link" href="<?= e($item['url']) ?>">
                    <span class="card-icone card-icone-<?= e($item['icone']) ?>" aria-hidden="true"></span>
                    <h3><?= e($item['titulo']) ?></h3>
                    <p><?= e($item['texto']) ?></p>
                    <span class="card-continuar">Acessar →</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================= DIFERENCIAIS ======================== -->
<section class="secao secao-diferenciais">
    <div class="envoltorio">
        <h2 class="secao-titulo"><?= e($home['diferenciais']['titulo']) ?></h2>
        <div class="grade-3">
            <?php foreach ($home['diferenciais']['itens'] as $item): ?>
                <div class="card">
                    <h3><?= e($item['titulo']) ?></h3>
                    <p><?= e($item['texto']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========================== NEWSLETTER ========================= -->
<section class="secao secao-newsletter">
    <div class="envoltorio envoltorio-estreito">
        <h2 class="secao-titulo"><?= e($home['newsletter']['titulo']) ?></h2>
        <p><?= e($home['newsletter']['texto']) ?></p>
        <form class="formulario-newsletter" id="formulario-newsletter" novalidate>
            <label class="rotulo-oculto" for="email-newsletter">Seu e-mail</label>
            <input type="email" id="email-newsletter" name="email"
                   placeholder="<?= e($home['newsletter']['placeholder']) ?>" required>
            <button class="botao botao-primario" type="submit"><?= e($home['newsletter']['botao']) ?></button>
        </form>
        <p class="newsletter-mensagem" id="newsletter-mensagem" role="status" aria-live="polite"></p>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
