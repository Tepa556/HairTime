<?php  
$conn = new mysqli("localhost", "root", "", "HairTime"); 

// Проверка подключения 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

$postid = $_POST['news_id']; 

$sql = "DELETE FROM news WHERE id=$postid"; 

if ($conn->query($sql) === TRUE) {
    header('Location: ../admin-panel'); 
    exit;
} else {
    echo "Ошибка удаления записи: " . $conn->error;
}

$conn->close(); 
?>
