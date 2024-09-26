<?php
$conn = new mysqli('localhost', 'root', '', 'HairTime');
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$service=$_POST['service'];
$master=$_POST['master'];
$time=$_POST['time'];
$tel=$_POST['tel'];
$sql="INSERT INTO records(service,master,time,tel) VALUES ('$service','$master','$time','$tel')";
if(mysqli_query($conn,$sql)){
    header('Location:./index.php');
}else{
    echo "Error: " . $mysqli_error($conn);
}
$conn->close()
?>