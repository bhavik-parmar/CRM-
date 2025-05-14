<?php
include 'dbconn.php';

if (isset($_GET['id'])) {
    $lead_id = $_GET['id'];

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Step 1: Delete follow-ups
        $stmt1 = $conn->prepare("DELETE FROM followup WHERE leads_id = ?");
        $stmt1->bind_param("i", $lead_id);
        $stmt1->execute();
        $stmt1->close();

        // Step 2: Delete lead
        $stmt2 = $conn->prepare("DELETE FROM leads WHERE id = ?");
        $stmt2->bind_param("i", $lead_id);
        $stmt2->execute();
        $stmt2->close();

        $conn->commit();
        echo "<script>alert('Lead and related follow-ups deleted successfully!'); window.location.href='followup_report.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "<script>alert('Deletion failed: " . addslashes($e->getMessage()) . "'); history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request: ID missing.'); history.back();</script>";
}

$conn->close();
?>
