<?php
  $Host="localhost";
  $User="root";
  $Password="";
  $Database="tourism";

  $conn = mysqli_connect($Host, $User, $Password, $Database);
  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }

 $sql1="SELECT * FROM tourist_spot
        WHERE Rating>4.5 AND SpotName LIKE '%Beach%'
        ORDER BY Rating DESC;
 ";

$result = mysqli_query($conn,$sql1);

while($row = mysqli_fetch_assoc($result)){
  echo "SpotName: ".$row["SpotName"]."Region : ".$row["Region"]."Rating : ".$row["Rating"]."<br>";
}
$sql2="
    UPDATE tourist_spot
    SET Rating = Rating + 0.2,EntryFee=Entryfee+(EntryFee*0.1)
    WHERE Rating BETWEEN 4.0 AND 4.5 AND EntryFee>0;
";
$result1 = mysqli_query($conn,$sql2);

$sql3 = "SELECT Category,COUNT(SpotName) AS spots,AVG(Rating) AS avg_rating,SUM(VisitorsPerYear) AS visitors
FROM tourist_spot
GROUP BY Category HAVING avg_rating>4.4 
ORDER BY Rating DESC;
        
";
$result2 = mysqli_query($conn,$sql3);
while($row = mysqli_fetch_assoc($result2)){
  echo "CategoryName: ".$row["Category"]."Spots : ".$row["spots"]."Average Rating : ".$row["avg_rating"]."Visitors per Year:".$row["visitors"]."<br>";
}

$sql4 = "SELECT Region,SUM(EntryFee * VisitorsPerYear) AS total_revenue
          FROM tourist_spot 
          GROUP BY Region 
          HAVING total_revenue>1000000 
          ORDER BY total_revenue DESC;
";
$result3 = mysqli_query($conn,$sql4);
while($row = mysqli_fetch_assoc($result3)){
  echo "rEGION NAME: ".$row["Region"]."Revenue".$row["total_revenue"]."<br>";
}

mysqli_close($conn);
?>