<!--
Created-By: Emmanuel Acoltzi Bautista
Date: 12-08-2024
email: basedeemma@gmail.com
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamma</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/jscolor.js"></script>

</head>

<body>
    <div class="gradient">
        <br>
        <a href="../index.php" class="button">Return</a>


        <center>
            <div class="container">



                <h1>Training GAMMA</h1>
                <form action="" method="post">
                    <input data-jscolor="{value:'#000000'}" , onInput="update(this.jscolor)">
                    <br>
                    <br>
                    <input type="hidden" name="Red" id="Red">
                    <input type="hidden" name="Green" id="Green">
                    <input type="hidden" name="Blue" id="Blue">
                    <script>
                        function update(color) {
                            Red=color.channels.r;
                            Green=color.channels.g;
                            Blue=color.channels.b;
                            document.getElementById("Red").value=Red;
                            document.getElementById("Green").value=Green;
                            document.getElementById("Blue").value=Blue;

                        }
                    </script>

                    <input type="text" name="Name" id="Name" placeholder="Name of color" required>
                    <br>
                    <input type="submit" value="Submit" class="button" name="Send" id="Send">
                </form>
            </div>
            <?php
            if (isset($_POST["Send"])) {
                /**
                 * Connection with database
                 */
                require_once("../database/database.php");
                $connect = mysqli_connect(server, user, password, database, port);

                //insert information to the database
                $R = $_POST["Red"];
                $G = $_POST["Green"];
                $B = $_POST["Blue"];
                $C = $_POST["Name"];

                $query = "INSERT INTO `DATA` (`id`,`RED`,`GREEN`,`BLUE`,`COLOR`)
         VALUES ('0','$R','$G','$B','$C');";
                $result = mysqli_query($connect, $query);
            }
            ?>
        </center>
    </div>
</body>

</html>