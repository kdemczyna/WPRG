<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentDate = date("Y-m-d");
    $sql = "INSERT INTO posts (Text, Users_id, CreationDate)
VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $_POST["newPost"], $_SESSION["loggedUser_id"], $currentDate);
    $stmt->execute();
    $conn->close();
    header("Location: home_page.php");
}

?>