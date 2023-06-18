<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "blog");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users set UserType=1 WHERE Users_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST["selectedUser_id"]);
    $stmt->execute();
    $conn->close();
    header("Location: usersManagment_page.php");
}
?>