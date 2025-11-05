<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $internship_code = $_POST['internship_code'];
  $full_name = $_POST['full_name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $gender = $_POST['gender'] ?? '';
  $year = $_POST['year_of_study'] ?? '';
  $branch = $_POST['branch'];
  $degree = $_POST['degree_course'];
  $college = $_POST['college'];
  $duration = implode(",", $_POST['duration'] ?? []);
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $linkedin = $_POST['linkedin'];
  $search_domain = $_POST['search_domain'];
  $dob = $_POST['dob'];
  $preferred_time = $_POST['preferred_time'];
  $submission_datetime = $_POST['submission_datetime'];
  $start_month = $_POST['start_month'];
  $preferred_week = $_POST['preferred_week'];
  $idcard_color = $_POST['idcard_color'];
  $internship_mode = $_POST['internship_mode'] ?? '';
  $areas_of_interest = implode(",", $_POST['areas_of_interest'] ?? []);
  $skill_level = $_POST['skill_level'];
  $why_intern = $_POST['why_intern'];

  // ✅ Ensure folders exist
  $imageDir = "uploads/images/";
  $resumeDir = "uploads/resumes/";
  if (!is_dir($imageDir)) mkdir($imageDir, 0777, true);
  if (!is_dir($resumeDir)) mkdir($resumeDir, 0777, true);

  // ✅ Handle Image Upload
  $image_path = "";
  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . "_" . basename($_FILES['image']['name']);
    $image_path = $imageDir . $image_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
  }

  // ✅ Handle Resume Upload
  $resume_path = "";
  if (!empty($_FILES['resume']['name'])) {
    $resume_name = time() . "_" . basename($_FILES['resume']['name']);
    $resume_path = $resumeDir . $resume_name;
    move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path);
  }

  // ✅ Insert into Database
  $sql = "INSERT INTO interns 
  (internship_code, full_name, password, email, gender, year_of_study, branch, degree_course, college, duration, address, contact, linkedin, search_domain, image_path, resume_path, dob, preferred_time, submission_datetime, start_month, preferred_week, idcard_color, internship_mode, areas_of_interest, skill_level, why_intern)
  VALUES ('$internship_code', '$full_name', '$password', '$email', '$gender', '$year', '$branch', '$degree', '$college', '$duration', '$address', '$contact', '$linkedin', '$search_domain', '$image_path', '$resume_path', '$dob', '$preferred_time', '$submission_datetime', '$start_month', '$preferred_week', '$idcard_color', '$internship_mode', '$areas_of_interest', '$skill_level', '$why_intern')";

  if ($conn->query($sql)) {
    echo "<script>alert('Application Submitted Successfully!'); window.location='display.php';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
