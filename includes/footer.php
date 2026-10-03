<?php
/**
 * Rodapé unificado do site
 * Curso de Fotografia — Edição Caesb
 */
$whatsapp = $config['whatsapp'] ?? '5561981905720';
$telefone = $config['telefone'] ?? '+55 61 98190-5720';
$instagram = $config['instagram'] ?? 'https://www.instagram.com/danielrodrigues.photography/';
?>
  <footer class="site-footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <h3>Alfabetização do Olhar</h3>
        <p>Um curso de fotografia pensado para quem quer aprender de forma leve, prazerosa e no seu próprio ritmo. Edição Caesb com o Prof. Daniel Rodrigues.</p>
      </div>

      <div class="footer-links">
        <h4>Navegação</h4>
        <ul>
          <li><a href="index.php">Início</a></li>
          <li><a href="prof-daniel.php">Prof. Daniel</a></li>
          <li><a href="material.php">Baixe o Material</a></li>
          <li><a href="camera.php">Camera Pro</a></li>
          <li><a href="galeria.php">Galeria</a></li>
        </ul>
      </div>

      <div class="footer-links">
        <h4>Contato</h4>
        <ul>
          <?php if (!empty($whatsapp)): ?>
          <li><a href="https://wa.me/<?= htmlspecialchars($whatsapp) ?>" target="_blank" rel="noopener noreferrer">WhatsApp do Professor</a></li>
          <?php endif; ?>
          <?php if (!empty($telefone)): ?>
          <li><a href="tel:<?= htmlspecialchars(preg_replace('/\D/', '', $telefone)) ?>"><?= htmlspecialchars($telefone) ?></a></li>
          <?php endif; ?>
          <?php if (!empty($instagram)): ?>
          <li><a href="<?= htmlspecialchars($instagram) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($config['instagram_txt'] ?? '@danielrodrigues.photography') ?></a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p><?= htmlspecialchars($config['footer'] ?? '© 2026 Curso de Fotografia Edição Caesb — Prof. Daniel Rodrigues') ?></p>
      <?php include __DIR__ . '/social-bubbles.php'; ?>
    </div>
  </footer>

  <!-- Scripts Globais -->
  <script src="assets/js/scrollcraft.js"></script>
  <?php if (!empty($extraJs)): ?>
    <?php if (is_array($extraJs)): ?>
      <?php foreach ($extraJs as $script): ?>
        <script src="<?= htmlspecialchars($script) ?>"></script>
      <?php endforeach; ?>
    <?php else: ?>
      <script src="<?= htmlspecialchars($extraJs) ?>"></script>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>