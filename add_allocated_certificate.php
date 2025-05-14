<?php
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and fetch form data
    $cert_id = isset($_POST['cert_id']) ? intval($_POST['cert_id']) : 0;
    $participant_id = intval($_POST['participant_id']);
    $cert_no = mysqli_real_escape_string($conn, $_POST['cno']);
    $verification_code = mysqli_real_escape_string($conn, $_POST['vcode']);
    $course_id = intval($_POST['course_id']);
    $certificate_name = mysqli_real_escape_string($conn, $_POST['cname']);
    $start_date = mysqli_real_escape_string($conn, $_POST['sdate']);
    $end_date = mysqli_real_escape_string($conn, $_POST['edate']);
    $issue_date = mysqli_real_escape_string($conn, $_POST['idate']);
    $percentage = mysqli_real_escape_string($conn, $_POST['percentage']);

    // Get participant name
    $pname = '';
    $pquery = "SELECT name FROM contact WHERE id = $participant_id LIMIT 1";
    $presult = mysqli_query($conn, $pquery);
    if ($prow = mysqli_fetch_assoc($presult)) {
        $pname = $prow['name'];
    }

    // Get certificate image path
    $cimage = '';
    $cquery = "SELECT certificate_image FROM certificates WHERE id = $cert_id LIMIT 1";
    $cresult = mysqli_query($conn, $cquery);
    if ($crow = mysqli_fetch_assoc($cresult)) {
        $cimage = $crow['certificate_image'];
    }

    // Validate required data
    if (!empty($pname) && !empty($cimage)) {
        $font = __DIR__ . "/MillionFeeling.otf"; // Use absolute path
        $template_path = __DIR__ . "/certificates/" . $cimage;

        if (file_exists($template_path) && file_exists($font)) {
            $image = imagecreatefromjpeg($template_path);
            $color = imagecolorallocate($image, 19, 21, 22);

            // Add participant name to image
            imagettftext($image, 70, 0, 700, 800, $color, $font, $pname);

            // Generate output path
            $safe_name = preg_replace("/[^a-zA-Z0-9]/", "_", $pname);
            $output_filename = time() . "_" . $safe_name . ".jpg";
            $output_path = "generated_certificates/" . $output_filename;
            $full_output_path = __DIR__ . "/" . $output_path;

            imagejpeg($image, $full_output_path);
            imagedestroy($image);

            // Save to database
            $insert = "INSERT INTO certified_users 
                        (participant_id, certificate_number, verification_code, course_id, cname, sdate, edate, idate, percentage, generated_image) 
                       VALUES 
                        ('$participant_id', '$cert_no', '$verification_code', '$course_id', '$certificate_name', '$start_date', '$end_date', '$issue_date', '$percentage', '$output_path')";
            if (mysqli_query($conn, $insert)) {
                echo "<script>alert('Certificate created and data saved!'); window.location='add_cource.php';</script>";
            } else {
                echo "Error inserting record: " . mysqli_error($conn);
            }
        } else {
            echo "Certificate template or font not found!";
        }
    } else {
        echo "Missing participant name or certificate image.";
    }
}
?>
