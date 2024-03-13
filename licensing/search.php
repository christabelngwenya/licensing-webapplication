<?php
if (isset($_POST["submit"])) {
    session_start();
    $_SESSION["search"] = $_POST["search"];
    header("location:display_results.php");
}
