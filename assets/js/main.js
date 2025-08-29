// Main JavaScript for Barangay Management System

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functions when the page loads
    initNavigation();
    initComplaintForm();
    initAnimations();
    initSmoothScrolling();
    
    console.log('Barangay Management System loaded successfully!');
});

// Navigation functionality
function initNavigation() {
    // Active navigation highlighting based on scroll position
    window.addEventListener('scroll', function() {
        let current = '';
        const sections = document.querySelectorAll('section[id]');
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        // Update active nav link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });

    // Mobile menu auto-close on link click
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                bsCollapse.hide();
            }
        });
    });
}

// Smooth scrolling for navigation links
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = 80; // Account for fixed navbar
                const elementPosition = target.offsetTop;
                const offsetPosition = elementPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Complaint form handling
function initComplaintForm() {
    const complaintForm = document.getElementById('complaintForm');
    
    if (complaintForm) {
        complaintForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = {
                name: document.getElementById('complainantName').value,
                email: document.getElementById('complainantEmail').value,
                phone: document.getElementById('complainantPhone').value,
                type: document.getElementById('complaintType').value,
                details: document.getElementById('complaintDetails').value
            };
            
            // Validate form
            if (validateComplaintForm(formData)) {
                submitComplaint(formData);
            }
        });
    }
}

// Form validation
function validateComplaintForm(data) {
    let isValid = true;
    let errorMessage = '';
    
    // Check required fields
    if (!data.name.trim()) {
        errorMessage += 'Name is required.\n';
        isValid = false;
    }
    
    if (!data.email.trim()) {
        errorMessage += 'Email is required.\n';
        isValid = false;
    } else if (!isValidEmail(data.email)) {
        errorMessage += 'Please enter a valid email address.\n';
        isValid = false;
    }
    
    if (!data.type) {
        errorMessage += 'Please select a complaint type.\n';
        isValid = false;
    }
    
    if (!data.details.trim()) {
        errorMessage += 'Complaint details are required.\n';
        isValid = false;
    }
    
    if (!isValid) {
        showAlert('error', 'Please fix the following errors:\n' + errorMessage);
    }
    
    return isValid;
}

// Email validation helper
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Submit complaint (will be connected to PHP backend later)
function submitComplaint(data) {
    // Show loading state
    const submitBtn = document.querySelector('#complaintForm button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
    submitBtn.disabled = true;
    
    // Simulate API call (replace with actual AJAX call to PHP)
    setTimeout(function() {
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        
        // Show success message
        showAlert('success', 'Thank you! Your complaint has been submitted successfully. We will review it and get back to you soon.');
        
        // Reset form
        document.getElementById('complaintForm').reset();
        
        // Log the data (for development)
        console.log('Complaint submitted:', data);
    }, 2000);
}

// Alert system
function showAlert(type, message) {
    // Remove existing alerts
    const existingAlert = document.querySelector('.custom-alert');
    if (existingAlert) {
        existingAlert.remove();
    }
    
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show custom-alert`;
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '100px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    alertDiv.style.minWidth = '300px';
    alertDiv.style.maxWidth = '500px';
    
    alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message.replace(/\n/g, '<br>')}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Add to body
    document.body.appendChild(alertDiv);
    
    // Auto remove after 5 seconds
    setTimeout(function() {
        if (alertDiv && alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}

// Animation on scroll
function initAnimations() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);
    
    // Observe all cards and sections
    document.querySelectorAll('.card, section').forEach(el => {
        observer.observe(el);
    });
}

// Utility functions
function formatDate(date) {
    return new Date(date).toLocaleDateString('en-PH', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function formatTime(time) {
    return new Date(`2000-01-01 ${time}`).toLocaleTimeString('en-PH', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });
}

// Search functionality (for future use)
function searchContent(query) {
    // This can be implemented later for searching announcements, officials, etc.
    console.log('Searching for:', query);
}

// Print functionality (for future use)
function printPage() {
    window.print();
}

// Back to top functionality
function createBackToTopButton() {
    const backToTop = document.createElement('button');
    backToTop.className = 'scroll-to-top';
    backToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTop.title = 'Back to Top';
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    document.body.appendChild(backToTop);
    
    // Show/hide based on scroll position
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTop.style.display = 'block';
        } else {
            backToTop.style.display = 'none';
        }
    });
}

// Initialize back to top button
createBackToTopButton();

// Global error handler
window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
});

// Service Worker registration (for future PWA features)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        // Service worker can be implemented later for offline functionality
        console.log('Service Worker support detected');
    });
}
