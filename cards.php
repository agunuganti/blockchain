<?php

$servername='localhost';
$username='root';
$password='';
$blockchain='alpha';

$connect=mysqli_connect($servername,$username,$password,$blockchain);

if(!$connect){
	 die('connection failed'.mysqli_connect_error());
} else
{echo 'connect worked';


}

error_reporting(0);
?>

<html>
<head>

<title>Project Task Board</title>
		<link rel="stylesheet" type="text/css" href="style1.css"/>
    
    <link href='https://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
    
  
    
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

</head>
<body>



<?php

$status=$_POST['status'];
$future=$_POST['future'];
//$time=$_POST['submit'];
$status=mysqli_real_escape_string($connect,$_POST['status']);
$future=mysqli_real_escape_string($connect,$_POST['future']);

//echo $time;
//echo $status;
//echo $future;

$chain = hash('sha256',$status.$future.$previous_hash);
//$previous_hash = $chain;
$fetch= "SELECT hash FROM blockchain where stage=(select max(stage) from blockchain)";
$data=mysqli_query($connect,$fetch);





$result = mysqli_fetch_assoc($data);

if($total = mysqli_num_rows($data))
{

$previous_hash = $result['hash'];

}
else
{
  $previous_hash = 'Start tracking';	
}


$date = new DateTime;

date_default_timezone_set('Asia/Kolkata');
//echo date('d-m-Y H:i:s e');
//var_dump($date->format('Y-m-d H:i:s e'));




//$date = date_create();
$tango = date('Y-m-d H:i:s');

//echo $tango;




$chain = hash('sha256',$tango.$status.$future.$previous_hash);
//proofofwork
$pow = hash('sha256','2018-12-29 12:46:41cont1256tramp4568b01b23e9097944f6faabe716147d34305e3edd8965908b5aff8b4ec9c7b9866');

echo $pow;


//echo $result['hash'];

$tango=mysqli_real_escape_string($connect,$tango);

echo $tango;


if(isset($_POST['status'])&& isset($_POST['future']))
{

$query= "INSERT INTO blockchain(time,status,future,hash) VALUES('$tango','$status','$future','$chain')";

if(mysqli_query($connect,$query))
		{
			 header("Location: http://localhost/akhil/beta.php");
             exit;
		echo ' <div class="alert alert-success alert-dismissable fade in">
    <a href=imsAdminLogForm.php class="close" data-dismiss="alert" aria-label="close">&times;</a>
    time '.$tango.' of status '.$status.' with future '.$future.' is added  to database successfully!!!
  </div> ';
		}
				
		
	
	else
	{
		echo ' <div class="alert alert-danger alert-dismissable fade in">
    <a href=imsAdminLogForm.php class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning! </strong>Data insertion failed  </div> ';
	}	


}
?>


<!--

<form action="blockchain.php" method="POST">
status <input type="text" name="status" value=""/><br><br>
future <input type="text" name="future" value=""/><br><br>
<input type="submit" name="submit" value="update"  />


</form>





</body>
</html>
-->
<form action="cards.php" method="POST"> 
		<div class="bg"></div>
		<div class="navbar">
		<!--	<div class="search-bar">
				<img class="search-icon" src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/search_icon.svg">
			</div>
-->
			<h1>SUPPLY CHAIN</h1>
		</div>
		<div class="site-body">
			<div class="container">
				
				
        <div class="card-column completed-projects">
  <div class="taskgroup-heading">
    <h2>ATA-STATUS</h2>
    <div class="ellipsis-icon">
    <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
    <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
    <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
    </div>
  </div>
  <div class="card complete-i">
    <div class="rectangle yellow"></div>
    <div class="rectangle green"></div>
    <div class="rectangle blue"></div>
    <div class="rectangle orange"></div>
    <p class="task-description">Start Tracking</p>
    <img class="list-icon" src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/list_icon.svg">
    <p class="task-date">4/19/2017</p>
  </div>
   
  <div class="add-card-container">
    <input name= "status" class ="new-card-task" placeholder="Status...">
    
  </div>
</div>
          <div class="card-column completed-projects">
  <div class="taskgroup-heading">
    <h2>ETA-STATUS</h2>
    <div class="ellipsis-icon">
    <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
    <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
    <img src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/oval-copy.svg">
    </div>
  </div>
  <div class="card complete-i">
    <div class="rectangle yellow"></div>
    <div class="rectangle green"></div>
    <div class="rectangle blue"></div>
    <div class="rectangle orange"></div>
    <p class="task-description">Analysis</p>
    <img class="list-icon" src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/list_icon.svg">
    <p class="task-date">4/19/2017</p>
  </div>
  <div class="add-card-container2">
    <input name= "future" class ="new-card-task2" placeholder="Future...">
  <!-- <button  class="add-card2">Add</button> -->
         <input class="add-card2" type="submit" name="submit" value="Update"  />
  </div>
</div>
      
			</div>
      
		</div>
      
    </form>
	</body>
</html>
<script>
	$(document).ready(function(){
		$(".add-card2").on("click", function(){
			var description = $(".new-card-task").val();
			var today = new Date();
			var dateStr = (today.getMonth()+1) + "/" + today.getDate() + "/" + today.getFullYear();
			var newCard = $(`<div class="card"><div class="rectangle yellow"></div><div class="rectangle green"></div><div class="rectangle blue"></div><div class="rectangle orange"></div><p class="task-description">${description}</p><img class="list-icon" src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/list_icon.svg"><p class="task-date">${dateStr}</p></div>`)
			$(".add-card-container").before(newCard);
		})
	})
  
  $(document).ready(function(){
		$(".add-card2").on("click", function(){
			var description = $(".new-card-task2").val();
			var today = new Date();
			var dateStr = (today.getMonth()+1) + "/" + today.getDate() + "/" + today.getFullYear();
			var newCard = $(`<div class="card"><div class="rectangle yellow"></div><div class="rectangle green"></div><div class="rectangle blue"></div><div class="rectangle orange"></div><p class="task-description">${description}</p><img class="list-icon" src="https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/list_icon.svg"><p class="task-date">${dateStr}</p></div>`)
			$(".add-card-container2").before(newCard);
		})
	})
</script>











