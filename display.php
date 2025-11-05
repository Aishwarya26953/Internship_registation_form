<?php
include 'db.php';
$result = $conn->query("SELECT * FROM interns ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Internship Applications</title>
<style>
body {
  font-family: Arial, sans-serif;
  background: #f7f9fc;
  margin: 0;
  padding: 20px;
}
h2 {
  text-align: center;
  color: #333;
}
.top-bar {
  text-align: center;
  margin-bottom: 20px;
}
.top-bar a {
  background: #007bff;
  color: #fff;
  padding: 10px 15px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
  transition: 0.3s;
}
.top-bar a:hover {
  background: #0056b3;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  background: #fff;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
}
th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
  font-size: 14px;
}
th {
  background-color: #007bff;
  color: #fff;
}
tr:nth-child(even) {
  background-color: #f9f9f9;
}
img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
}
a.download-link {
  background: #28a745;
  color: #fff;
  padding: 4px 8px;
  border-radius: 4px;
  text-decoration: none;
}
a.download-link:hover {
  background: #218838;
}
.action a {
  color: #007bff;
  text-decoration: none;
  margin-right: 10px;
}
.action a:hover {
  text-decoration: underline;
}

/* Responsive */
@media (max-width: 900px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  th {
    display: none;
  }
  td {
    border: none;
    border-bottom: 1px solid #ddd;
    position: relative;
    padding-left: 45%;
  }
  td::before {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 40%;
    white-space: nowrap;
    font-weight: bold;
    color: #333;
    content: attr(data-label);
  }
}

/* Popup overlay */
#resumePopup {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  justify-content: center;
  align-items: center;
  z-index: 1000;
}
#resumePopup iframe {
  width: 80%;
  height: 80%;
  border: none;
  background: #fff;
  border-radius: 8px;
}
#resumePopup .closeBtn {
  position: absolute;
  top: 20px;
  right: 30px;
  color: #fff;
  font-size: 25px;
  cursor: pointer;
  background: #ff4d4d;
  border: none;
  padding: 5px 10px;
  border-radius: 4px;
}
</style>
</head>
<body>
<h2>All Internship Applications</h2>

<!-- ✅ New Registration Button -->
<div class="top-bar">
  <a href="index.html">+ New Registration</a>
</div>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Profile</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Year</th>
      <th>Branch</th>
      <th>Degree</th>
      <th>College</th>
      <th>Duration</th>
      <th>Address</th>
      <th>Contact</th>
      <th>LinkedIn</th>
      <th>Search Domain</th>
      <th>Date of Birth</th>
      <th>Preferred Time</th>
      <th>Submission DateTime</th>
      <th>Start Month</th>
      <th>Preferred Week</th>
      <th>ID Card Color</th>
      <th>Internship Mode</th>
      <th>Areas of Interest</th>
      <th>Skill Level</th>
      <th>Why Internship</th>
      <th>Resume</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
if ($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    // ✅ Get stored file paths
    $profilePath = $row['image_path'];
    $resumePath  = $row['resume_path'];

    // ✅ Fix file visibility (web path)
    if (!empty($profilePath) && file_exists($profilePath)) {
      $profile = $profilePath;
    } else {
      $profile = 'https://via.placeholder.com/60';
    }

    if (!empty($resumePath) && file_exists($resumePath)) {
      $resume = "<a href='#' onclick=\"openResumePopup('{$resumePath}')\" class='download-link'>View</a>";
    } else {
      $resume = "<span style='color:#999;'>No Resume</span>";
    }

    // ✅ Convert arrays (checkbox selections)
    $areas = isset($row['areas_of_interest']) ? str_replace(",", ", ", $row['areas_of_interest']) : "";
    $duration = isset($row['duration']) ? str_replace(",", ", ", $row['duration']) : "";

    echo "<tr>
      <td data-label='ID'>{$row['id']}</td>
      <td data-label='Profile'><img src='{$profile}' alt='Profile'></td>
      <td data-label='Full Name'>{$row['full_name']}</td>
      <td data-label='Email'>{$row['email']}</td>
      <td data-label='Gender'>{$row['gender']}</td>
      <td data-label='Year'>{$row['year_of_study']}</td>
      <td data-label='Branch'>{$row['branch']}</td>
      <td data-label='Degree'>{$row['degree_course']}</td>
      <td data-label='College'>{$row['college']}</td>
      <td data-label='Duration'>{$duration}</td>
      <td data-label='Address'>{$row['address']}</td>
      <td data-label='Contact'>{$row['contact']}</td>
      <td data-label='LinkedIn'><a href='{$row['linkedin']}' target='_blank'>{$row['linkedin']}</a></td>
      <td data-label='Search Domain'>{$row['search_domain']}</td>
      <td data-label='Date of Birth'>{$row['dob']}</td>
      <td data-label='Preferred Time'>{$row['preferred_time']}</td>
      <td data-label='Submission DateTime'>{$row['submission_datetime']}</td>
      <td data-label='Start Month'>{$row['start_month']}</td>
      <td data-label='Preferred Week'>{$row['preferred_week']}</td>
      <td data-label='ID Card Color'><div style='width:20px;height:20px;border-radius:50%;background:{$row['idcard_color']}'></div></td>
      <td data-label='Internship Mode'>{$row['internship_mode']}</td>
      <td data-label='Areas of Interest'>{$areas}</td>
      <td data-label='Skill Level'>{$row['skill_level']}</td>
      <td data-label='Why Internship'>{$row['why_intern']}</td>
      <td data-label='Resume'>{$resume}</td>
      <td data-label='Actions' class='action'>
        <a href='update.php?id={$row['id']}'>Update</a>
        <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure to delete this record?\")'>Delete</a>
      </td>
    </tr>";
  }
} else {
  echo "<tr><td colspan='25' style='text-align:center;'>No records found</td></tr>";
}
$conn->close();
?>
  </tbody>
</table>

<!-- Resume Preview Popup -->
<div id="resumePopup">
  <button class="closeBtn" onclick="closeResumePopup()">✖</button>
  <iframe id="resumeFrame" src=""></iframe>
</div>

<script>
function openResumePopup(path) {
  document.getElementById('resumeFrame').src = path;
  document.getElementById('resumePopup').style.display = 'flex';
}
function closeResumePopup() {
  document.getElementById('resumeFrame').src = '';
  document.getElementById('resumePopup').style.display = 'none';
}
</script>

</body>
</html>
