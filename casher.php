<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-image: url("resturant.jpg");

        }

    </style>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=Hotel_Resturant", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stat=$conn->prepare("select room_number from Room");
    $stat1=$conn->prepare("select food_name from Food");
    $stat->execute();
    $result = $stat->fetchall();
    $stat1->execute();
    $result1 = $stat1->fetchall();
    ?>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>order food form</h2>
    <form class="form-horizontal" action="casher.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="sel1">Select food name:</label>
            <div class="col-sm-10">
                <select  class="form-control" id="sel1" name="foodname">
                    <?php
                    foreach ($result1 as $row) {
                        echo "<option>" . $row['food_name'] . "</option >" ;
                    }

                    ?>

                </select></div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="sel1">Select room number:</label>
            <div class="col-sm-10">
                <select  class="form-control" id="sel1" name="roomnumber">
                    <?php
                    foreach ($result as $row) {
                        echo "<option>" . $row['room_number'] . "</option >" ;
                    }

                    ?>

                </select></div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
                <button  type="button" class="btn btn-default"><a style="text-decoration: none" href='casher.php'>back</a></button>
                <button  type="button" class="btn btn-default"><a style="text-decoration: none" href='login.php'>back to login</a></button>


            </div>
        </div>
    </form>
</div>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{


    $stat = $GLOBALS['conn']->prepare("select id from Food where food_name=?");
    $stat->execute([$_POST['foodname']]);


    $id = $stat->fetchColumn();

    $stat1 = $GLOBALS['conn']->prepare("insert into _Order (food_id,roomnumber) values (?,?)");
    $stat1->execute([$id,$_POST['roomnumber']]);


}
?>
</body>
</html>