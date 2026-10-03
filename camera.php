<?php
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Camera Pro — Visor e prática';
$pageDesc = 'Pratique enquadramento, luz e composição com a câmera do seu dispositivo. Controles avançados variam conforme o aparelho e o navegador.';
$extraCss = 'assets/css/camera-pro.css';
include __DIR__ . '/includes/header.php';
?>

  <main class="camera-studio" id="camera">
    <header class="camera-studio-heading">
      <div>
        <h1>Camera Pro</h1>
        <p>Uma câmera de aula para experimentar luz, cor e composição em tempo real.</p>
      </div>
      <p class="camera-session-status" id="camera-status" role="status" aria-live="polite">Câmera desligada</p>
    </header>

    <section class="camera-studio-layout" aria-label="Câmera e controles">
      <div class="camera-stage-column">
        <div class="camera-device-shell">
          <div class="camera-device-topline">
            <span class="camera-live-indicator"><span aria-hidden="true"></span><span id="camera-live-label">PRÉVIA LOCAL</span></span>
            <span id="camera-format-label">AGUARDANDO CÂMERA</span>
          </div>

          <div class="camera-viewfinder" id="viewfinder">
      <!-- Vídeo da câmera -->
      <video id="camera-feed" autoplay playsinline muted></video>
      <canvas id="camera-canvas" style="display:none;"></canvas>

      <!-- Efeito de flash ao capturar -->
      <div id="capture-flash"
           style="position:absolute; inset:0; background:white; opacity:0; pointer-events:none; transition:opacity 0.15s ease; z-index:30;">
      </div>

      <!-- ===== OVERLAYS DE COMPOSIÇÃO (transparentes) ===== -->

      <!-- Regra dos Terços -->
      <div class="composition-overlay overlay-thirds" id="overlay-thirds">
        <div class="intersection-dots">
          <div class="dot" style="left:33.33%; top:33.33%;"></div>
          <div class="dot" style="left:66.66%; top:33.33%;"></div>
          <div class="dot" style="left:33.33%; top:66.66%;"></div>
          <div class="dot" style="left:66.66%; top:66.66%;"></div>
        </div>
      </div>

      <!-- Proporção Áurea (Golden Ratio) -->
      <div class="composition-overlay overlay-golden" id="overlay-golden">
        <div class="golden-line v1"></div>
        <div class="golden-line v2"></div>
        <div class="golden-line h1"></div>
        <div class="golden-line h2"></div>
      </div>

      <!-- Espiral de Fibonacci -->
      <div class="composition-overlay overlay-fibonacci" id="overlay-fibonacci">
        <svg viewBox="0 0 100 100" preserveAspectRatio="none">
          <rect x="0" y="0" width="38.2" height="61.8"/>
          <rect x="38.2" y="0" width="23.6" height="38.2"/>
          <rect x="38.2" y="38.2" width="14.6" height="23.6"/>
          <rect x="52.8" y="38.2" width="9" height="14.6"/>
          <path d="M 0,61.8 C 0,61.8 0,100 38.2,100 C 38.2,100 61.8,100 61.8,61.8 C 61.8,61.8 61.8,38.2 38.2,38.2 C 38.2,38.2 38.2,45 45,45 C 45,45 47,45 47,43 C 47,43 47,41 45,41"/>
        </svg>
      </div>

      <!-- Linha do Horizonte -->
      <div class="composition-overlay overlay-horizon" id="overlay-horizon">
        <div class="horizon-line"></div>
        <div class="horizon-label">Horizonte</div>
      </div>

      <!-- Composição Central -->
      <div class="composition-overlay overlay-center" id="overlay-center">
        <div class="center-cross-h"></div>
        <div class="center-cross-v"></div>
        <div class="center-box"></div>
      </div>

      <!-- ===== FERRAMENTAS DO VIEWFINDER ===== -->
      <div class="viewfinder-tools">
        <button class="vf-tool-btn" id="start-camera-btn" type="button" title="Iniciar câmera do dispositivo" aria-label="Iniciar câmera">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h3l1.5-2h8L18 7h2v12H4z"/><circle cx="12" cy="13" r="3"/></svg>
        </button>
        <button class="vf-tool-btn" id="switch-camera-btn" type="button" title="Alternar câmera frontal e traseira" aria-label="Alternar câmera" disabled>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 7v5h-5M4 17v-5h5"/><path d="M5.5 9A7 7 0 0 1 18 6l2 1M18.5 15A7 7 0 0 1 6 18l-2-1"/></svg>
        </button>
      </div>

      <div class="camera-viewfinder-empty" id="camera-empty-state">
        <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 14h7l4-5h10l4 5h7v25H8z"/><circle cx="24" cy="26" r="8"/><path d="M17 14h14"/></svg>
        <h2>Abra uma câmera para começar</h2>
        <p>Abra a câmera principal. Na primeira visita, faça login quando o app solicitar.</p>
        <button class="camera-start-button" id="open-puter-camera" type="button">Abrir câmera principal</button>
        <button class="camera-secondary-action" id="camera-start-inline" type="button">Usar câmera deste aparelho</button>
        <p class="camera-permission-note">A câmera local só é solicitada quando você escolher essa opção. A prévia não usa fotos de exemplo.</p>
      </div>

      <div class="camera-viewfinder-labels" aria-hidden="true"><span>PREVIEW / LIVE</span><span id="preview-size-label">—</span></div>

          </div>
        </div>

        <div class="camera-mode-switch" role="group" aria-label="Modo de captura">
          <button type="button" data-camera-mode="photo" aria-pressed="true" class="active">Foto</button>
          <button type="button" data-camera-mode="video" aria-pressed="false">Vídeo</button>
        </div>

        <div class="shutter-bar">
          <button class="shutter-side-btn" id="switch-camera-tool-btn" type="button" title="Alternar câmera frontal ou traseira" aria-label="Alternar câmera" disabled>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 7v5h-5M4 17v-5h5"/><path d="M5.5 9A7 7 0 0 1 18 6l2 1M18.5 15A7 7 0 0 1 6 18l-2-1"/></svg>
          </button>
          <button class="shutter-btn" id="shutter-btn" type="button" aria-label="Capturar foto"></button>
          <button class="shutter-side-btn" id="camera-power-btn" type="button" aria-label="Iniciar câmera" title="Iniciar câmera">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v9M6.2 6.2a8 8 0 1 0 11.6 0"/></svg>
          </button>
        </div>
        <p class="capture-hint" id="capture-hint" aria-live="polite">Inicie a câmera para começar. Use uma guia para estudar o enquadramento.</p>

        <section class="camera-recorded-result" id="recorded-result" hidden>
          <div class="recorded-result-heading"><h2>Gravação pronta</h2><button type="button" id="close-recording" aria-label="Fechar gravação">Fechar</button></div>
          <video id="recorded-video" controls playsinline></video>
          <a class="camera-secondary-action" id="download-recording" download>Baixar vídeo</a>
        </section>
      </div>

      <aside class="camera-control-console" aria-label="Controles da câmera">
        <section class="camera-control-section">
          <div class="camera-section-heading"><h2>Filtros de cor</h2><span>PRÉVIA</span></div>
          <div class="color-profile-panel" id="filters-carousel" aria-label="Presets de cor">
            <button type="button" class="color-profile-btn profile-auto active" data-profile="auto" aria-pressed="true">Normal</button>
            <button type="button" class="color-profile-btn" data-profile="bw" aria-pressed="false">B&W</button>
            <button type="button" class="color-profile-btn" data-profile="cinematic" aria-pressed="false">Cinematic</button>
            <button type="button" class="color-profile-btn" data-profile="food" aria-pressed="false">Food</button>
            <button type="button" class="color-profile-btn" data-profile="landscape" aria-pressed="false">Landscape</button>
            <button type="button" class="color-profile-btn" data-profile="portrait" aria-pressed="false">Retrato</button>
            <button type="button" class="color-profile-btn" data-profile="night" aria-pressed="false">Night</button>
            <button type="button" class="color-profile-btn" data-profile="vintage" aria-pressed="false">Vintage</button>
            <button type="button" class="color-profile-btn" data-profile="tealorange" aria-pressed="false">Teal-orange</button>
            <button type="button" class="color-profile-btn" data-profile="muted" aria-pressed="false">Muted</button>
            <button type="button" class="color-profile-btn" data-profile="sunset" aria-pressed="false">Sunset</button>
            <button type="button" class="color-profile-btn" data-profile="cool" aria-pressed="false">Cool</button>
          </div>
        </section>

        <section class="camera-control-section">
          <div class="camera-section-heading"><h2>Ajustes da imagem</h2><span>PRÉVIA</span></div>
          <label class="image-adjustment"><span>Exposição</span><output id="brightness-value">100%</output><input type="range" data-image-adjustment="brightness" min="50" max="150" value="100"></label>
          <label class="image-adjustment"><span>Contraste</span><output id="contrast-value">100%</output><input type="range" data-image-adjustment="contrast" min="50" max="150" value="100"></label>
          <label class="image-adjustment"><span>Saturação</span><output id="saturation-value">100%</output><input type="range" data-image-adjustment="saturation" min="0" max="200" value="100"></label>
          <label class="image-adjustment"><span>Tonalidade</span><output id="tint-value">0°</output><input type="range" data-image-adjustment="tint" min="-45" max="45" value="0"></label>
        </section>

        <section class="camera-control-section device-control-section">
          <div class="camera-section-heading"><h2>Controles do aparelho</h2><span>HARDWARE</span></div>
          <p class="device-control-note" id="device-capability-note">Inicie a câmera para detectar os controles oferecidos pelo aparelho.</p>
          <label class="camera-source-select" for="camera-source-select">Lente / câmera
            <select id="camera-source-select" disabled><option value="">Inicie a câmera para detectar</option></select>
          </label>
          <div class="hardware-controls-grid" id="hardware-controls" aria-live="polite"></div>
          <div class="hardware-unavailable" id="hardware-unavailable" hidden></div>
        </section>

        <details class="guide-drawer" id="composition-guides">
          <summary><span>Guias de composição</span><output id="guide-count">0 ativos</output></summary>
          <div class="guide-drawer-content">
            <p>As guias aparecem sobre o visor e podem ser combinadas.</p>
            <div class="overlay-toggles" id="overlay-toggles-bar">
              <button class="overlay-toggle-btn" type="button" data-overlay="thirds" aria-pressed="false">Regra dos terços</button>
              <button class="overlay-toggle-btn" type="button" data-overlay="golden" aria-pressed="false">Proporção áurea</button>
              <button class="overlay-toggle-btn" type="button" data-overlay="fibonacci" aria-pressed="false">Espiral de Fibonacci</button>
              <button class="overlay-toggle-btn" type="button" data-overlay="horizon" aria-pressed="false">Linha do horizonte</button>
              <button class="overlay-toggle-btn" type="button" data-overlay="center" aria-pressed="false">Simetria central</button>
              <button class="overlay-toggle-btn clear-overlays-btn" id="clear-overlays-btn" type="button">Limpar guias</button>
            </div>
          </div>
        </details>

      </aside>
    </section>

    <section class="photo-preview-modal" id="photo-preview-modal" hidden>
      <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="preview-title">
        <div class="modal-header"><h2 id="preview-title">Foto capturada</h2><button class="modal-close-btn" id="close-preview-btn" type="button" aria-label="Fechar prévia">×</button></div>
        <div class="modal-body">
          <img id="preview-photo-img" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="Prévia da captura" hidden>
          <video id="preview-video" controls playsinline hidden></video>
        </div>
        <div class="modal-actions">
          <a id="download-photo-btn" class="botao botao-primario" href="#" download="captura-camera-pro.png">Baixar captura</a>
          <a id="whatsapp-photo-btn" class="botao botao-secundario" href="<?= e(whatsapp_url('Prof. Daniel, acabei de fazer uma captura praticando no curso!')) ?>" target="_blank" rel="noopener noreferrer">Compartilhar no WhatsApp</a>
          <button class="botao botao-secundario" id="retake-photo-btn" type="button">Voltar ao visor</button>
        </div>
      </div>
    </section>
  </main>

  <section class="camera-lesson-strip" aria-labelledby="camera-lesson-title">
    <h2 id="camera-lesson-title">Três decisões antes do clique</h2>
    <dl>
      <div><dt>Intenção</dt><dd>O que entra no quadro? O que você escolhe deixar de fora?</dd></div>
      <div><dt>Luz</dt><dd>Ela está suave ou dura? Que sensação cria na cena?</dd></div>
      <div><dt>Composição</dt><dd>Há camadas ou linhas que conduzem o olhar até o assunto?</dd></div>
    </dl>
  </section>

  <?php 
  $extraJs = [
    'https://js.puter.com/v2/',
    'assets/js/camera-studio.js'
  ];
  include __DIR__ . '/includes/footer.php'; 
  ?>