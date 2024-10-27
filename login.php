<?php
// Database credentials;
$username = "root";
$password = "root"; // Enter your MySQL password here

// Create connection
$conn = new mysqli($username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form
$formUsername = $_POST['username'];
$formPassword = $_POST['password'];

// Check if username and password match in the database
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $formUsername, $formPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid username or password.";
}

// Close connection
$stmt->close();
$conn->close();
?>