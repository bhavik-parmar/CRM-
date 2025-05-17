<?php
session_start();

include 'dbconn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if both fields are filled
    if (empty($phone) || empty($password)) {
        echo "Phone and password are required.";
        exit;
    }

    // Query to check credentials
    $stmt = $conn->prepare("SELECT id, name FROM users WHERE phone = ? AND password = ?");
    $stmt->bind_param("ss", $phone, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user is found
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Store session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        // Redirect to dashboard or home page
        header("Location: index.html");
        exit;
    } else {
        echo "Invalid phone number or password.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>