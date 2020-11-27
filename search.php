<html>
<head>
	<title> Search data </title>
	<style>
	body{
		background-color: whitesmoke;
	}
	input{
		width: 40%;
		height: 5%;
		border:1px;
		border-radius: 5px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow: 1px 1px 2px 1px grey;
	}
</style>
<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_594cda2ad3a9ac9c8dcb40508400e7489'
    });
</script>
</head>
<body>
	<center>
	<h1> Search Data </h1>
		<form action="" method="POST">
			<input type="text" name="District" placeholder="Enter District Name to search"/> <br>
			<input type="submit" name="search" value="Search Data">
		</form>

<?php
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con, 'hackathon');

if(isset($_POST['District']))
{
	$District = $_POST['District'];
	$query = "SELECT * FROM  farms_world where District='$District' ";
	$query_run = mysqli_query($con, $query);
	if (!$query_run) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

	while ( $row = mysqli_fetch_array($query_run))
	{
		 ?>

		 	<form action ="" method ="POST">
		 		<input type="hidden" name="S.No."	value="<?php echo  $row['S.No.'] ?>" /> <br>
		 		<input type="text" name="State" value="<?php echo  $row['State'] ?>"/> <br>
		 		<input type="text" name="District" value="<?php echo  $row['District'] ?>"/> <br>
		 		<input type="text" name="Season" value="<?php echo  $row['Season'] ?>"/> <br>
		 		<input type="text" name="Crop" value="<?php echo  $row['Crop'] ?>"/> <br>
		 		<input type="varchar" name="pH" value="<?php echo  $row['pH'] ?>"/> <br>
		 		
		 	</form>
		 	<?php
	}
}

?>

</center>
</body>
</html>