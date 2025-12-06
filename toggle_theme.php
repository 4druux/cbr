<?php
session_start();

if (isset($_SESSION["theme"]) && $_SESSION["theme"] == "dark") {
    $_SESSION["theme"] = "light";
} else {
    $_SESSION["theme"] = "dark";
}

if (isset($_GET["redirect"])) {
    header("Location: " . $_GET["redirect"]);
} else {
    header("Location: index.php");
}
exit();
?>
