<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
      <form method="POST" >
          <label for="">CT1:</label>
          <input type="number" name="ct1" required><br>
          <label for="">CT2:</label>
          <input type="number" name="ct2" required><br>
          <label for="">CT3:</label>
          <input type="number" name="ct3" required><br>
          <label for="">Mid Term:</label>
          <input type="number" name="midterm" required><br>
          <label for="">Final</label>
          <input type="number" name="final" required><br>
          <input type="submit" value="Submit Marks">


      </form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
  $ct1=$_POST["ct1"];
  $ct2=$_POST["ct2"];
  $ct3=$_POST["ct3"];
  $mid=$_POST["midterm"];
  $final=$_POST["final"];

 $ct=[$ct1,$ct2,$ct3];
 rsort($ct);
 $total=$ct[0]+$ct[1]+$mid+$final;
echo "Best two ct total : ".$ct[0] +$ct[1]."<br>";
echo "<b>Total Marks:</b> ".$total."<br>";
echo "Status: ";
 if($total>=54){
  echo "Passed";
 }
 else{
  echo "Failed";
 }


}

?>