<?php
include 'dbconn.php';

// Get form values
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$company = $_POST['company'] ?? '';
$city = $_POST['city'] ?? '';
$id = $_POST['id'] ?? ''; // optional

if (!empty($id)) {
    // Update existing record
    $stmt = $conn->prepare("UPDATE contact SET name = ?, phone = ?, email = ?, company = ?, city = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $name, $phone, $email, $company, $city, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Contact updated successfully!'); window.location.href='contact_details.php';</script>";
    } else {
        echo "<script>alert('Error updating contact: " . addslashes($stmt->error) . "'); history.back();</script>";
    }

    $stmt->close();
} else {
    // Insert new record
    $stmt = $conn->prepare("INSERT INTO contact (name, phone, email, company, city) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone, $email, $company, $city);

    if ($stmt->execute()) {
        echo "<script>alert('Contact added successfully!'); window.location.href='contact_details.php';</script>";
    } else {
        echo "<script>alert('Error inserting contact: " . addslashes($stmt->error) . "'); history.back();</script>";
    }

    $stmt->close();
}

$conn->close();
?>
