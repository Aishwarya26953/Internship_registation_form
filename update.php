<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Invalid Request");

$result = $conn->query("SELECT * FROM interns WHERE id=$id");
if ($result->num_rows == 0) die("No Record Found!");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $branch = $_POST['branch'];
  $college = $_POST['college'];
  $contact = $_POST['contact'];
  $linkedin = $_POST['linkedin'];
  $internship_mode = $_POST['internship_mode'];
  $areas_of_interest = implode(",", $_POST['areas_of_interest'] ?? []);
  $why_intern = $_POST['why_intern'];

  // Handle Image Upload
  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . "_" . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "uploads/images/" . $image_name;
    move_uploaded_file($image_tmp, $image_path);
  } else {
    $image_path = $row['image_path'];
  }

  // Handle Resume Upload
  if (!empty($_FILES['resume']['name'])) {
    $resume_name = time() . "_" . $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_path = "uploads/resumes/" . $resume_name;
    move_uploaded_file($resume_tmp, $resume_path);
  } else {
    $resume_path = $row['resume_path'];
  }

  $sql = "UPDATE interns SET 
          full_name='$full_name',
          email='$email',
          branch='$branch',
          college='$college',
          contact='$contact',
          linkedin='$linkedin',
          internship_mode='$internship_mode',
          areas_of_interest='$areas_of_interest',
          why_intern='$why_intern',
          image_path='$image_path',
          resume_path='$resume_path'
          WHERE id=$id";

  if ($conn->query($sql)) {
    echo "<script>alert('Record Updated Successfully!'); window.location='display.php';</script>";
  } else {
    echo 'Error: ' . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Application</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Update Internship Application</h2>
  <form method="POST" enctype="multipart/form-data">
    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?= htmlspecialchars($row['full_name'] ?? '') ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($row['email'] ?? '') ?>" required>

    <label>Branch:</label>
    <input type="text" name="branch" value="<?= htmlspecialchars($row['branch'] ?? '') ?>">

    <label>College Name:</label>
    <input type="text" name="college" value="<?= htmlspecialchars($row['college'] ?? '') ?>">

    <label>Contact:</label>
    <input type="tel" name="contact" maxlength="10" pattern="[0-9]{10}" value="<?= htmlspecialchars($row['contact'] ?? '') ?>">

    <label>LinkedIn Profile:</label>
    <input type="url" name="linkedin" value="<?= htmlspecialchars($row['linkedin'] ?? '') ?>">

    <label>Internship Mode:</label><br>
    <input type="radio" name="internship_mode" value="Online" <?= ($row['internship_mode'] ?? '')=='Online'?'checked':'' ?>> Online
    <input type="radio" name="internship_mode" value="Offline" <?= ($row['internship_mode'] ?? '')=='Offline'?'checked':'' ?>> Offline

    <label>Areas of Interest:</label><br>
    <?php $areas = explode(",", $row['areas_of_interest'] ?? ''); ?>
    <input type="checkbox" name="areas_of_interest[]" value="Web Development" <?= in_array('Web Development', $areas)?'checked':'' ?>> Web Development
    <input type="checkbox" name="areas_of_interest[]" value="AI/ML" <?= in_array('AI/ML', $areas)?'checked':'' ?>> AI/ML
    <input type="checkbox" name="areas_of_interest[]" value="Cyber Security" <?= in_array('Cyber Security', $areas)?'checked':'' ?>> Cyber Security

    <label>Why do you want this internship?</label>
    <textarea name="why_intern"><?= htmlspecialchars($row['why_intern'] ?? '') ?></textarea>

    <label>Update Profile Image (optional):</label>
    <input type="file" name="image" accept="image/*">
    <?php if(!empty($row['image_path'])): ?>
      <img src="<?= $row['image_path'] ?>" width="100">
    <?php endif; ?>

    <label>Update Resume (optional):</label>
    <input type="file" name="resume" accept=".pdf,.doc,.docx,.txt">
    <?php if(!empty($row['resume_path'])): ?>
      <p>Current Resume: <a href="<?= $row['resume_path'] ?>" target="_blank">View</a></p>
    <?php endif; ?>

    <input type="submit" value="Update Application">
    <a href="display.php" class="view-link">Cancel</a>
  </form>
</div>
</body>
</html>
