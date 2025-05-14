<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $source = $_POST['source'];
    $follow_up_1 = $_POST['follow_up_1'];
    $follow_up_2 = $_POST['follow_up_2'];
    $follow_up_3 = $_POST['follow_up_3'];
    $agree = $_POST['agree'];

    // Update leads table
    $updateLeadQuery = "UPDATE leads SET name = ?, phone = ?, email = ?, company = ?, source = ? WHERE id = ?";
    $stmtLead = $conn->prepare($updateLeadQuery);
    $stmtLead->bind_param("sssssi", $name, $phone, $email, $company, $source, $id);
    $stmtLead->execute();

    // Check if a followup row exists
    $checkQuery = "SELECT leads_id FROM followup WHERE leads_id = ?";
    $stmtCheck = $conn->prepare($checkQuery);
    $stmtCheck->bind_param("i", $id);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // Update followup
        $updateFollowupQuery = "UPDATE followup SET followup_1 = ?, followup_2 = ?, followup_3 = ?, agree = ? WHERE leads_id = ?";
        $stmtFollowup = $conn->prepare($updateFollowupQuery);
        $stmtFollowup->bind_param("ssssi", $follow_up_1, $follow_up_2, $follow_up_3, $agree, $id);
        $stmtFollowup->execute();
    } else {
        // Insert followup
        $insertFollowupQuery = "INSERT INTO followup (leads_id, followup_1, followup_2, followup_3, agree) VALUES (?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($insertFollowupQuery);
        $stmtInsert->bind_param("issss", $id, $follow_up_1, $follow_up_2, $follow_up_3, $agree);
        $stmtInsert->execute();
    }

    echo "<script>
        alert('Follow-up updated successfully!');
        window.location.href = 'followup_report.php';
    </script>";
    exit;
} else {
    echo "<script>
        alert('Invalid request.');
        window.history.back();
    </script>";
}
?>