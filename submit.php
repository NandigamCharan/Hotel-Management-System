<?php
$servername = "localhost";
$username = "root";
$password = "dunnu";
$dbname = "hotel";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$date = $_POST['date'];


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['mail'];




$maxroom = "SELECT MAX(Room) FROM rooms WHERE Date='$date'";
$room = mysqli_query($conn, $maxroom);
$r = mysqli_fetch_assoc($room);

 if ($r["MAX(Room)"]<=50) {
    $newroom = $r["MAX(Room)"] + 1;
 }
 else {
    header("refresh:0; url=retry.html");
 }






$sql = "INSERT INTO rooms (Date, Room, FirstName, LastName, Gender, Phone, Email) VALUES ('$date', '$newroom', '$firstName', '$lastName', '$gender', '$phone', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("refresh:0; url=thank.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>