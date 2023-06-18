<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "blog");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM  comments WHERE Posts_id=? AND Comments_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $_POST["selectedPost_id"], $_POST["selectedComment_id"]);
    $stmt->execute();
    $conn->close();
    header("Location: commentsManagment_page.php");
}
?>