-- Barangay Management System Database
-- Run this SQL script in phpMyAdmin to create the database and tables

-- Create database
CREATE DATABASE IF NOT EXISTS `barangay_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `barangay_system`;

-- Users table (for admin and staff)
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('admin','staff','captain','secretary','treasurer') NOT NULL DEFAULT 'staff',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Residents table
CREATE TABLE `residents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resident_id` varchar(20) NOT NULL UNIQUE,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50),
  `last_name` varchar(50) NOT NULL,
  `suffix` varchar(10),
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `civil_status` enum('Single','Married','Widowed','Separated','Divorced') NOT NULL,
  `contact_number` varchar(15),
  `email` varchar(100),
  `address` text NOT NULL,
  `occupation` varchar(100),
  `emergency_contact_name` varchar(100),
  `emergency_contact_number` varchar(15),
  `voter_status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pwd_status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `senior_citizen` enum('Yes','No') NOT NULL DEFAULT 'No',
  `photo` varchar(255),
  `status` enum('active','inactive','deceased','moved') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Announcements table
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `category` enum('general','meeting','health','emergency','event','maintenance') NOT NULL DEFAULT 'general',
  `priority` enum('low','normal','high','urgent') NOT NULL DEFAULT 'normal',
  `image` varchar(255),
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `publish_date` datetime,
  `expiry_date` datetime,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Complaints table
CREATE TABLE `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_number` varchar(20) NOT NULL UNIQUE,
  `complainant_name` varchar(100) NOT NULL,
  `complainant_email` varchar(100),
  `complainant_phone` varchar(15),
  `complainant_address` text,
  `complaint_type` enum('noise','sanitation','public_safety','road_maintenance','animal_control','illegal_activities','others') NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `incident_date` date,
  `incident_location` text,
  `status` enum('pending','in_progress','resolved','closed','rejected') NOT NULL DEFAULT 'pending',
  `priority` enum('low','normal','high','urgent') NOT NULL DEFAULT 'normal',
  `assigned_to` int(11),
  `resolution` text,
  `resolved_at` datetime,
  `attachments` text, -- JSON array of file paths
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`assigned_to`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Appointments table
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_number` varchar(20) NOT NULL UNIQUE,
  `resident_id` int(11),
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100),
  `phone` varchar(15),
  `service_type` enum('certificate','permit','consultation','complaint_follow_up','others') NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` time NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled','no_show') NOT NULL DEFAULT 'pending',
  `notes` text,
  `assigned_to` int(11),
  `appointment_date` datetime,
  `completed_at` datetime,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`resident_id`) REFERENCES `residents`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`assigned_to`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Officials table
