<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home";
  
// Create connection
$conn = new mysqli($servername, 
    $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }

// Getting the data
$data['name'] = $_POST['name'];
$data['email'] = $_POST['email'];
$data['password'] = $_POST['password'];

// Creating the query
$sql = "INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)";

// Inserting the variables to avoid sql injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $data['name'] , $data['email'], $data['password']);

// Spotting the Error is something happens
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// CLose the shit
$stmt->close();

echo $data['name'];
exit;

?>
