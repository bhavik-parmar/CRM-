<?php
include 'dbconn.php';
$sql = "SELECT id, email FROM leads";
$result = mysqli_query($conn, $sql);
?>

<div class="modal fade" id="sharedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Leads Emails</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <tr>
                    <td><input type="checkbox" class="email-checkbox" value="<?= $row['email']; ?>"></td>
                    <td><?= $row['email']; ?></td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr><td colspan="3" class="text-center">No Emails found.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Button to send emails to main page -->
        <div class="text-end mt-3">
          <button type="button" class="btn btn-primary" id="useSelectedEmails">Use Selected Emails</button>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  // Select All functionality
  $('#selectAll').on('click', function () {
    $('.email-checkbox').prop('checked', this.checked);
  });

  // Send selected emails back to the main page
  $('#useSelectedEmails').on('click', function () {
    var selectedEmails = [];
    $('.email-checkbox:checked').each(function () {
      selectedEmails.push($(this).val());
    });

    // Put into textarea#to on parent/main page
    if (selectedEmails.length > 0) {
      $('#to').val(selectedEmails.join(', '));
      var modalEl = bootstrap.Modal.getInstance(document.getElementById('sharedModal'));
      modalEl.hide(); // Close the modal
    } else {
      alert("Please select at least one email.");
    }
  });
</script>
