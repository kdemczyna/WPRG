<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = ($_POST["userLogin"]);
    $password = $_POST["userPassword"];

    $sql = "SELECT *  FROM users WHERE Login=? AND Password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["loggedUserFirstName"] = $row["FirstName"];
        $_SESSION["loggedUserLastName"] = $row["LastName"];
        $_SESSION["loggedUser_id"] = $row["Users_id"];
        $_SESSION["user_type"] = $row["UserType"];
        $_SESSION["is_logged"] = 1;
        $_SESSION["loggedUserLogin"] = $login;
        echo "Zalogowano...";
        header('Location: home_page.php');
    } else {
        echo "Błedny login lub hasło";
        header('Location: login_page.php');
    }
}
$conn->close();
?>