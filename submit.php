<head>
<style>
table {
	font-family: arial, sans-serif;
	bordr-collapse: collapse;
	width: 100%;
}

td, th {
	border@ 1px solid  #dddddd;
	text-align: left;
	padding: 8px
}

tr:nth-child(even) {
	background-colour:  #dddddd;
}
</style>
</head>

<?php
echo "test";
$fn=$_POST['Firstname'];
$ln=$_POST['Lastname'];
//mob,Tel,Address,Email,id
$mb=$_POST['Mob'];
$tl=$_POST['Tel'];
$ad=$_POST['Address'];
$el=$_POST['Email'];
$id1=$_POST['id']; 


$servername = "localhost";
$username = "root";
$password = "";
$dbname="db1";
echo "test";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection 
if ($conn->connect_error) {
	die("connection failed: ". $conn->connect_error);
}

echo "connected successfully";
//$sql = "INSERT INTO 'phonebook' ('firstname', 'lastname', 'mob','tel','Address','Email')";
$sql = "INSERT INTO `phonebook` (`First Name`, `Last Name`, `Mob`, `Tel`, `Address`, `Email`, `Id`) VALUES ('$fn', '$ln', '$mb', '$tl', '$ad', '$el','$id1')";
if ($conn->query($sql) === TRUE) {
	echo "New Record Created Successfully!!! \n";
} else{
	echo "Error; " . $sql . "<br>" . $conn->error;
}

//$sql = "SELECT First Name, Last Name, Mob, Tel, Address, Email, Id From Phonebook";
$sql = "SELECT * From Phonebook";

try {
     $result = $conn->query($sql);
     
   }catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

if ($result->num_rows > 0){
	//output data of each row 
echo "<table>";

	while($row = $result->fetch_assoc()){
		echo "<tr><td> id: " . $row ["Id"]. "</td><td> Firstname: " . $row ["First Name"]."</td><td> Lastname: " . $row ["Last Name"].
		"</td><td> Mob: " . $row ["Mob"]."</td><td> Tel: " . $row ["Tel"]. "</td><td> Address: " . $row ["Address"]."</td><td> Email: " . $row ["Email"]. "</td></tr></br>";
	}
	
echo "</table>";
}else{
	echo "0 results";
}


$conn->close();
?>