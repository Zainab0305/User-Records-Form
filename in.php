<?php
require 'config.php'; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
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

    $conn->query($sql);
    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
}

$result = $conn->query("SELECT ID, Name, Age, Status FROM users ORDER BY ID ASC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Records</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>

<h2>User Records</h2>

<table id="usersTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['ID']) ?></td>
            <td><?= htmlspecialchars($row['Name']) ?></td>
            <td><?= htmlspecialchars($row['Age']) ?></td>
            <td id="status-<?= $row['ID'] ?>"><?= $row['Status'] ?></td>
            <td>
                <button type="button" onclick="toggleStatus(<?= $row['ID'] ?>)">Toggle</button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="script.js"></script>

</body>
</html>
<?php $conn->close(); ?>