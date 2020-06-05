<?php
// including the database connection file
$servername = "lab.chrhjq7ibkz8.us-east-1.rds.amazonaws.com";
$username = "master";
$password = "lab-password";
$dbname = "lab";
$mysqli = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit']))
{
    $id = $_POST['id'];

    $fname=$_POST['Firstname'];
    $lname=$_POST['Lastname'];
    $email=$_POST['Email'];
    $ad=$_POST['Address'];
    $tel=$_POST['Tel'];


    // checking empty fields
    if(empty($fname) || empty($lname) || empty($email)) {
        if(empty($fname)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }

        if(empty($lname)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE phonebook SET FirstName='$fname',LastName='$lname',Email='$email',Tel='$tel',Address='$ad' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM phonebook WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $fname = $res['FirstName'];
    $lname = $res['LastName'];
    $email = $res['Email'];
    $tel = $res['Tel'];
    $ad = $res['Address'];
}
?>

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="https://s3.amazonaws.com/webapp-phone/style.css"/>
</head>
<body>
<img src="https://s3.amazonaws.com/webapp-phone/banner_address_book.gif" width = "1920">
<br>
<div class="form">
<p><a href="index.php">View Phonebook</a></p>
<div>
<p style="color:#FF0000;"></p>
<form action="" method="post">
        <div class = "input-group">
                <label>First Name:</label>
                <input type ="text" name="Firstname"  value="<?php echo $fname;?>">
        </div>
        <div class = "input-group">
                <label>Last Name:</label>
                <input type ="text" name="Lastname"   value="<?php echo $lname;?>">
        </div>
        <div class = "input-group">
                <label>Telephone:</label>
                <input type ="text" name="Tel"   value="<?php echo $tel;?>">
        </div>
        <div class = "input-group">
                <label>Address:</label>
                <input type ="text" name="Address" value="<?php echo $ad;?>">
        </div>
        <div class = "input-group">
                <label>Email:</label>
                <input type ="text" name="Email"  value="<?php echo $email;?>">
        </div>
        <div class = "input-group">
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <button class="btn" type="submit" name="submit">EDIT</button>
        </div>
</form>
</body>
</html>

