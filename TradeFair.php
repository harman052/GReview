<?php
$Table = "data";
$sql = "select * from $Table where id = $refNo ";
$res = mysql_query($sql);
$rownumber=0;
while ( $row = mysql_fetch_array($res))
{
  if($rownumber%2==0) $layout="RowEvenC";
  else
  {   
   $layout="RowOddC";
  }
   
  $rownumber++;
  $item[0] = "";
  $item[0] .= " <div class= $layout > <h1>" . $row['title'] . "</h1>" ;
  if ($row['sub_title'] != "" )
  {
    $item[0] .=  "<h2>" . $row['sub_title'] . "</h2>" ;
  }  
  $item[0] .=  $row['text'];
  $item[0] .=  "</div>";
//   $item[0] .=   " </div> ";

 echo $item[0];
$ImID = 0;
  $change_label= explode(",", $row['ImageID']);
$PP1 = $change_label[0] . " A " . $change_label[1] . " B ";
$PP1 .= $change_label[2] . " C " . $change_label[3] . " D ";
//echo $PP1;
$PP = $ImID;
while($change_label[$ImID])
{
$PP .= " XX ImId " . $ImID . " | " . $change_label[$ImID] ;
$ImID++;
}
//echo $PP;
$ImID = 0;
  $Table2 = "images";
//$HeaderHeigth="100%";
$ImageSize="\"99%\"";
$PathImage = "../400/";
 

echo "<table>";

while($change_label[$ImID])
{
$sql2 = "SELECT * FROM $Table2 where id = $change_label[$ImID]";
//echo $sql2;
$result2 = mysql_query($sql2);
$ImID++;

$rownumber3=0;

//echo "<div class='footerLogoH'>";
//echo "<table>";
while($row3 = mysql_fetch_array($result2))
{
  $rownumber3++;
 echo "<tr><td class='footerLogoH'><img src=\"" . $PathImage . $row3['image'] . "\"width = " . $ImageSize . " alt =\"image\" > ";

//echo "<tr><td>";
 echo $row3['caption'];
echo"</td></tr>"; 
//echo"</div>";
}
//echo "</div>";
//echo "</table>";
}
echo "</table>";
 }

?>
