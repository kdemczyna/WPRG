<?php
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $login = $_POST["login"];
}
$sql = "SELECT Login, Email  FROM users WHERE Login=? OR Email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $login, $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Istnieje już taki użytkownik";
    header('Location: register_page.php');
}
else {
    $sql = "INSERT INTO users (Login, Password, FirstName, LastName, Email)
VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $login, $password, $firstName, $lastName, $email);
    $stmt->execute();
    header('Location: login_page.php');
}
