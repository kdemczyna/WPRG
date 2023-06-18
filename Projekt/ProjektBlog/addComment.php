<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION["is_logged"])) {
        header("Location: login_page.php");
    } else {
        $_SESSION["loggedUserLogin"] = "Guest";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $currentDate = date("Y-m-d");
            $sql = "INSERT INTO comments (Text, Posts_id, CreationDate, Users_id)
VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sisi", $_POST["comment"], $_POST["selectedPost_id"], $currentDate, $_SESSION["loggedUser_id"]);
            $stmt->execute();
            $conn->close();
            header("Location: home_page.php");
        }
    }

?>