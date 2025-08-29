<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay San Roque Management System</title>
    
    <!-- Google Fonts - Professional Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-building me-2"></i>
                Barangay San Roque
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#announcements">Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#appointments">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#location">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#complaint">Submit Complaint</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#officials">Officials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2 px-3" href="admin/login.php">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Philippine flag stripe -->
        <div class="filipino-stripes"></div>
    </nav>

    <!-- Image Slider Section -->
    <section id="home">
        <div id="barangayCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#barangayCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#barangayCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#barangayCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/slide1.jpg" class="d-block w-100 carousel-img" alt="Barangay Hall">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="display-4 fw-bold text-shadow">Welcome to Barangay San Roque</h1>
                        <p class="lead text-shadow">Serving our community with Filipino pride and dedication</p>
                        <div class="filipino-stripes mt-3"></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/slide2.jpg" class="d-block w-100 carousel-img" alt="Community Events">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold text-shadow">Maka-Diyos, Maka-Tao, Makakalikasan, Makabansa</h2>
                        <p class="lead text-shadow">Building stronger Filipino communities together</p>
                        <div class="filipino-stripes mt-3"></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/slide3.jpg" class="d-block w-100 carousel-img" alt="Barangay Services">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="fw-bold text-shadow">Quality Services</h2>
                        <p class="lead text-shadow">Efficient and reliable barangay services para sa bayan</p>
                        <div class="filipino-stripes mt-3"></div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#barangayCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#barangayCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Announcements Section -->
    <section id="announcements" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-filipino-blue">
                        <i class="fas fa-bullhorn me-3 text-filipino-gold"></i>Announcements
                    </h2>
                    <p class="lead text-muted">Stay updated with the latest barangay news and updates</p>
                    <div class="filipino-stripes mx-auto" style="width: 200px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Community Meeting</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Monthly community meeting scheduled for September 15, 2025 at 7:00 PM in the Barangay Hall.</p>
                            <small class="text-muted">Posted: August 25, 2025</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-medkit me-2"></i>Health Program</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Free medical check-up and vaccination program on September 20, 2025 from 8:00 AM to 5:00 PM.</p>
                            <small class="text-muted">Posted: August 28, 2025</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Road Closure</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Main road will be closed for maintenance on September 10, 2025. Please use alternative routes.</p>
                            <small class="text-muted">Posted: August 29, 2025</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Appointments Section -->
    <section id="appointments" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-filipino-blue">
                        <i class="fas fa-clock me-3 text-filipino-gold"></i>Upcoming Appointments
                    </h2>
                    <p class="lead text-muted">Schedule your appointment with barangay officials</p>
                    <div class="filipino-stripes mx-auto" style="width: 200px;"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Service</th>
                                            <th>Available Slots</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>September 5, 2025</td>
                                            <td>9:00 AM - 5:00 PM</td>
                                            <td>Certificate Requests</td>
                                            <td><span class="badge bg-success">15 Available</span></td>
                                        </tr>
                                        <tr>
                                            <td>September 8, 2025</td>
                                            <td>1:00 PM - 4:00 PM</td>
                                            <td>Business Permit</td>
                                            <td><span class="badge bg-warning">5 Available</span></td>
                                        </tr>
                                        <tr>
                                            <td>September 12, 2025</td>
                                            <td>8:00 AM - 12:00 PM</td>
                                            <td>Consultation</td>
                                            <td><span class="badge bg-success">20 Available</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <a href="pages/appointment.php" class="btn btn-primary btn-lg">
                                    <i class="fas fa-calendar-plus me-2"></i>Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location/Map Section -->
    <section id="location" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-filipino-blue">
                        <i class="fas fa-map-marker-alt me-3 text-filipino-gold"></i>Our Location
                    </h2>
                    <p class="lead text-muted">Find us on the map</p>
                    <div class="filipino-stripes mx-auto" style="width: 200px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-body p-0">
                            <!-- Placeholder for Google Maps -->
                            <div id="map" style="height: 400px; width: 100%;">
                                <!-- Temporary placeholder - will be replaced with Google Maps API -->
                                <div class="d-flex align-items-center justify-content-center h-100 bg-secondary text-white">
                                    <div class="text-center">
                                        <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                                        <h4>Google Maps Integration</h4>
                                        <p>Map will be displayed here using Google Maps API</p>
                                        <small>Specific Philippines location will be configured</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary text-white">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><i class="fas fa-map-marker-alt me-2"></i>Address:</h6>
                                    <p class="mb-0">Barangay Hall, Your Location, Philippines</p>
                                </div>
                                <div class="col-md-6">
                                    <h6><i class="fas fa-directions me-2"></i>Get Directions:</h6>
                                    <a href="#" class="text-white">Open in Google Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Submit Complaint Section -->
    <section id="complaint" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-filipino-red">
                        <i class="fas fa-file-alt me-3 text-filipino-gold"></i>Submit a Complaint
                    </h2>
                    <p class="lead text-muted">Your voice matters - help us improve our community</p>
                    <div class="filipino-stripes mx-auto" style="width: 200px;"></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <form id="complaintForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="complainantName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="complainantName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="complainantEmail" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="complainantEmail" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="complainantPhone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="complainantPhone">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="complaintType" class="form-label">Complaint Type</label>
                                        <select class="form-select" id="complaintType" required>
                                            <option value="">Select type...</option>
                                            <option value="noise">Noise Complaint</option>
                                            <option value="sanitation">Sanitation Issue</option>
                                            <option value="public_safety">Public Safety</option>
                                            <option value="road_maintenance">Road Maintenance</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="complaintDetails" class="form-label">Complaint Details</label>
                                    <textarea class="form-control" id="complaintDetails" rows="5" placeholder="Please describe your complaint in detail..." required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Submit Complaint
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Barangay Officials Section -->
    <section id="officials" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-filipino-blue">
                        <i class="fas fa-users me-3 text-filipino-gold"></i>Barangay Officials
                    </h2>
                    <p class="lead text-muted">Meet our dedicated barangay leadership</p>
                    <div class="filipino-stripes mx-auto" style="width: 200px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/captain.jpg" class="rounded-circle mb-3" width="150" height="150" alt="Barangay Captain">
                            <h5 class="card-title text-filipino-blue">Juan Dela Cruz</h5>
                            <p class="card-text text-filipino-red fw-bold">Barangay Captain</p>
                            <p class="small">Leading our community with integrity and dedication for over 10 years.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/secretary.jpg" class="rounded-circle mb-3" width="150" height="150" alt="Barangay Secretary">
                            <h5 class="card-title text-filipino-blue">Maria Santos</h5>
                            <p class="card-text text-filipino-red fw-bold">Barangay Secretary</p>
                            <p class="small">Managing administrative affairs and resident services efficiently.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/treasurer.jpg" class="rounded-circle mb-3" width="150" height="150" alt="Barangay Treasurer">
                            <h5 class="card-title text-filipino-blue">Pedro Rodriguez</h5>
                            <p class="card-text text-filipino-red fw-bold">Barangay Treasurer</p>
                            <p class="small">Ensuring transparent and responsible financial management.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/kagawad1.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Kagawad">
                            <h6 class="card-title text-filipino-blue">Ana Garcia</h6>
                            <p class="card-text text-filipino-red small fw-bold">Kagawad - Health Committee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/kagawad2.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Kagawad">
                            <h6 class="card-title text-filipino-blue">Carlos Lopez</h6>
                            <p class="card-text text-filipino-red small fw-bold">Kagawad - Peace & Order</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/kagawad3.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Kagawad">
                            <h6 class="card-title text-filipino-blue">Rosa Mendoza</h6>
                            <p class="card-text text-filipino-red small fw-bold">Kagawad - Education</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center shadow h-100">
                        <div class="card-body">
                            <img src="assets/images/kagawad4.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Kagawad">
                            <h6 class="card-title text-filipino-blue">Miguel Torres</h6>
                            <p class="card-text text-filipino-red small fw-bold">Kagawad - Infrastructure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-filipino-blue">
                        <i class="fas fa-phone me-3 text-filipino-gold"></i>Contact Us
                    </h2>
                    <p class="lead text-muted">Get in touch with us for any inquiries or assistance</p>
                    <div class="filipino-stripes mx-auto" style="width: 200px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center shadow">
                        <div class="card-body">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <h5 class="card-title">Visit Us</h5>
                            <p class="card-text">
                                Barangay Hall<br>
                                Your Street Address<br>
                                City, Province, Philippines
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center shadow">
                        <div class="card-body">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-phone fa-lg"></i>
                            </div>
                            <h5 class="card-title">Call Us</h5>
                            <p class="card-text">
                                <strong>Landline:</strong> (123) 456-7890<br>
                                <strong>Mobile:</strong> +63 912 345 6789<br>
                                <strong>Emergency:</strong> 911
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center shadow">
                        <div class="card-body">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-envelope fa-lg"></i>
                            </div>
                            <h5 class="card-title">Email Us</h5>
                            <p class="card-text">
                                <strong>General:</strong> info@barangay.gov.ph<br>
                                <strong>Captain:</strong> captain@barangay.gov.ph<br>
                                <strong>Secretary:</strong> secretary@barangay.gov.ph
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h4 class="mb-3">Office Hours</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-1"><strong>Monday - Friday:</strong> 8:00 AM - 5:00 PM</p>
                                    <p class="mb-1"><strong>Saturday:</strong> 8:00 AM - 12:00 PM</p>
                                    <p class="mb-0"><strong>Sunday:</strong> Closed (Emergency only)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-building me-2"></i>Barangay San Roque</h5>
                    <p class="mb-0">Serving our community with transparency and efficiency.</p>
                    <small class="text-filipnio-gold">🇵🇭 Proud to serve the Filipino community</small>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">&copy; 2025 Barangay San Roque. All rights reserved.</p>
                    <small>Developed with ❤️ for our Filipino community</small>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="filipino-stripes"></div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
