<?php
/**
 * Inicialização comum a todas as páginas.
 */
declare(strict_types=1);

$config = require __DIR__ . '/../config/config.php';

if (!defined('DATA_DIR')) {
    define('DATA_DIR', $config['data_dir']);
}
if (!defined('STORAGE_DIR')) {
    define('STORAGE_DIR', $config['storage_dir']);
}

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/storage.php';

$site = data_load('site.json');

// Página corrente (para destacar o menu)
$pagina_atual = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
