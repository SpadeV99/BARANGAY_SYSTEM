# Barangay Management System

A comprehensive web-based management system for Philippine barangays, built with PHP, MySQL, and Bootstrap.

## Features

### 🏛️ Public Website
- **Announcements** - Latest barangay news and updates
- **Upcoming Appointments** - Schedule appointments with officials
- **Interactive Map** - Barangay location with Google Maps integration
- **Complaint System** - Submit complaints and concerns online
- **Officials Directory** - Meet your barangay leadership
- **Contact Information** - Get in touch with barangay office

### 👨‍💼 Admin Panel
- **Dashboard** - Overview of system statistics
- **Resident Management** - Register and manage resident records
- **Appointment Scheduling** - Manage appointments and schedules
- **Complaint Handling** - Process and resolve complaints
- **Certificate Issuance** - Generate barangay certificates
- **User Management** - Manage system users and roles
- **Content Management** - Update announcements and information

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP 8.x
- **Database**: MySQL 8.x
- **Server**: Apache (via Laragon)
- **Icons**: Font Awesome 6
- **Maps**: Google Maps API

## Installation

### Prerequisites
- Laragon (or XAMPP/WAMP) with PHP 8.x and MySQL
- Web browser
- Text editor/IDE

### Setup Instructions

1. **Clone or Download**
   ```bash
   git clone https://github.com/SpadeV99/BARANGAY_SYSTEM.git
   ```

2. **Database Setup**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `barangay_system`
   - Import the SQL file: `database/barangay_system.sql`

3. **Configuration**
   - Update database credentials in `includes/config.php`
   - Modify barangay information in the database `settings` table

4. **File Permissions**
   - Ensure `uploads/` directory is writable
   - Set appropriate permissions for image uploads

5. **Access the System**
   - **Public Site**: http://localhost/BARANGAY_SYSTEM/
   - **Admin Panel**: http://localhost/BARANGAY_SYSTEM/admin/
   - **Default Admin**: username: `admin`, password: `password`

## Project Structure

```
BARANGAY_SYSTEM/
├── admin/                  # Admin panel files
├── assets/                 # Static assets
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── images/            # Images and media
├── database/              # Database files
├── includes/              # PHP includes and configuration
├── pages/                 # Additional pages
├── uploads/               # File uploads
├── index.php              # Main homepage
└── README.md              # This file
```

## Default Login Credentials

**Admin Account:**
- Username: `admin`
- Password: `password`

⚠️ **Important**: Change the default password after first login!

## Features in Detail

### Public Features
- Responsive design for mobile and desktop
- Smooth scrolling navigation
- Image carousel with barangay highlights
- Real-time announcement updates
- Online complaint submission
- Appointment booking system
- Officials contact directory

### Admin Features
- Secure login system
- Role-based access control
- CRUD operations for all entities
- File upload capabilities
- Activity logging
- Export functionality
- System settings management

## Security Features

- Password hashing with PHP's `password_hash()`
- CSRF token protection
- Input validation and sanitization
- SQL injection prevention with PDO
- Session management
- Activity logging

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support and questions:
- 📧 Email: [your-email@example.com]
- 🐛 Issues: [GitHub Issues](https://github.com/SpadeV99/BARANGAY_SYSTEM/issues)

## Changelog

### Version 1.0.0 (2025-08-29)
- Initial release
- Public website with all core features
- Basic admin panel structure
- Database schema implementation
- Responsive Bootstrap design

---

**Developed with ❤️ for Philippine Barangays**
