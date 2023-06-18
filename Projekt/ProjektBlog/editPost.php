<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE  posts SET Text=? WHERE Posts_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $_POST["Post"], $_POST["selectedPost_id"]);
$stmt->execute();
$conn->close();
header("Location: home_page.php");
}
?>