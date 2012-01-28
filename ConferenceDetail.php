<?php

$heading = "<h2>Conference No. $refNo</h2>";
$Table = "conf_name";
$sql = "SELECT * FROM $Table where id = $refNo";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
 {
  $heading .=  "<h1>" .$row['name']. "</h1>";
 }

$heading .=  "<h2>" . "List of themes:" . "</h2>";

echo $heading;

$Table = "ResearchTopic";
$sql = "SELECT * FROM $Table where Conf_ID = '$refNo'" ;
$result = mysql_query($sql);

$rownumber=0;

echo "<table>";

while($row = mysql_fetch_array($result))
 { 
  if($rownumber%2==0) $layout="RowEvenC";
  else
  {
   $layout="RowOddC";
  }

  $rownumber++;
  $change_label= explode(":", $row['label']);
  $item[0] = "<tr><td>";
  $item[0] .= " <div class= $layout > $rownumber </div></td><td> <div class = $layout >";
   $item[0] .=  $change_label[3] . "</div></td></tr>";
//   $item[0] .=   " </div> ";

 echo $item[0];

 }
 echo "</table>";
?>
