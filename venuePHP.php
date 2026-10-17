<!DOCTYPE html>
<html>
<body>

<form method="POST">
    Attendees: <input type="number" name="attendees"><br><br>
    Cost per Person: <input type="number" name="cost"><br><br>
    Venue Capacity: <input type="number" name="capacity"><br><br>
    <input type="submit" value="Calculate">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

    $attendees=$_POST["attendees"];
    $cost=$_POST["cost"];
    $capacity=$_POST["capacity"];

    $venues=ceil($attendees/$capacity);
    $empty=$venues*$capacity-$attendees;
    $wasted=$empty*$cost;

    echo "Total Venues: ".$venues."<br>";
    echo "Empty Seats: ".$empty."<br>";
    echo "Wasted Money: ".$wasted." BDT";
}
?>

</body>
</html>
