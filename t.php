<?php 
session_start();
$con = mysqli_connect('localhost', 'root', 'qwerqwer', 'arduino');
$result = mysqli_query($con,"SELECT * FROM users");
?>


<html>
   <head>
      <title>Data</title>
   </head>
<body>
   <h1>uid & money data readings</h1>
   
<?php
echo "<table border='1'>
<tr>
<th>income</th>
<th>spend</th>
<th>total</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['income'] ."</td>";
  echo "<td>" . $row['spend'] ."</td>";
  echo "<td>" . $row['total'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
   </table>
</body>
</html>