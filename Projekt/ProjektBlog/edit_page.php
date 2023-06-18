<html>
<head>
    <!-- bootsrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar scroll</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home_page.php">Home</a>
                </li>
                <?php
                session_start();
                if (isset($_SESSION["is_logged"])) {
                    if ($_SESSION["is_logged"] == 1 && $_SESSION["user_type"] == 2) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="addPost_page.php">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="editPost_page.php">Edit Post</a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <?php
        if (!isset($_SESSION["is_logged"])) {
            ?>
            <a class="nav-link active" aria-current="page" href="login_page.php">Login</a>
            <?php
        } else {
            ?>
            <a class="nav-link active" aria-current="page" href="logout.php">Log out</a>
            <?php
        }
        ?>
    </div>
</nav>
<?php
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Text FROM posts WHERE Posts_id=? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST["selectedPost_id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo $_POST["selectedPost_id"];
?>
<div class="container" id="postEdit">
    <form method="POST" action="editPost.php">
        <input type="hidden" name="selectedPost_id" value="<?php echo $_POST["selectedPost_id"] ?>"
        <div class="form-group">
                        <textarea class="form-control" rows="10" cols="8" name="Post"><?php echo $row["Text"]?></textarea>
        </div>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
</div>