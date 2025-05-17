<?php
session_start();
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $opassword = $_POST['opassword'];
    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];

    if (empty($phone) || empty($opassword) || empty($npassword) || empty($cpassword)) {
        showAlert("All fields are required.", "danger");
        exit;
    }

    if ($npassword !== $cpassword) {
        showAlert("New password and confirm password do not match.", "warning");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $stored_password = $user['password'];

        if ($stored_password === $opassword) {
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE phone = ?");
            $update_stmt->bind_param("ss", $npassword, $phone);

            if ($update_stmt->execute()) {
                showAlert("✅ Password reset successfully. Redirecting to login...", "success", "login_form.php");
            } else {
                showAlert("❌ Failed to update password.", "danger");
            }

            $update_stmt->close();
        } else {
            showAlert("❌ Current password is incorrect.", "danger");
        }
    } else {
        showAlert("❌ Phone number not found.", "danger");
    }

    $stmt->close();
    $conn->close();
} else {
    showAlert("Invalid request method.", "danger");
}

// Function to show Bootstrap alert and optionally redirect
function showAlert($message, $type = "info", $redirect = null) {
    echo "<!DOCTYPE html><html><head>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' rel='stylesheet'>
        <meta http-equiv='refresh' content='3;url={$redirect}'>
        </head><body>
        <div class='container mt-5'>
            <div class='alert alert-$type' role='alert'>
                $message
            </div>
        </div>
        </body></html>";
}
?>
