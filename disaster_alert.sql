CREATE DATABASE disaster_alert_db;
USE disaster_alert_db;

-- USERS TABLE
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(150) NOT NULL,
    username VARCHAR(150) UNIQUE,
    email VARCHAR(150) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','officer','citizen') DEFAULT 'citizen',
    status ENUM('active','inactive') DEFAULT 'inactive',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notifications(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
title VARCHAR(255),
message TEXT,
is_read TINYINT(1) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ALERTS TABLE
CREATE TABLE alerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    severity ENUM('Low','Medium','High','Critical') NOT NULL,
    location VARCHAR(255),
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);


-- INCIDENT REPORTS
CREATE TABLE incidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    incident_type VARCHAR(100),
    location VARCHAR(255),
    description TEXT,
    image VARCHAR(255),
    status ENUM('Pending','Verified','Resolved') DEFAULT 'Pending',
    reported_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- INCIDENT UPDATES
CREATE TABLE incident_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    incident_id INT,
    officer_id INT,
    update_message TEXT,
    update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (incident_id) REFERENCES incidents(id),
    FOREIGN KEY (officer_id) REFERENCES users(id)
);

-- RESPONSE TEAMS
CREATE TABLE response_teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100),
    contact_person VARCHAR(100),
    phone VARCHAR(30)
);

-- INCIDENT ASSIGNMENTS
CREATE TABLE incident_assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    incident_id INT,
    team_id INT,
    assigned_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (incident_id) REFERENCES incidents(id),
    FOREIGN KEY (team_id) REFERENCES response_teams(id)
);

-- EMERGENCY CONTACTS
CREATE TABLE emergency_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agency_name VARCHAR(150),
    phone VARCHAR(30),
    email VARCHAR(150),
    address TEXT
);

-- NOTIFICATIONS
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    message TEXT,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- ACTIVITY LOGS
CREATE TABLE activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    activity TEXT,
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- DEFAULT ADMIN ACCOUNT
iNSERT INTO users
(fullname,username,email,phone,password,role)
VALUES
(
'Abdul','Sahid@admin.com','abdul27253@.com','073877547','admin','System Administrator',);

-- SAMPLE EMERGENCY CONTACTS
INSERT INTO emergency_contacts
(agency_name,phone,email,address)
VALUES
('National Disaster Management Agency','117','info@ndma.gov.sl','Freetown'),
('Sierra Leone Police','019','info@police.gov.sl','Freetown'),
('Fire Force','999','fire@sl.gov.sl','Freetown');

ALTER TABLE incidents
ADD latitude DECIMAL(10,8),
ADD longitude DECIMAL(11,8);

ALTER TABLE alerts
ADD latitude DECIMAL(10,8),
ADD longitude DECIMAL(11,8);