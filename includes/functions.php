<?php
/**
 * Funções auxiliares do site.
 */

/** Carrega um arquivo JSON da pasta /data e devolve como array. */
function data_load(string $nome): array
{
    static $cache = [];
    if (isset($cache[$nome])) {
        return $cache[$nome];
    }
    $caminho = defined('DATA_DIR') ? DATA_DIR . '/' . $nome : __DIR__ . '/../data/' . $nome;
    if (!is_file($caminho)) {
        $fallback = __DIR__ . '/data/' . $nome;
        if (is_file($fallback)) {
            $caminho = $fallback;
        } else {
            return $cache[$nome] = [];
        }
    }
    $dados = json_decode((string) file_get_contents($caminho), true);
    return $cache[$nome] = is_array($dados) ? $dados : [];
}

/** Escape seguro para HTML. */
function e(?string $texto): string
{
    return htmlspecialchars((string) $texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** URL do WhatsApp com mensagem pronta. */
function whatsapp_url(string $mensagem = ''): string
{
    global $config;
    $url = 'https://wa.me/' . preg_replace('/\D/', '', (string) $config['whatsapp']);
    if ($mensagem !== '') {
        $url .= '?text=' . rawurlencode($mensagem);
    }
    return $url;
}

/** Título da aba do navegador. */
function titulo_pagina(?string $extra = null): string
{
    global $config;
    $base = $config['site_nome'];
    return $extra ? $extra . ' | ' . $base : $base . ' — ' . $config['professor'];
}

/** Marca o item do menu como ativo. */
function nav_ativo(string $url): string
{
    return basename($_SERVER['SCRIPT_NAME'] ?? '') === $url ? ' class="ativo"' : '';
}

/** Tamanho legível de arquivos. */
function tamanho_legivel(int $bytes): string
{
    if ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 1, ',', '.') . ' MB';
    }
    if ($bytes >= 1024) {
        return number_format($bytes / 1024, 0, ',', '.') . ' KB';
    }
    return $bytes . ' bytes';
}
