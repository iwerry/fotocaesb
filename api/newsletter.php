<?php
/**
 * API: inscrições do formulário de novidades.
 * POST JSON { "email": "..." }  →  { "ok": true|false, "mensagem": "..." }
 */
declare(strict_types=1);

require __DIR__ . '/../includes/bootstrap.php';

header('Content-Type: application/json; charset=utf-8');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'mensagem' => 'Método não permitido.'], JSON_UNESCAPED_UNICODE);
    exit;
}

$entrada = json_decode((string) file_get_contents('php://input'), true) ?: [];
$email   = trim((string) ($entrada['email'] ?? ''));

$resultado = newsletter_inscrever($email);
http_response_code($resultado['ok'] ? 200 : 400);
echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
