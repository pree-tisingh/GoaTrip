<?php
$insert=false;
$not_insert=false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";

$con = mysqli_connect($server , $username , $password);
if(!$con)
{
    die("connection to this database failed due to" . mysqli_connect_error());

}

//echo "Successfully Connected to the database";

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = (string)$_POST['phone'];
$email = $_POST['mail'];
$description = $_POST['description'];


if (empty($name)) {
    echo '<script>alert("Name is required fields.");</script>';
} else if($age>30)
{
    echo '<script>alert("age should not greater than 30");</script>';
}
else if (strlen($phone) < 10) {
    echo '<script>alert("Phone number should be at least 10 characters.");</script>';
}
else {
    $sql = "INSERT INTO `goa`.`goa` (`name`, `age`, `gender`, `phone`, `address`, `email`, `ad`, `date`) VALUES ('$name', '$age', '$gender', '$phone', '$address', '$email', '$description', current_timestamp());";

    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
        $not_insert = true;
    }
}
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    
    <title>Welcome to Travel Page!!!!</title>
</head>

<body>
    <img src="https://thumbs.dreamstime.com/b/beach-goa-india-5393913.jpg" alt="goa">
    <div class="container">

        <h2>Welcome to Goa Trip form</h2>
        <p>Enter the detail and submit the form to confirm your trip</p>
        <?php
         
        if($insert==true){
           echo "<p class='msg'>Thankyou for submitting the form , and Welcome to the Trip!!</p>";
        }
        else if($not_insert==true)
        {
            echo "<h3 class='msg'>Your form is not submit. ERROR</h3>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="number" name="age" id="age" placeholder="Enter Your Age">
            <select class="gender" name="gender" id="exampleFormControlSelect1">
                <option>Gender.....</option>
                <option>Male</option>
                <option>Female</option>
                <option>Transgender</option>
                <option>Prefer not to respond</option>
            </select>
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone No.">
            <textarea name="address" cols="30" rows="3" id="address" placeholder="Your Address"></textarea>
            <input type="mail" name="mail" id="mail" placeholder="Enter Your Email">
            <textarea name="description" cols="30" rows="10" id="description"
                placeholder="Additional Information about yourself"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
    <!--INSERT INTO `goa` (`s.no`, `name`, `age`, `gender`, `phone`, `address`, `email`, `ad`, `date`) VALUES ('1',
    'pallavi', '20', 'Female', '9886746348', 'mp vihar', 'this@this.com', 'my first row inserted', current_timestamp());-->
</body>

</html>