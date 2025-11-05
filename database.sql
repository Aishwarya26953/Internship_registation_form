CREATE DATABASE IF NOT EXISTS intern_db;
USE intern_db;

CREATE TABLE interns (
  id INT AUTO_INCREMENT PRIMARY KEY,
  internship_code VARCHAR(50),
  full_name VARCHAR(200),
  password VARCHAR(255),
  email VARCHAR(200),
  gender VARCHAR(20),
  year_of_study VARCHAR(20),
  branch VARCHAR(100),
  degree_course VARCHAR(100),
  college VARCHAR(200),
  duration VARCHAR(100),
  address TEXT,
  contact VARCHAR(20),
  linkedin VARCHAR(255),
  search_domain VARCHAR(255),
  image_path VARCHAR(255),
  resume_path VARCHAR(255),
  dob DATE,
  preferred_time TIME,
  submission_datetime DATETIME,
  start_month VARCHAR(10),
  preferred_week VARCHAR(20),
  idcard_color VARCHAR(20),
  internship_mode VARCHAR(50),
  areas_of_interest VARCHAR(255),
  skill_level INT,
  why_intern TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
