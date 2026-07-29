<?php
require 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['toggle'])) {
    $id = $_GET['toggle'];

    $sql = "UPDATE users SET Status = 1 - Status WHERE ID = '$id'";
    $conn->query($sql);

    $result = $conn->query("SELECT Status FROM users WHERE ID = '$id'");
    $row = $result->fetch_assoc();

    echo $row['Status'];
    exit;
}

if (isset($_GET['Name'], $_GET['Age']) && $_GET['Name'] !== '' && $_GET['Age'] !== '') {
    $name = $_GET['Name'];
    $age = $_GET['Age'];

    $sql = "INSERT INTO users (ID, Name, Age, Status)
    VALUES ('', '$name', '$age', '0')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "ok";
    // } else {
    //     echo "error: " . $conn->error;
    // }
    // exit;
}

if (isset($_GET['list'])) {
    header('Content-Type: application/json');
    $result = $conn->query("SELECT ID, Name, Age, Status FROM users ORDER BY ID ASC");
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
    exit;
}

$conn->close();