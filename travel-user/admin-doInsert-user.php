<?php
require_once("../db-connect2.php");

if (!isset($_POST["name"])) {
    echo "請循正常管道進入本頁";
    exit;
}
$account = $_POST["account"];
$password = $_POST["password"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

// date_default_timezone_set("Asia/Taipei");
$now = date('Y-m-d H:i:s');

// echo "$name, $phone, $email, $now";

$sql = "INSERT INTO users (account,password,name ,phone, email, created_at,valid)
VALUES ('$account','$password','$name', '$phone', '$email', '$now',1)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "新增資料完成, id: $last_id";
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

header("location: admin.php");
