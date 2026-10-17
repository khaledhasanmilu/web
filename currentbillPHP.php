<!DOCTYPE html>
<html>
<body>

<form method="POST">
    Location:
    <select name="location">
        <option value="">Select Location</option>
        <option value="Dhaka">Dhaka</option>
        <option value="Chattogram">Chattogram</option>
        <option value="Other">Other</option>
    </select>
    <br><br>

    Area:
    <input type="radio" name="area" value="Urban"> Urban
    <input type="radio" name="area" value="Rural"> Rural
    <br><br>

    Unit Consumed:
    <input type="number" name="unit">
    <br><br>

    <input type="submit" value="Calculate Bill">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

    $location=$_POST["location"] ?? "";
    $area=$_POST["area"] ?? "";
    $unit=$_POST["unit"];

    if($location=="" || $area=="" || $unit<=0){
        echo "Error: Please enter valid information!";
    }
    else{
        if($location=="Dhaka" && $area=="Urban")
            $rate=7.5;
        else if($location=="Dhaka" && $area=="Rural")
            $rate=6.5;
        else if($location=="Chattogram" && $area=="Urban")
            $rate=7.0;
        else if($location=="Chattogram" && $area=="Rural")
            $rate=6.0;
        else if($area=="Urban")
            $rate=6.5;
        else
            $rate=5.5;

        $bill=$unit*$rate;

        if($bill<500)
            $surcharge=0;
        else if($bill<=1000)
            $surcharge=$bill*0.05;
        else
            $surcharge=$bill*0.10;

        $total=$bill+$surcharge;

        echo "<script>alert('Final Bill: ".number_format($total,2)." Taka');</script>";

        echo "Unit Rate: ".$rate."<br>";
        echo "Bill: ".number_format($bill,2)."<br>";
        echo "Surcharge: ".number_format($surcharge,2)."<br>";
        echo "Final Bill: ".number_format($total,2)." Taka";
    }
}
?>

</body>
</html>
