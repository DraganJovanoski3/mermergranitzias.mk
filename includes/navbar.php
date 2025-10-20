<?php
// Navbar component for marble and granite website
// This file can be included in any page using: include 'includes/navbar.php';

// Include translations
require_once 'includes/translations.php';

// Get current page for active navigation highlighting
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<nav class="navbar">
    <div class="nav-container">
        <a href="home" class="nav-logo">
            <img src="images/zias-logo.png" alt="ZiasMermerGranit Logo" class="logo-image">
        </a>
        
        <div class="menu-icon" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="home" class="nav-link <?php echo ($current_page == 'home') ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i>
                    <span><?php echo t('nav_home'); ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="about" class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                    <i class="fas fa-info-circle"></i>
                    <span><?php echo t('nav_about'); ?></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="proizvodi" class="nav-link <?php echo ($current_page == 'products' || $current_page == 'product') ? 'active' : ''; ?>">
                    <i class="fas fa-th-large"></i>
                    <span><?php echo t('nav_products'); ?></span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="proizvodi/marble"><?php echo t('products_marble'); ?></a></li>
                    <li><a href="proizvodi/granite"><?php echo t('products_granite'); ?></a></li>
                    <li><a href="proizvodi/kitchen"><?php echo t('products_kitchen'); ?></a></li>
                    <li><a href="proizvodi/sculpture-tombstones"><?php echo t('products_sculpture'); ?></a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="contact" class="nav-link <?php echo ($current_page == 'contact') ? 'active' : ''; ?>">
                    <i class="fas fa-envelope"></i>
                    <span><?php echo t('nav_contact'); ?></span>
                </a>
            </li>
        </ul>
        
        <div class="nav-right">
            <!-- Language Switcher -->
            <?php include 'includes/language_switcher.php'; ?>
            
            <div class="nav-contact">
                <a href="tel:+38978654050" class="nav-phone">
                    <i class="fas fa-phone"></i>
                    <span>078 654 050</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu Container -->
<div class="mobile-menu-container" id="mobile-menu-container">
    <!-- Mobile Menu Header -->
    <div class="mobile-menu-header">
        <a href="home" class="nav-logo">
            <img src="images/zias-logo.png" alt="ZiasMermerGranit Logo" class="logo-image">
        </a>
    </div>
    
    <!-- Mobile Menu Navigation -->
    <ul class="mobile-nav-menu">
        <li class="nav-item">
            <a href="home" class="nav-link <?php echo ($current_page == 'home') ? 'active' : ''; ?>">
                <i class="fas fa-home"></i>
                <span><?php echo t('nav_home'); ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a href="about" class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                <i class="fas fa-info-circle"></i>
                <span><?php echo t('nav_about'); ?></span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="proizvodi" class="nav-link <?php echo ($current_page == 'products' || $current_page == 'product') ? 'active' : ''; ?>">
                <i class="fas fa-th-large"></i>
                <span><?php echo t('nav_products'); ?></span>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="proizvodi/marble"><?php echo t('products_marble'); ?></a></li>
                <li><a href="proizvodi/granite"><?php echo t('products_granite'); ?></a></li>
                <li><a href="proizvodi/kitchen"><?php echo t('products_kitchen'); ?></a></li>
                <li><a href="proizvodi/sculpture-tombstones"><?php echo t('products_sculpture'); ?></a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="contact" class="nav-link <?php echo ($current_page == 'contact') ? 'active' : ''; ?>">
                <i class="fas fa-envelope"></i>
                <span><?php echo t('nav_contact'); ?></span>
            </a>
        </li>
        
        <!-- Language Switcher in Mobile Menu -->
        <li class="nav-item mobile-language-switcher">
            <div class="language-switcher">
                <div class="language-current" onclick="toggleLanguageMenu()">
                    <span class="language-flag">
                        <?php if ($current_lang == 'mk'): ?>
                            🇲🇰
                        <?php elseif ($current_lang == 'en'): ?>
                            🇬🇧
                        <?php elseif ($current_lang == 'sq'): ?>
                            🇦🇱
                        <?php endif; ?>
                    </span>
                    <span class="language-name"><?php echo $languages[$current_lang]; ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>

                <div class="language-menu" id="languageMenu">
                    <?php foreach ($languages as $code => $name): ?>
                        <?php if ($code != $current_lang): ?>
                            <a href="<?php echo $current_url . (strpos($current_url, '?') !== false ? '&' : '?') . 'lang=' . $code; ?>" class="language-option">
                                <span class="language-flag">
                                    <?php if ($code == 'mk'): ?>
                                        🇲🇰
                                    <?php elseif ($code == 'en'): ?>
                                        🇬🇧
                                    <?php elseif ($code == 'sq'): ?>
                                        🇦🇱
                                    <?php endif; ?>
                                </span>
                                <span class="language-name"><?php echo $name; ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    </ul>
    
    <!-- Mobile Menu Footer -->
    <div class="mobile-menu-footer">
        <div class="mobile-contact-info">
            <div class="mobile-contact-item">
                <i class="fas fa-phone"></i>
                <a href="tel:+38978654050">078 654 050</a>
            </div>
            <div class="mobile-contact-item">
                <i class="fas fa-phone"></i>
                <a href="tel:+38978654050">078 654 050</a>
            </div>
            <div class="mobile-contact-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:info@ziasmermergranit.com">info@ziasmermergranit.com</a>
            </div>
            <div class="mobile-contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span><?php echo t('contact_address_full'); ?></span>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobile-overlay"></div> 