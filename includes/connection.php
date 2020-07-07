<?php
$sitename = "Book Reviews Analysis Using Opinion Mining";
$conn = mysqli_connect("localhost", "root", "", "bookanalysis");
if (!$conn) {
    die(mysqli_error($conn) . "Error connecting Database!");
}
?>