<?php
$con = mysqli_connect("localhost","root","","website");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM web";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo '<tr>'.'<td>'.$row['name'].'</td>';
  echo '<td>'.$row['comment'].'</td>'.'</tr>';
}

mysqli_free_result($result);
mysqli_close($con);
?>