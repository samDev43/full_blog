<?php 
    include('controller/AultUserControler.php');
$con = new action();
$conn = $con->con();
if (isset($_GET['username'])) {
    $username = $conn->real_escape_string($_GET['username']);
    $query = "SELECT * FROM project WHERE username LIKE '%$username%' LIMIT 10";
    $result = $conn->query($query);

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    echo json_encode($users);
}

$conn->close();
?>