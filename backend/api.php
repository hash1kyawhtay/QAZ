# backend/api.php
<?php
header('Content-Type: application/json');

$endpoint = $_GET['endpoint'] ?? '';

$data = [
    'data1' => ['id' => 1, 'message' => 'Hello from data1'],
    'data2' => ['id' => 2, 'message' => 'Hello from data2'],
    'data3' => ['id' => 3, 'message' => 'Hello from data3'],
];

if (array_key_exists($endpoint, $data)) {
    echo json_encode($data[$endpoint]);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}
