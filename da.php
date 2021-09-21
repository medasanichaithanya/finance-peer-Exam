<!DOCTYPE html>
<html>

<head>
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
	</script>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>

	<style>
	h1 {
	text-align: center;
	background: black;
	color: white;
}
		.box {
			width: 750px;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-top: 100px;
		}
		.button {

  background-color: black;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 1200px;
  
}
	</style>
</head>

<body>
	<h1>Welcome to FINANCEPEER</h1>
	<a href="http://localhost/project/Project/" class="button">Logout</a>
	<div class="container box">
		
		
		<?php
		
			// Server name => localhost
			// Username => root
			// Password => empty
			// Database name => test
			// Passing these 4 parameters
			$connect = mysqli_connect("localhost", "root", "", "admission");
			
			$query = '';
			$table_data = '';
			
			// json file name
			$filename = "data.json";
			
			// Read the JSON file in PHP
			$data = file_get_contents($filename);
			
			// Convert the JSON String into PHP Array
			$array = json_decode($data, true);
			
			// Extracting row by row
			foreach($array as $row) {

				// Database query to insert data
				// into database Make Multiple
				// Insert Query
				$query .=
				"INSERT INTO jsondata VALUES ('".$row["userId"]."', '".$row["id"]."','".$row["title"]."','".$row["body"]."'); ";
			
				$table_data .= '
				<tr>
					<td>'.$row["userId"].'</td>
					<td>'.$row["id"].'</td>
					<td>'.$row["title"].'</td>
					<td>'.$row["body"].'</td>
				</tr>
				'; // Data for display on Web page
			}

			if(mysqli_multi_query($connect, $query)) {
				echo ' Json Data ';
				echo '
				<table class="table table-bordered">
				<tr>
					<th width="20%">userid</th>
					<th width="10%">id</th>
					<th width="45%">title</th>
					<th width="50">body</th>
				</tr>
				';
				echo $table_data;
				echo '</table>';
			}
		?>
		<br />
	</div>
</body>

</html>
