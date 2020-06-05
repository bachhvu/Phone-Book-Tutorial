

$conn->close();
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
<p style="color:#FF0000;"><?php echo $status; ?></p>
<form action="" method="Post">
        <div class = "input-group">
                <label>First Name:</label>
                <input type ="text" name="Firstname">
        </div>
        <div class = "input-group">
                <label>Last Name:</label>
                <input type ="text" name="Lastname">
        </div>
        <div class = "input-group">
                <label>Telephone:</label>
                <input type ="text" name="Tel">
        </div>
        <div class = "input-group">
                <label>Address:</label>
                <input type ="text" name="Address">
        </div>
        <div class = "input-group">
                <label>Email:</label>
                <input type ="text" name="Email">
        </div>
        <div class = "input-group">
                <button class="btn" type="submit" name="submit">SUBMIT</button>
        </div>
</form>
</body>
</html>
