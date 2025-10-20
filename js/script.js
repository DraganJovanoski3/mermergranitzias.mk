// Enhanced Mobile Navigation Toggle
const menuIcon = document.querySelector('.menu-icon');
const navMenu = document.querySelector('.nav-menu');
const mobileMenuContainer = document.querySelector('.mobile-menu-container');
const mobileOverlay = document.querySelector('.mobile-menu-overlay');
const body = document.body;

if (menuIcon && mobileMenuContainer) {
    menuIcon.addEventListener('click', () => {
        menuIcon.classList.toggle('active');
        mobileMenuContainer.classList.toggle('active');
        mobileOverlay.classList.toggle('active');
        body.classList.toggle('menu-open');
    });

    // Close mobile menu when clicking on overlay
    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', () => {
            closeMobileMenu();
        });
    }

    // Handle mobile dropdown functionality
    const dropdownItems = document.querySelectorAll('.mobile-nav-menu .dropdown');
    dropdownItems.forEach(dropdown => {
        const dropdownLink = dropdown.querySelector('.nav-link');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');
        
        if (dropdownLink && dropdownMenu) {
            dropdownLink.addEventListener('click', (e) => {
                // Only handle dropdown on mobile
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation(); // Prevent event bubbling
                    dropdown.classList.toggle('active');
                    
                    // Close other dropdowns
                    dropdownItems.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.classList.remove('active');
                        }
                    });
                }
            });
        }
    });

    // Close mobile menu when clicking on regular navigation links (not dropdown links)
    document.querySelectorAll('.mobile-nav-menu .nav-item:not(.dropdown) .nav-link').forEach(n => n.addEventListener('click', () => {
        closeMobileMenu();
    }));

    // Handle dropdown menu item clicks
    document.querySelectorAll('.mobile-nav-menu .dropdown-menu a').forEach(dropdownLink => {
        dropdownLink.addEventListener('click', (e) => {
            // Close mobile menu when clicking on dropdown items
            closeMobileMenu();
        });
    });

    // Prevent clicks inside dropdown from closing the mobile menu
    document.querySelectorAll('.mobile-nav-menu .dropdown-menu').forEach(dropdownMenu => {
        dropdownMenu.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent clicks inside dropdown from bubbling up
        });
    });

    // Close mobile menu on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            closeMobileMenu();
        }
    });

    // Close mobile menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMobileMenu();
        }
    });
}

// Function to close mobile menu
function closeMobileMenu() {
    if (menuIcon) menuIcon.classList.remove('active');
    if (mobileMenuContainer) mobileMenuContainer.classList.remove('active');
    if (mobileOverlay) mobileOverlay.classList.remove('active');
    if (body) body.classList.remove('menu-open');
    
    // Close all dropdowns
    const dropdownItems = document.querySelectorAll('.mobile-nav-menu .dropdown');
    dropdownItems.forEach(dropdown => {
        dropdown.classList.remove('active');
    });
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Navbar background change on scroll - FIXED for mobile compatibility
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        // Check if we're on mobile
        const isMobile = window.innerWidth <= 768;
        
        if (window.scrollY > 100) {
            // On mobile, keep a consistent dark background
            if (isMobile) {
                navbar.style.background = 'rgba(26, 26, 26, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.3)';
            } else {
                navbar.style.background = 'rgba(26, 26, 26, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.3)';
            }
        } else {
            // On mobile, maintain a slightly more opaque background for better visibility
            if (isMobile) {
                navbar.style.background = 'rgba(26, 26, 26, 0.97)';
                navbar.style.boxShadow = '0 1px 10px rgba(0, 0, 0, 0.2)';
            } else {
                navbar.style.background = 'rgba(26, 26, 26, 0.95)';
                navbar.style.boxShadow = 'none';
            }
        }
    }
});

// Product filtering functionality
const categoryButtons = document.querySelectorAll('.category-btn');
const productItems = document.querySelectorAll('.product-item');

