<?php
session_start();
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = $_POST['phone'];
    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

    // Validate required fields
    if (empty($phone) || empty($npassword) || empty($cpassword)) {
        showAlert("⚠️ All fields are required.", "warning");
        exit;
    }

    // Check if passwords match
    if ($npassword !== $cpassword) {
        showAlert("❌ Passwords do not match.", "danger");
        exit;
    }

    // Check if phone number exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Update password
        $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE phone = ?");
        $update_stmt->bind_param("ss", $npassword, $phone);

        if ($update_stmt->execute()) {
            showAlert("✅ Password reset successfully. Redirecting to login...", "success", "login_form.php");
        } else {
            showAlert("❌ Failed to update password.", "danger");
        }

        $update_stmt->close();
    } else {
        showAlert("❌ Phone number not found.", "danger");
    }

    $stmt->close();
    $conn->close();
} else {
    showAlert("Invalid request method.", "danger");
}

// Alert function
function showAlert($message, $type = "info", $redirect = null) {
    echo "<!DOCTYPE html><html><head>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' rel='stylesheet'>";
    
    if ($redirect) {
        echo "<meta http-equiv='refresh' content='3;url=$redirect'>";
    }

    echo "</head><body>
        <div class='container mt-5'>
            <div class='alert alert-$type' role='alert'>
                $message
            </div>
        </div>
    </body></html>";
}
?>
