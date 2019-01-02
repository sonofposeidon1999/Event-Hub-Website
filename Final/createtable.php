<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "oshin";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE student_details 
(student_name VARCHAR(30),
student_id INT(6),student_address VARCHAR(30),student_branch VARCHAR(30))
";
if (mysqli_query($conn, $sql)) {
    echo "Table Student_details created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>