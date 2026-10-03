<?php
/**
 * Cabeçalho unificado do site
 * Curso de Fotografia — Edição Caesb
 */
require_once __DIR__ . '/bootstrap.php';

$pagina_atual = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$titulo_final = isset($pageTitle) 
    ? $pageTitle . ' — ' . ($config['site_curto'] ?? 'Curso de Fotografia')
    : ($config['site_nome'] ?? 'Curso de Fotografia — Alfabetização do Olhar');
$descricao_final = $pageDesc ?? 'Curso de Fotografia — Alfabetização do Olhar com o Prof. Daniel Rodrigues. Edição Caesb. Aprenda fotografia de forma leve e no seu próprio ritmo.';

$cssVersion = file_exists(__DIR__ . '/../assets/css/style.css') ? filemtime(__DIR__ . '/../assets/css/style.css') : time();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($titulo_final) ?></title>
  <meta name="description" content="<?= htmlspecialchars($descricao_final) ?>">
  <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
  
  <!-- Fontes Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:wght@400;700&family=IBM+Plex+Mono:wght@400;500;600&family=Oxanium:wght@500;600;700&display=swap" rel="stylesheet">
  
  <!-- Proteção Crítica de Layout (garante fundo escuro e menu sem bullets mesmo antes do CSS carregar) -->
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html, body { background-color: #101719; color: #f1f3ed; font-family: 'Atkinson Hyperlegible', Verdana, sans-serif; line-height: 1.7; }
    .site-header { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; padding: 0.8rem 2rem; display: flex; align-items: center; justify-content: space-between; background: #101719; border-bottom: 1px solid #344447; }
    .logo { color: #f1f3ed; text-decoration: none; font-weight: 700; font-size: 1.1rem; }
    .logo span { color: #f1f3ed; font-weight: 600; }
    .logo .logo-label { color: #78d8ca; font: 500 0.64rem 'IBM Plex Mono', Consolas, monospace; }
    .logo .logo-name { color: #f1f3ed; font-weight: 600; }
    .nav-menu { display: flex; gap: 1.1rem; list-style: none; margin: 0; padding: 0; align-items: center; }
    .nav-menu a { color: #f1f3ed; text-decoration: none; padding: 0.55rem 0.8rem; font-weight: 600; }
    .nav-menu a:hover, .nav-menu a.active { color: #ff7652; background: #202b2d; }
  </style>

  <!-- Folha de estilos com cache-busting automático -->
  <link rel="stylesheet" href="assets/css/style.css?v=<?= $cssVersion ?>">
  <?php if (!empty($extraCss)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($extraCss) ?>?v=<?= $cssVersion ?>">
  <?php endif; ?>
</head>
<body>

  <!-- HEADER NAVEGAÇÃO -->
  <header class="site-header">
    <a href="index.php" class="logo">
      <span class="logo-label">CURSO DE FOTOGRAFIA / CAESB</span>
      <span class="logo-name">Prof. Daniel</span>
    </a>

    <nav aria-label="Navegação principal">
      <ul class="nav-menu" id="menu-principal">
        <li><a href="index.php" class="<?= $pagina_atual === 'index.php' ? 'active' : '' ?>">Início</a></li>
        <li><a href="prof-daniel.php" class="<?= $pagina_atual === 'prof-daniel.php' ? 'active' : '' ?>">Professor</a></li>
        <li><a href="material.php" class="<?= $pagina_atual === 'material.php' ? 'active' : '' ?>">Material</a></li>
        <li><a href="camera.php" class="<?= $pagina_atual === 'camera.php' ? 'active' : '' ?>">Camera Pro</a></li>
        <li><a href="galeria.php" class="<?= $pagina_atual === 'galeria.php' ? 'active' : '' ?>">Galeria</a></li>
      </ul>
    </nav>

    <button class="menu-toggle" type="button" aria-label="Abrir menu de navegação" aria-expanded="false" aria-controls="menu-principal">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </header>