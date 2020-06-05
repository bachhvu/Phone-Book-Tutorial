$servername = "lab.chrhjq7ibkz8.us-east-1.rds.amazonaws.com";
$username = "master";
$password = "lab-password";
$dbname = "lab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * From phonebook";

try {
     $result = $conn->query($sql);

   }catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

if ($result->num_rows > 0){
        //output data of each row
echo "<br><br><table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Tel</th><th>Address</th><th>Email</th><th>Edit</th><th>Delete</tr>";

        while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row ["id"]. "</td>";
                echo "<td>" . $row ["FirstName"]."</td>";
                echo "<td>" . $row ["LastName"]."</td>";
                echo "<td>" . $row ["Tel"]. "</td>";
                echo "<td>" . $row ["Address"]."</td>";
                echo "<td>" . $row ["Email"]. "</td>";
                echo "<td><a href= edit.php?id=" .$row['id'].">Edit</a></td>";
                echo "<td><a href= delete.php?id=" .$row['id'].">Delete</a></td>";
                echo "</tr>";
        }

echo "</table>";
}else{
        echo "0 results";
}

$conn->close();
?>
