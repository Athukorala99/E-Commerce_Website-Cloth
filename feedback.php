<?php
session_start();

// Database connection
include 'includes/connection.php';
include 'includes/navbar.php';

// Initialize variables for feedback submission status
$feedbackSubmitted = false;
$feedbackMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // SQL query to insert data into feedback table
    $query = "INSERT INTO feedback (type, name, email, feedback) VALUES (?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $type, $name, $email, $feedback);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $feedbackSubmitted = true;
            $feedbackMessage = "Feedback submitted successfully!";
        } else {
            $feedbackMessage = "ERROR: Could not execute query: $query. " . mysqli_error($conn);
        }
    } else {
        $feedbackMessage = "ERROR: Could not prepare query: $query. " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 25%, #c3cfe2 100%);
        }
    </style>
</head>
<body>
    <br><br><br><br><br>
    <div class="feedback-container">
        <h2>We value your feedback</h2>
        <?php if ($feedbackSubmitted): ?>
            <div class="message"><?php echo $feedbackMessage; ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="type">Feedback Type:</label>
            <select name="type" id="type" required>
                <option value="Complaint">Complaint</option>
                <option value="Suggestion">Suggestion</option>
                <option value="Compliment">Compliment</option>
            </select>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="feedback">Feedback:</label>
            <textarea name="feedback" id="feedback" rows="4" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <br><br><br><br>


    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>
