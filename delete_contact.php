<?php
include 'dbconn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute delete query
    $stmt = $conn->prepare("DELETE FROM contact WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Contact deleted successfully!'); window.location.href='contact_details.php';</script>";
    } else {
        echo "<script>alert('Error deleting contact: " . addslashes($stmt->error) . "'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request: ID missing.'); history.back();</script>";
}

$conn->close();
?>
