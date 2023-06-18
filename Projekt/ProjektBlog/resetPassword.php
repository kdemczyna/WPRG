<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["oldPassword"];

    $sql = "SELECT *  FROM users WHERE Login=? AND Password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_SESSION["loggedUserLogin"], $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $sql = "UPDATE users SET Password = ? WHERE Users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $_POST["newPassword"], $_SESSION["loggedUser_id"]);
        $stmt->execute();
        $result = $stmt->get_result();


        echo "Succesfuly changed password";
        header('Location: home_page.php');
    } else {
        echo "Błedny login lub hasło";
        header('Location: login_page.php');
    }
}
$conn->close();
?>