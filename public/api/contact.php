<?php
/**
 * Ecoprotección — Stub de contacto.
 *
 * Por ahora recibe el JSON del formulario y devuelve éxito.
 * Cuando se conecte a php-api de sendly.com.ar reemplazar el bloque marcado.
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'method_not_allowed']);
    exit;
}

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true) ?: $_POST;

// Honeypot
if (!empty($data['honey'])) {
    echo json_encode(['ok' => true]);
    exit;
}

$required = ['nombre', 'telefono', 'servicio'];
foreach ($required as $field) {
    if (empty(trim((string)($data[$field] ?? '')))) {
        http_response_code(422);
        echo json_encode(['ok' => false, 'error' => 'missing_field', 'field' => $field]);
        exit;
    }
}

$payload = [
    'fecha'    => date('c'),
    'nombre'   => substr(trim($data['nombre']), 0, 120),
    'telefono' => substr(trim($data['telefono']), 0, 40),
    'email'    => substr(trim((string)($data['email'] ?? '')), 0, 160),
    'servicio' => substr(trim($data['servicio']), 0, 80),
    'zona'     => substr(trim((string)($data['zona'] ?? '')), 0, 120),
    'mensaje'  => substr(trim((string)($data['mensaje'] ?? '')), 0, 2000),
    'ip'       => $_SERVER['REMOTE_ADDR'] ?? '',
    'ua'       => $_SERVER['HTTP_USER_AGENT'] ?? '',
];

/* ------------------------------------------------------------------
 * TODO: Reemplazar este bloque con la integración a
 *       https://sendly.com.ar/php-api (mismo patrón que otros projects)
 * ------------------------------------------------------------------ */
$logDir = __DIR__ . '/_logs';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0775, true);
}
@file_put_contents(
    $logDir . '/contact-' . date('Y-m') . '.log',
    json_encode($payload, JSON_UNESCAPED_UNICODE) . PHP_EOL,
    FILE_APPEND
);

echo json_encode([
    'ok'      => true,
    'message' => 'Recibido. Te contactamos en menos de 24 hs.',
]);
