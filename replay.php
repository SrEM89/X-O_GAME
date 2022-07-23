<html lang="en">
<?php session_start();
include './server.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X-O GAME</title>
    <link rel="stylesheet" href="./style.css">
    <script src="./javascript.js"></script>
</head>

<body>
    <center>
        <br>
        <h2>Replay</h2>
        <?php
        $size = $_SESSION['size']; ?>
        <br>
        <?php
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) { ?>
                <input type="button" class="table-xo" id="xx<?php echo $i . $j ?>" value=" ">
        <?php
            }
            echo "<br>";
        }
        echo "<br>";
        echo "<br>" ?>
        <h5 style="color: red;">*** เริ่มกดที่ 1 จนถึง ลำดับสุดท้าย *** </h5>
        <?php
        $sql = "SELECT * FROM history_play";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $Step = $row['Step'];
            $i = $row['Position_row'];
            $j = $row['Position_col'];
            $Player = $row['Player'];

        ?>
            >> <input type="button" style="width: 40px;" id="OO<?php echo $i . $j ?>" value="<?php echo $Step ?>" onclick="replayed(<?php echo $i ?>,<?php echo $j ?>,'<?php echo $Player ?>')">
        <?php
            if ($Step == 10 || $Step == 20  || $Step == 30 || $Step == 40 || $Step == 50) {
                echo "<br>";
                echo "<br>";
            }
        }
        ?> <br>
        <br>
        <button class="btn" onclick="location.href='./x-o_game.php'">กลับไปหน้าเเรก</button>
    </center>
</body>

</html>