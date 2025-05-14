
<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input values
    $lead_id = mysqli_real_escape_string($conn, $_POST['id']);
    $follow_up_1 = mysqli_real_escape_string($conn, $_POST['follow_up_1']);
    $follow_up_2 = mysqli_real_escape_string($conn, $_POST['follow_up_2']);
    $follow_up_3 = mysqli_real_escape_string($conn, $_POST['follow_up_3']);
    $agree = mysqli_real_escape_string($conn, $_POST['agree']);

    // Insert into follow_up table
    $query = "INSERT INTO followup 
        ( leads_id, followup_1, followup_2, followup_3, agree, create_at) 
        VALUES 
        ( '$lead_id' , '$follow_up_1', '$follow_up_2', '$follow_up_3', '$agree' ,now())";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Follow-up added successfully!'); window.location.href = 'leads.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>
