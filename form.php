<?php
$insert=false;
if(isset($_POST['State'])){
	$server="localhost";
	$username="root";
	$password="";
	//Create a database connection
	$con=mysqli_connect($server,$username,$password);
	//check for connection success
	if(!$con){
		die("connection to this database failed due to" . mysqli_connect_error());
	}
	// echo "Success connecting to the db";
	
	
	//collect post variables
	$State = $_POST['State'];
	$District = $_POST['District'];	
	$Season = $_POST['Season'];
	$Crop = $_POST['Crop'];
	$pH = $_POST['pH'];

	$sql = "INSERT INTO `hackathon`.`farms_world` (`State`, `District`, `Season`, `Crop`, `pH`, `dt`) VALUES ('$State', '$District', '$Season', '$Crop', '$pH', current_timestamp())";	

	 // echo $sql;

	//execute the query
	if($con->query($sql) == true){
		// echo "Successfully inserted";
		//flag for successful insertion
		$insert=true;
	}
	else{
		echo "ERROR: $sql <br> $con->error";
	}
	//close the database connection

	$con->close();

}
 ?>

 <!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF=8">
	<meta name="viewport" content="width=device-width,  initial-scale=1.0">
	<title>Form</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Domine:wght@600&family=Lobster+Two:ital,wght@1,700&display=swap" rel="stylesheet">
<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_594cda2ad3a9ac9c8dcb40508400e7489'
    });
</script>
</head>
<body>
	<div class="container">
		<h1> Welcome to Farms World</h1>
		<p> Please fill out the form and know more about the farms in your district/state </p>
		<?php
		if($insert==true){
			echo "<p class='submitMsg'> Thanks for submitting the form. </p>";}
		?>
	<form action="form.php" method="post">
		<input type="text" name="State" id="name" placeholder="Enter your state">
		<input type="text" name="District" id="name" placeholder="Enter your district">
		<input type="text" name="Season" id="name" placeholder="Season">
		<input type="text" name="Crop" id="name" placeholder="Crop">
		<input type="varchar" name="pH" id="name" placeholder="pH">
		<button class="btn">Submit</button>
	</form>
	</div>
	
	<!-- INSERT INTO `farms world` (`S.No.`, `State`, `District`, `Season`, `Crop`, `pH`, `dt`) VALUES ('1', 'Punjab', 'Amritsar', 'Kharif', 'Rice', '6.5-8.7', current_timestamp()); -->
</body>
</html>

 