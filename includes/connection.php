<?php
$sitename = "AUTOMATED PRODUCT REVIEW USING NATURAL LANGUAGE PROCESSING ON CUSTOMER FEEDBACK";
$conn = mysqli_connect("localhost", "root", "", "carreview");
if (!$conn) {
    die(mysqli_error($conn) . "Error connecting Database!");
}
?>