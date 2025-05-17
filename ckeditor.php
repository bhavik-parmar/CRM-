<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Editor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
  <style>
    .editor-box {
      border: 1px solid #ccc;
      padding: 20px;
      margin: 30px auto;
      max-width: 900px;
      background-color: #fff;
    }
    .editor-box h5 {
      background-color: #f2f2f2;
      padding: 10px;
      border: 1px solid #ccc;
      margin-bottom: 20px;
      font-weight: bold;
    }
    .btn-group-top {
      margin-bottom: 15px;
    }
    label {
      font-weight: bold;
      margin-top: 10px;
    }
    textarea, input[type="text"] {
      width: 100%;
      resize: none;
    }
    .btn-send {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="editor-box">
  <h5>Email Editor</h5>

  <div class="btn-group btn-group-top" role="group">
    <button type="button" class="btn btn-outline-primary">Select Participant Email</button>
    <button type="button" class="btn btn-outline-primary">Select Newsletter Email</button>
    <button type="button" class="btn btn-outline-primary">Select Contact Email</button>
  </div>

  <form action="#" method="post">
    <div class="mb-3">
      <label for="to">To :</label>
      <textarea id="to" name="to" rows="2" class="form-control"></textarea>
    </div>

    <div class="mb-3">
      <label for="subject">Subject :</label>
      <input type="text" id="subject" name="subject" class="form-control">
    </div>

    <div class="mb-3">
      <label for="message">Message :</label>
      <textarea name="message" id="message" rows="8" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-send">Send</button>
  </form>
</div>

<script>
  CKEDITOR.replace('message');
</script>

</body>
</html>