// Initialize filter on page load
document.addEventListener('DOMContentLoaded', () => {
    // Check if there's a category parameter in the URL (both query string and path)
    const urlParams = new URLSearchParams(window.location.search);
    let initialCategory = urlParams.get('category') || 'all';
    
    // If no query parameter, check the URL path for /proizvodi/{category}
    if (initialCategory === 'all') {
        const pathParts = window.location.pathname.split('/');
        const proizvodiIndex = pathParts.indexOf('proizvodi');
        if (proizvodiIndex !== -1 && pathParts[proizvodiIndex + 1]) {
            initialCategory = pathParts[proizvodiIndex + 1];
        }
    }
    
    console.log('Initial category:', initialCategory);
    console.log('Product items found:', productItems.length);
    
    // Special handling for sculpture-tombstones category
    if (initialCategory === 'sculpture-tombstones') {
        // Show gallery sections
        const sculptureGallery = document.getElementById('sculpture-gallery');
        const tombstoneGallery = document.getElementById('tombstone-gallery');
        if (sculptureGallery) sculptureGallery.style.display = 'block';
        if (tombstoneGallery) tombstoneGallery.style.display = 'block';
        
        // Also show sculpture-tombstones products
        productItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            
            if (itemCategory === 'sculpture-tombstones') {
                item.classList.remove('hidden');
                item.style.display = 'block';
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            } else {
                item.classList.add('hidden');
                item.style.display = 'none';
            }
        });
    } else {
        // Apply initial filter for other categories
        productItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            
            if (initialCategory === 'all' || itemCategory === initialCategory) {
                item.classList.remove('hidden');
                item.style.display = 'block';
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            } else {
                item.classList.add('hidden');
                item.style.display = 'none';
            }
        });
        
        // Hide gallery sections for non-sculpture categories
        const sculptureGallery = document.getElementById('sculpture-gallery');
        const tombstoneGallery = document.getElementById('tombstone-gallery');
        if (sculptureGallery) sculptureGallery.style.display = 'none';
        if (tombstoneGallery) tombstoneGallery.style.display = 'none';
    }
    
    // Set initial active state based on URL parameter
    const activeButton = document.querySelector(`.category-btn[data-category="${initialCategory}"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
});

// Set up event listeners for category buttons
categoryButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Remove active class from all buttons
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        // Add active class to clicked button
        button.classList.add('active');
        
        const category = button.getAttribute('data-category');
        console.log('Filtering by category:', category);
        
        // Navigate to friendly URL instead of using query parameters
        if (category === 'all') {
            window.location.href = 'proizvodi';
        } else {
            window.location.href = 'proizvodi/' + category;
        }
    });
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Only animate if the element is not hidden by filter and is a product item
            if (!entry.target.classList.contains('hidden') && !entry.target.classList.contains('product-item')) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        }
    });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', () => {
    const animateElements = document.querySelectorAll('.stat-item, .contact-item');
    
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// Contact form handling
const contactForm = document.querySelector('#contactForm');
if (contactForm) {
    // Real-time validation
    const inputs = contactForm.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearValidation);
    });

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const name = formData.get('name');
        const email = formData.get('email');
        const phone = formData.get('phone');
        const message = formData.get('message');
        
        // Validate all fields
        let isValid = true;
        inputs.forEach(input => {
            if (!validateField({ target: input })) {
                isValid = false;
            }
        });
        
        if (!isValid) {
            showNotification('Ве молиме пополнете ги сите задолжителни полиња правилно.', 'error');
            return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showNotification('Ве молиме внесете валидна е-пошта.', 'error');
            return;
        }
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.classList.add('loading');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Испраќање...';
        
        // Send form data via AJAX
        fetch('process_contact_enhanced.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                this.reset();
                
                // Clear validation states
                inputs.forEach(input => {
                    input.classList.remove('valid', 'invalid');
                });
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Се појави грешка при испраќањето на пораката. Обидете се повторно.', 'error');
        })
        .finally(() => {
            // Reset button
            submitBtn.classList.remove('loading');
            submitBtn.innerHTML = originalText;
        });
    });
}

// Field validation function
function validateField(e) {
    const field = e.target;
    const value = field.value.trim();
    const isRequired = field.hasAttribute('required');
    
    // Remove existing validation classes
    field.classList.remove('valid', 'invalid');
    
    // Check if field is required and empty
    if (isRequired && !value) {
        field.classList.add('invalid');
        return false;
    }
    
    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            field.classList.add('invalid');
            return false;
        }
    }
    
    // Phone validation (optional field)
    if (field.type === 'tel' && value) {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,}$/;
        if (!phoneRegex.test(value)) {
            field.classList.add('invalid');
            return false;
        }
    }
    
    // If we get here, field is valid
    if (value) {
        field.classList.add('valid');
    }
    
    return true;
}

// Clear validation on input
function clearValidation(e) {
    const field = e.target;
    field.classList.remove('valid', 'invalid');
}

// Notification system
function showNotification(message, type) {
    // Remove existing notifications
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-message">${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#27ae60' : '#e74c3c'};
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        z-index: 10000;
        max-width: 400px;
        animation: slideIn 0.3s ease;
        border: 1px solid ${type === 'success' ? '#2ecc71' : '#c0392b'};
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Close button functionality
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.addEventListener('click', () => {
        notification.remove();
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// Add CSS for notification animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .notification-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .notification-close {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-left: 10px;
    }
    
    .notification-close:hover {
        opacity: 0.8;
    }
`;
document.head.appendChild(style);

// Lazy loading for images
const images = document.querySelectorAll('img');
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src || img.src;
            img.classList.remove('lazy');
            imageObserver.unobserve(img);
        }
    });
});

images.forEach(img => {
    if (img.dataset.src) {
        imageObserver.observe(img);
    }
});

// Parallax effect for hero section - DISABLED to fix background image visibility
// window.addEventListener('scroll', () => {
//     const scrolled = window.pageYOffset;
//     const hero = document.querySelector('.hero');
//     if (hero) {
//         const rate = scrolled * -0.5;
//         hero.style.transform = `translateY(${rate}px)`;
//     }
// });

// Add loading animation
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
});

// Add CSS for loading animation
const loadingStyle = document.createElement('style');
loadingStyle.textContent = `
    body {
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    body.loaded {
        opacity: 1;
    }
`;
document.head.appendChild(loadingStyle);

// Lightbox functionality for gallery images
function openLightbox(imageSrc, caption) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');
    
    lightboxImage.src = imageSrc;
    lightboxImage.alt = caption;
    lightboxCaption.textContent = caption;
    lightbox.style.display = 'block';
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restore scrolling
}

// Close lightbox with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeLightbox();
    }
}); 