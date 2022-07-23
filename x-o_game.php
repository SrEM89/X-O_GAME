<html lang="en">
<?php
session_start();
include './server.php';
$size_game = false;
?>

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
        <div id="play">
            <form action="x-o_game.php" method="POST">
                <div class="input">
                    เลือกขนาดบอร์ด:
                    <select name='size'>
                        <option value="0">Select Size:</option>
                        <option value="3">3 x 3</option>
                        <option value="4">4 x 4</option>
                        <option value="5">5 x 5</option>
                        <option value="6">6 x 6</option>
                    </select>
                    <button class="btn" name="ok" type="submit" id="show-end">ตกลง</button>
                </div>
            </form>
            <?php
            $sql = "DELETE FROM `history_play`";
            mysqli_query($conn, $sql);
            if (isset($_POST['ok'])) {
                $size = $_POST['size'];
                $_SESSION['size'] =  $size;

                if (count($_SESSION) >= 1) {
                    if ($_SESSION['size'] >= 1) {
                        $size_game = true;
                    } else {
                    }
                }
            ?>

                <div class="player">
                    <h5> PLAYER : X </h5>
                    <div id="X"><img width="50px" height="30px" src="./Pic/นิ้วชี้.png" alt=""></div>
                </div>
                <div class="player">
                    <h5>PLAYER : O </h5>
                    <div id="O" style="display: none;"><img width="50px" height="30px" src="./Pic/นิ้วชี้.png" alt=""></div>
                </div>
                <?php
                for ($i = 0; $i < $size; $i++) {
                    for ($j = 0; $j < $size; $j++) { ?>
                        <input type="button" class="table-xo" id="xo<?php echo $i . $j ?>" onclick="x(<?php echo $i ?>,<?php echo $j ?>,<?php echo $size ?>)" value=" ">
            <?php     }
                    echo "<br>";
                }
            } ?>

            <?php if ($size_game) { ?>
                <br>
                <button class="btn_end" type="submit" onclick="replay()" id="replay">จบเกมส์</button>
                <br>
            <?php } ?>

        </div>

    </center>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>