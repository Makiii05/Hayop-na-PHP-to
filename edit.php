<?php
$conn=new mysqli("localhost","root","","try");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $oldName = $_POST['old_name']; // Store the original name in a hidden field
    $name = $_POST['txtname'];
    $age = $_POST['txtage'];

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("UPDATE tbltry SET Name = ?, Age = ? WHERE Name = ?");
    $stmt->bind_param("sis", $name, $age, $oldName);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to php.php after successful update
        header("location:php.php");
    } else {
        // Handle the error (you might want to customize this based on your needs)
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
