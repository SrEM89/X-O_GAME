<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "X-O_GAME";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (isset($_GET['i'])) {
    $sql = "SELECT MAX(Step) as MaxStep FROM history_play";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $order = $row['MaxStep'];
        $order += 1;
    }
    $i = $_GET['i'];
    $j = $_GET['j'];
    $player = $_GET['p'];
    $sql = "INSERT INTO `history_play`(`Step`, `Player`, `Position_row`,`Position_col`) VALUES ('$order', '$player','$i','$j') ";
    mysqli_query($conn, $sql);
}
