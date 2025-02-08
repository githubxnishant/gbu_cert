<?php
session_start();
if (!isset($_SESSION["cert_id"])) {
    header("Location: index.php");
    exit();
}
$cert_id = $_SESSION["cert_id"];
$name = $_SESSION['name'];
$date = $_SESSION['date'];
$event = $_SESSION['event'];
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
                <a onclick="redirectToHome()" href="#">Home</a>
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
            <div class="success">
                <p>The certificate with ID <?php echo $cert_id; ?> is valid for <?php echo $name ?> issued on <?php echo $date; ?> at <?php echo $event; ?>.</p>
            </div>
            <div class="btn-div">
                <button id="download-btn" class="btn">Download</button>
                <a href='index.php'><button onclick="redirectToHome()" id="home-btn" class="btn">Home</button></a>
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