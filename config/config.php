<?php
/**
 * ============================================================
 *  Configuração geral do site
 *  Curso de Fotografia — Edição Caesb — Prof. Daniel Rodrigues
 * ============================================================
 *  Edite apenas este arquivo para ajustar contatos e ajustes
 *  globais. Os textos das páginas ficam em /data/*.json
 */

return [
    // ---- Identidade -----------------------------------------------------
    'site_nome'   => 'Curso de Fotografia — Edição Caesb',
    'site_curto'  => 'Curso de Fotografia',
    'professor'   => 'Prof. Daniel Rodrigues',

    // ---- Canais de contato ----------------------------------------------
    'whatsapp'    => '5561981905720',                       // só números, com DDI
    'whatsapp_txt'=> 'Fale com o Prof. Daniel',
    'telefone'    => '+55 61 98190-5720',                  // texto exibido
    'telefone_link'=> 'tel:+5561981905720',
    'instagram'   => 'https://www.instagram.com/danielrodrigues.photography/',
    'instagram_txt'=> '@danielrodrigues.photography',

    // ---- Rodapé ---------------------------------------------------------
    'footer'      => '© 2026 Curso de Fotografia Edição Caesb - Prof. Daniel Rodrigues',

    // ---- Puter (Câmera em nuvem) ---------------------------------------
    // Para usar a Câmera do Puter é preciso ter/criar uma conta Puter.
    'puter_script' => 'https://js.puter.com/v2/',
    'puter_camera_app' => 'camera',                        // nome do app no Puter
    'puter_camera_url'  => 'https://puter.com/app/camera',  // abertura direta (fallback)

    // ---- Caminhos -------------------------------------------------------
    'data_dir'    => __DIR__ . '/../data',
    'storage_dir' => __DIR__ . '/../data/storage',
];
