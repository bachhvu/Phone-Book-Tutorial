<html>
    <head>
        <title>PHP insertion</title>
        <link rel="stylesheet" href="css/insert.css" />
    </head>
    <body>
		<div class="maindiv">
		<!--HTML form -->
			<div class="form_div">
				<div class="title"><h2>Insert Data In Database Using PHP.</h2></div>
   
				<form action="insert.php" method="post">    <!-- method can be set POST for hiding values in URL-->
					<h2>Form</h2>
					<label>Name:</label>
					<br />
					<input class="input" type="text" name="name" value="" />
					<br />
					<label>Artist:</label><br />        
					<input class="input" type="text" name="artist" value="" />
					<br />
					<label>Label:</label><br />
					<input class="input" type="text" name="label" value="" />
					<br />
					<label>Genre:</label><br />
					<input class="input" type="text" name="genre" value="" />
					<br />
					<input class="submit" type="submit" name="submit" value="Insert" />	

<?php
	//Establishing Connection with Server
	$connection = mysqli_connect("localhost", "root", "");

	//Selecting Database from Server
	$db = mysqli_select_db( $connection, "music");
	if(isset($_POST['submit'])){
   
	//Fetching variables of the form which travels in URL
    
    $name = $_POST['name'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $label = $_POST['label'];
    if($name !=''){
	//Insert Query of SQL
    $query = mysqli_query($connection, "insert into song(name, artist, genre, label) values ('$name', '$artist', '$genre', '$label')");
	echo "<br/><br/><span>Data Inserted successfully...!!</span>";
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";   
    }
 
	}
	//Closing Connection with Server
	mysqli_close($connection);
?>					
				</form>
			</div>
			
    </body>
</html>