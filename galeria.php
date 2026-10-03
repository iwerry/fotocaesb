<?php
/**
 * Página: Galeria de Fotos
 * Curso de Fotografia — Edição Caesb
 */
require_once __DIR__ . '/includes/bootstrap.php';

$galeriaRaw = data_load('galeria.json');

// Processar fotos e categorias organizadas
$todasFotos = [];
$categorias = []; // slug => nome

// 1. Fotos do professor
foreach ($galeriaRaw['professor'] ?? [] as $secao) {
    $slug = $secao['id'] ?? 'professor';
    $nomeCategoria = $secao['titulo'] ?? ucfirst($slug);
    $categorias[$slug] = $nomeCategoria;

    foreach ($secao['fotos'] ?? [] as $f) {
        $arquivo = $f['arquivo'] ?? '';
        if ($arquivo && is_file(__DIR__ . '/' . $arquivo)) {
            $todasFotos[] = [
                'categoria'      => $slug,
                'categoria_nome' => $nomeCategoria,
                'arquivo'        => $arquivo,
                'titulo'         => !empty($f['titulo']) ? $f['titulo'] : $nomeCategoria,
                'descricao'      => $secao['descricao'] ?? ''
            ];
        }
    }
}

// 2. Fotos dos alunos
foreach ($galeriaRaw['alunos'] ?? [] as $secao) {
    $slug = 'alunos';
    $nomeCategoria = 'Alunos Caesb';
    $categorias[$slug] = $nomeCategoria;

    foreach ($secao['fotos'] ?? [] as $f) {
        $arquivo = $f['arquivo'] ?? '';
        if ($arquivo && is_file(__DIR__ . '/' . $arquivo)) {
            $todasFotos[] = [
                'categoria'      => $slug,
                'categoria_nome' => $secao['titulo'] ?? 'Trabalho de Aluno',
                'arquivo'        => $arquivo,
                'titulo'         => !empty($f['titulo']) ? $f['titulo'] : ($secao['titulo'] ?? 'Aluno Caesb'),
                'descricao'      => $secao['descricao'] ?? ''
            ];
        }
    }
}

$pageTitle = 'Galeria — Fotos Para Estudar de Perto';
$pageDesc = 'Observe a luz, o enquadramento e o momento de cada imagem. Casamentos premiados, estudos de caso e trabalhos dos alunos do Curso de Fotografia.';

include __DIR__ . '/includes/header.php';
?>

  <!-- HERO MINI -->
  <section class="hero page-hero" style="min-height: 48vh; padding: 8.5rem 2rem 3rem;">
    <div class="hero-content scroll-reveal">
      <h1>Estudo de casos</h1>
      <p class="hero-subtitle">
        Observe a luz, o enquadramento e o momento de cada imagem.
        Cada foto é uma aula viva de alfabetização do olhar.
      </p>
    </div>
  </section>

  <!-- FILTROS -->
  <div class="galeria-filtros scroll-reveal" style="margin-top: 3rem;">
    <button class="filtro-btn active" data-filter="todos">Todas (<?= count($todasFotos) ?>)</button>
    <?php foreach ($categorias as $slug => $nome): ?>
      <button class="filtro-btn" data-filter="<?= htmlspecialchars($slug) ?>">
        <?= htmlspecialchars($nome) ?>
      </button>
    <?php endforeach; ?>
  </div>

  <!-- GRID DA GALERIA -->
  <section class="section" style="padding-top: 1rem;">
    <?php if (empty($todasFotos)): ?>
      <div class="aviso" style="max-width: 600px; margin: 2rem auto;">
        As imagens da galeria estão sendo sincronizadas. Volte em instantes!
      </div>
    <?php else: ?>
      <div class="galeria-grid">
        <?php foreach ($todasFotos as $foto): ?>
        <div class="galeria-item scroll-reveal-scale"
             data-category="<?= htmlspecialchars($foto['categoria']) ?>">
          <img
            data-src="<?= htmlspecialchars($foto['arquivo']) ?>"
            alt="<?= htmlspecialchars($foto['titulo']) ?>"
            loading="lazy"
          />
          <div class="overlay">
            <h4><?= htmlspecialchars($foto['categoria_nome']) ?></h4>
            <p><?= htmlspecialchars($foto['descricao']) ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- LIGHTBOX -->
  <div class="lightbox" id="lightbox">
    <button class="lightbox-close" id="lightbox-close" aria-label="Fechar ampliação">✕</button>
    <img id="lightbox-img" src="assets/galeria/professor/Motocross/img-6093.jpg" alt="Foto ampliada da galeria" />
  </div>

  <?php 
  $extraJs = 'assets/js/galeria.js';
  include __DIR__ . '/includes/footer.php'; 
  ?>