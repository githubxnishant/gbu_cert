<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cert_id = $_POST["cert_id"];

    // Secure query to check certificate existence
    $stmt = $conn->prepare("SELECT name, date, event FROM certificates WHERE cert_id = ?");
    $stmt->bind_param("s", $cert_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["name"] = $row["name"];
        $_SESSION["date"] = $row["date"];
        $_SESSION["event"] = $row["event"];
        $_SESSION["cert_id"] = $cert_id;
        header("Location: success.php");
        exit();
    } else {
        $_SESSION["cert_id"] = $cert_id;
        header("Location: error.php"); 
        exit();
    }
}
session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GBU Certificate Validation</title>
    <link rel="icon" type="image/svg+xml" href="assets/gbu_logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="top-header">
            <p>GBU Certification Authentication</p>
            <a href="https://gbu.ac.in/">Main Website</a>
        </div>
        <div class="bottom-header">
            <a href="https://gbu.ac.in/">
                <img src="assets/fulllogogbu.png" />
            </a>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="#">Abhivyanjana</a>
                <a href="#">Glitch</a>
                <a href="#">Shauryautsav</a>
            </div>
        </div>
    </header>

    <!-- Background Image -->
    <section class="bg-img">
        <img src="assets/Gautam_Buddha_University.jpg"/>
    </section>

    <!-- Main Form -->
    <main>
        <section class="main-div">
            <div class="img-div">
                <img src="assets/gbu_logo.png">
            </div>
            <div class="headline">
                <p>GBU Certificate Authentication</p>
            </div>
            <div class="input">
                <form method="post">
                    <input required type="text" name="cert_id" maxlength="10" placeholder="Certificate ID" />
                    <button type="submit" id="verify-btn" class="btn">Verify</button>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer">
            <p>© 2025 - Gautam Buddha University | Designed & Developed by <a href="https://linktr.ee/linkxnishant" class="admin">Nishant Chauhan</a></p>
        </div>
    </footer>
</body>
</html>
