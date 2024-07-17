<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize input data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);
    
    // Validate input (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }
    
    // Prepare data to be saved
    $data = "Name: $name\nEmail: $email\nMessage: $message\n\n";
    
    // File to save form data
    $file = 'form_data.txt';
    
    // Save data to file
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo "Form data successfully saved.";
    } else {
        echo "Error: Unable to save form data.";
    }
    
} else {
    echo "Error: Form not submitted.";
}
?>
