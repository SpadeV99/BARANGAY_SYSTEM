<?php
// Database configuration for Barangay Management System
// Update these settings according to your local environment

// Database connection settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'barangay_system');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Application settings
define('APP_NAME', 'Barangay Management System');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/BARANGAY_SYSTEM');

// Session settings
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds

// File upload settings
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); // 5MB
define('UPLOAD_PATH', 'uploads/');

// Allowed file extensions
define('ALLOWED_IMAGE_EXT', ['jpg', 'jpeg', 'png', 'gif']);
define('ALLOWED_DOC_EXT', ['pdf', 'doc', 'docx', 'txt']);

// Database connection class
class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $charset = DB_CHARSET;
    public $pdo;

    public function getConnection() {
        $this->pdo = null;
        
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->pdo;
    }
}

// Utility functions
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function redirect($url) {
    header("Location: " . $url);
    exit();
}

function flash_message($type, $message) {
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}

function get_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }
    return null;
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Check if user is admin
function is_admin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

// Format date for display
function format_date($date) {
    return date('F j, Y', strtotime($date));
}

// Format date and time for display
function format_datetime($datetime) {
    return date('F j, Y g:i A', strtotime($datetime));
}

// Get file extension
function get_file_extension($filename) {
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}

// Check if file extension is allowed
function is_allowed_file_type($filename, $allowed_extensions) {
    $ext = get_file_extension($filename);
    return in_array($ext, $allowed_extensions);
}

// Generate unique filename
function generate_unique_filename($original_filename) {
    $ext = get_file_extension($original_filename);
    return uniqid() . '_' . time() . '.' . $ext;
}

// Log activity (can be extended later)
function log_activity($user_id, $action, $details = '') {
    // This can be implemented to log user activities
    error_log("User ID: $user_id, Action: $action, Details: $details");
}
?>
