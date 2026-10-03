<?php
$pageTitle = 'Curso de Fotografia Express';
$pageDesc = 'Curso de Fotografia Express — Edição Caesb. Em 60 minutos, aprenda a olhar com intenção, ler a luz e compor fotos melhores com o celular.';
include __DIR__ . '/includes/header.php';
?>

  <section class="hero home-hero" id="inicio">
    <div class="hero-content">
      <h1>Curso de Fotografia Express</h1>
      <p class="home-edition">EDIÇÃO CAESB · 60 MINUTOS · 4 MÓDULOS</p>
      <p class="hero-subtitle">
        Aprenda a olhar com intenção, entender a luz e compor imagens melhores —
        usando o celular que já está no seu bolso.
      </p>
      <div class="hero-cta-group">
        <a href="material.php#materiais" class="btn btn-primary">
          Ver apostila e podcast
        </a>
        <a href="camera.php" class="btn btn-secondary">
          Praticar com a câmera
        </a>
      </div>
    </div>

    <figure class="hero-film-frame">
      <span class="film-sprockets" aria-hidden="true"></span>
      <img src="assets/galeria/professor/Motocross/img-6093.jpg"
           alt="Pilotos de motocross atravessam uma pista de terra durante a chuva"
           fetchpriority="high">
      <span class="film-sprockets" aria-hidden="true"></span>
      <figcaption><span>ACERVO DO PROFESSOR</span><span>01 / MOTOCROSS</span></figcaption>
    </figure>

    <div class="scroll-indicator">
      <span>DESLIZE PARA EXPLORAR</span>
      <span aria-hidden="true">↓</span>
    </div>
  </section>

  <!-- ========== QUATRO MÓDULOS DO CURSO ========== -->
  <section class="section" id="comece">
    <div class="section-header scroll-reveal">
      <h2>Uma hora. Quatro módulos. Um olhar mais intencional.</h2>
      <p>Uma aula expositiva e prática que vai do momento decisivo à leitura crítica de uma imagem.</p>
    </div>

    <div class="features-grid">
      <div class="feature-card scroll-reveal delay-1">
        <h3>01 · Mentalidade fotográfica</h3>
        <p>O cérebro seleciona; a câmera registra tudo. Fotografar é decidir o que fica dentro e fora do quadro.</p>
      </div>

      <div class="feature-card scroll-reveal delay-2">
        <h3>02 · Ciência da luz</h3>
        <p>Reconheça luz dura e suave, entenda a exposição e escolha a sensação que a luz vai criar.</p>
      </div>

      <div class="feature-card scroll-reveal delay-3">
        <h3>03 · Composição e geometria</h3>
        <p>Crie profundidade e conduza o olhar com terços, linhas-guia, molduras naturais e proporção áurea.</p>
      </div>

      <div class="feature-card scroll-reveal delay-4">
        <h3>04 · Alfabetização visual</h3>
        <p>Leia intenção, luz, linhas, camadas e emoção; leve desafios práticos para continuar treinando.</p>
      </div>
    </div>
  </section>

  <section class="contact-sheet" aria-labelledby="contact-sheet-title">
    <header class="contact-sheet-heading">
      <h2 id="contact-sheet-title">A luz muda. O olhar escolhe.</h2>
      <p>Fotografias do acervo para observar luz, enquadramento e momento.</p>
    </header>
    <div class="contact-sheet-frames">
      <a class="contact-sheet-frame frame-wide" href="galeria.php">
        <img src="assets/galeria/professor/Motocross/img-6093.jpg"
             alt="Motociclistas em uma pista enlameada sob chuva" loading="lazy">
        <span class="frame-caption"><span>01 / MOVIMENTO</span><span>Motocross</span></span>
      </a>
      <a class="contact-sheet-frame" href="galeria.php">
        <img src="assets/galeria/professor/Casamentos-Premiados/jesus-ochoa-71-r41.jpg"
             alt="Casal em uma pose de casamento em preto e branco" loading="lazy">
        <span class="frame-caption"><span>02 / GESTO</span><span>Casamento premiado</span></span>
      </a>
      <a class="contact-sheet-frame" href="galeria.php">
        <img src="assets/galeria/professor/Eventos/acb-18-07-2025-17.jpg"
             alt="Musicista tocando violoncelo em uma apresentação" loading="lazy">
        <span class="frame-caption"><span>03 / LUZ</span><span>Evento</span></span>
      </a>
    </div>
    <a class="text-link" href="galeria.php">Explorar a galeria <span aria-hidden="true">↗</span></a>
  </section>

  <!-- ========== SOBRE O CURSO ========== -->
  <section class="section section-dark" id="sobre">
    <div class="section-inner">
      <div class="section-header scroll-reveal">
        <h2>A melhor câmera é a que está no seu bolso.</h2>
        <p>O celular já permite praticar foco, exposição, luz e composição. A tecnologia ajuda; a intenção continua sendo sua.</p>
      </div>

      <div class="features-grid">
        <div class="feature-card scroll-reveal-left delay-1">
          <h3>Encontre o instante</h3>
          <p>Observe a cena antes de fotografar. Antecipe gestos, espere a luz e escolha o momento decisivo.</p>
        </div>

        <div class="feature-card scroll-reveal delay-2">
          <h3>Leia a luz</h3>
          <p>Janela, sombra aberta e dia nublado suavizam; sol direto e lâmpada nua criam contraste e drama.</p>
        </div>

        <div class="feature-card scroll-reveal-right delay-3">
          <h3>Organize o quadro</h3>
          <p>Use camadas, figura e fundo, pontos fortes e linhas para deixar claro o que você quer mostrar.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="home-next-step">
    <div>
      <h2>Veja o conteúdo e continue praticando.</h2>
    </div>
    <div class="hero-cta-group">
      <a href="material.php#materiais" class="btn btn-primary">Apostila e podcast</a>
      <a href="camera.php" class="btn btn-secondary">Abrir Camera Pro</a>
    </div>
  </section>

  <!-- FOOTER -->
  <?php include __DIR__ . '/includes/footer.php'; ?>