<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';

$nome = trim($_POST['nome'] ?? '');
$presenca = $_POST['presenca'] ?? '';

if ($nome === '' || !in_array($presenca, ['Sim','Não'])) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos.']);
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'] ?? '';

$stmt = $mysqli->prepare("INSERT INTO rsvps (nome, presenca, ip) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $presenca, $ip);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Obrigado! Sua presença foi registrada.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao salvar.']);
}
$stmt->close();
