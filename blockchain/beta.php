
<?php
include("connection.php");
$query="SELECT * FROM blockchain";
$data=mysqli_query($connect,$query);

$total = mysqli_num_rows($data);
//echo $total;

//$result = mysqli_fetch_assoc($data);
?>

<html>

<head>
  <title>SCM Blockchain Ledger</title>
  <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
  <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>

  <ul class="navigation">
    <li><img src="https://s3.amazonaws.com/codecademy-content/courses/web-101/unit-9/htmlcss1-img_logo-shiptoit.png" height="20px;"></li>
    
  
  <table>
    <thead>
      <tr>
        <th>Time</th>
        <th>ATA-Status</th>
        <th>ETA-Future</th>
      </tr>
    </thead>
	<tbody>
	
	<?php
while($result = mysqli_fetch_assoc($data))
{
echo "<tr>";
//echo $result['time'];
echo "<td>".$result['time']."</td>";

echo "<td>".$result['status']."</td>";

echo "<td>".$result['future']."</td>";

//echo "<td>".$result['hash']."</td>";




echo "</tr>";
}

?>
	
	
	
	
    
      
    </tbody>

  </table>


</body>
</html>