<!--
Created-By: Emmanuel Acoltzi Bautista
Date: 12-08-2024
email: basedeemma@gmail.com
-->

<?php

//connection with database
require_once("./database/database.php");
$connect = mysqli_connect(server, user, password, database);

//select data the database

$query = "SELECT * FROM `DATA`;";
$result = mysqli_query($connect, $query);
$data = "";
//recolect in strings
while ($re = mysqli_fetch_assoc($result)) {
    $r = ($re["RED"]) / 255;
    $g = ($re["GREEN"]) / 255;
    $b = ($re["BLUE"]) / 255;
    $c = ($re["COLOR"]);

    $data .= '
{
input:{R:' . $r . ',G:' . $g . ',B:' . $b . '},
output:{"' . $c . '":1}
},
';
}
//count
$num = strlen($data);
//I remove the last comma
$va = substr($data, 0, $num - 2);


//I concatenate a to construct a vector
$data1 = "<script>

const data=[
" . $va . "
];

</script>";

echo $data1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/Color.css">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="./js/BRAIN.js"></script>
    <script src="./js/Color.js"></script>
    <link rel="icon" href="./images/icon.png">
    <script>
        var Red;
        var Green;
        var Blue;
        //     Create neural network
        const NeuralNetwork = new brain.NeuralNetwork();
        //training neural network with vector
        NeuralNetwork.train(data);

        function Solve() {




            let result = brain.likely({
                "R": Red,
                "G": Green,
                "B": Blue,
            }, NeuralNetwork);
            console.log(result);
      var ResultTotal=result+"<span>&#160;</span>";
document.getElementById("SetColor").innerHTML=ResultTotal;
    
        }
    </script>
   <script src="./js/jscolor.js"></script>
    <title>Gamma</title>
</head>

<body>
    <div class="gradient">
        <div class="container">
            <h1> <a href="./Train/">Gamma</a></h1>









            <form action="" method="post">
         <h3 id="SetColor"></h3>
                <br>
                <br>
                <input data-jscolor="{value:'#000000'}" , onInput="update(this.jscolor)">

            </form>
            <script>
                function update(color) {
                    Red = color.channels.r;
                    Green = color.channels.g;
                    Blue = color.channels.b;
                    Solve();
                }
            </script>
        </div>
    </div>

</body>

</html>