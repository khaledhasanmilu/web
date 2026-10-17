<!DOCTYPE html>
<html>
<body>

<form method="POST">
    Number of Students:
    <input type="number" name="students"><br><br>

    Slices per Student:
    <input type="number" name="slices"><br><br>

    Slices per Pizza:
    <input type="number" name="pizza"><br><br>

    <input type="submit" value="Calculate">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

    $students=$_POST["students"];
    $slices=$_POST["slices"];
    $pizza=$_POST["pizza"];

    $total=$students*$slices;
    $pizzas=ceil($total/$pizza);
    $leftover=($pizzas*$pizza)-$total;
    $wasted=($leftover/$pizza)*1050;

    echo "Total Pizzas: ".$pizzas."<br>";
    echo "Leftover Slices: ".$leftover."<br>";
    echo "Wasted Money: ".$wasted." BDT";
}
?>

</body>
</html>