CREATE TABLE `officials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `committee` varchar(100),
  `contact_number` varchar(15),
  `email` varchar(100),
  `photo` varchar(255),
  `term_start` date NOT NULL,
  `term_end` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `bio` text,
  `display_order` int(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Certificates table
CREATE TABLE `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_number` varchar(20) NOT NULL UNIQUE,
  `resident_id` int(11) NOT NULL,
  `certificate_type` enum('barangay_clearance','certificate_of_indigency','certificate_of_residency','business_clearance','others') NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `issued_by` int(11) NOT NULL,
  `issued_date` date NOT NULL,
  `valid_until` date,
  `or_number` varchar(50),
  `amount_paid` decimal(10,2) DEFAULT 0.00,
  `status` enum('active','expired','revoked') NOT NULL DEFAULT 'active',
  `notes` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`resident_id`) REFERENCES `residents`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`issued_by`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Activity logs table
CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11),
  `action` varchar(100) NOT NULL,
  `table_name` varchar(50),
  `record_id` int(11),
  `details` text,
  `ip_address` varchar(45),
  `user_agent` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Settings table
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL UNIQUE,
  `setting_value` text,
  `description` varchar(255),
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user
INSERT INTO `users` (`username`, `email`, `password`, `full_name`, `role`, `status`) VALUES
('admin', 'admin@barangay.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin', 'active');
-- Default password is 'password'

-- Insert default settings
INSERT INTO `settings` (`setting_key`, `setting_value`, `description`) VALUES
('barangay_name', 'Barangay Sample', 'Name of the barangay'),
('barangay_address', 'Sample Address, City, Province', 'Complete address of the barangay'),
('barangay_phone', '(123) 456-7890', 'Contact phone number'),
('barangay_email', 'info@barangay.gov.ph', 'Official email address'),
('captain_name', 'Juan Dela Cruz', 'Name of the barangay captain'),
('secretary_name', 'Maria Santos', 'Name of the barangay secretary'),
('treasurer_name', 'Pedro Rodriguez', 'Name of the barangay treasurer'),
('office_hours', 'Monday-Friday: 8:00 AM - 5:00 PM<br>Saturday: 8:00 AM - 12:00 PM', 'Office operating hours'),
('map_coordinates', '14.5995,120.9842', 'Latitude and longitude for map display'),
('system_maintenance', '0', 'System maintenance mode (1 = on, 0 = off)');

-- Insert sample officials
INSERT INTO `officials` (`name`, `position`, `committee`, `contact_number`, `email`, `term_start`, `term_end`, `display_order`) VALUES
('Juan Dela Cruz', 'Barangay Captain', 'Executive', '09123456789', 'captain@barangay.gov.ph', '2023-01-01', '2026-12-31', 1),
('Maria Santos', 'Barangay Secretary', 'Administrative', '09123456790', 'secretary@barangay.gov.ph', '2023-01-01', '2026-12-31', 2),
('Pedro Rodriguez', 'Barangay Treasurer', 'Finance', '09123456791', 'treasurer@barangay.gov.ph', '2023-01-01', '2026-12-31', 3),
('Ana Garcia', 'Kagawad', 'Health Committee', '09123456792', 'kagawad1@barangay.gov.ph', '2023-01-01', '2026-12-31', 4),
('Carlos Lopez', 'Kagawad', 'Peace & Order Committee', '09123456793', 'kagawad2@barangay.gov.ph', '2023-01-01', '2026-12-31', 5),
('Rosa Mendoza', 'Kagawad', 'Education Committee', '09123456794', 'kagawad3@barangay.gov.ph', '2023-01-01', '2026-12-31', 6),
('Miguel Torres', 'Kagawad', 'Infrastructure Committee', '09123456795', 'kagawad4@barangay.gov.ph', '2023-01-01', '2026-12-31', 7);

-- Insert sample announcements
INSERT INTO `announcements` (`title`, `content`, `category`, `priority`, `status`, `publish_date`, `created_by`) VALUES
('Monthly Community Meeting', 'Monthly community meeting scheduled for September 15, 2025 at 7:00 PM in the Barangay Hall. All residents are encouraged to attend.', 'meeting', 'normal', 'published', '2025-08-25 08:00:00', 1),
('Free Medical Check-up Program', 'Free medical check-up and vaccination program on September 20, 2025 from 8:00 AM to 5:00 PM. Please bring valid ID and vaccination cards.', 'health', 'high', 'published', '2025-08-28 09:00:00', 1),
('Road Maintenance Advisory', 'Main road will be closed for maintenance on September 10, 2025. Please use alternative routes. We apologize for any inconvenience.', 'maintenance', 'high', 'published', '2025-08-29 07:00:00', 1);

-- Create indexes for better performance
CREATE INDEX idx_residents_status ON residents(status);
CREATE INDEX idx_residents_name ON residents(last_name, first_name);
CREATE INDEX idx_complaints_status ON complaints(status);
CREATE INDEX idx_complaints_date ON complaints(created_at);
CREATE INDEX idx_appointments_date ON appointments(preferred_date);
CREATE INDEX idx_appointments_status ON appointments(status);
CREATE INDEX idx_announcements_status ON announcements(status, publish_date);
CREATE INDEX idx_activity_logs_user ON activity_logs(user_id, created_at);
