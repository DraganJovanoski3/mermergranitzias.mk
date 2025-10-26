<?php
// Language switcher component
// Available languages: mk (Macedonian), en (English), sq (Albanian)

// Get current language from session or default to Macedonian
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'mk'; // Default language
}

// Handle language change
if (isset($_GET['lang'])) {
    $allowed_langs = ['mk', 'en', 'sq'];
    if (in_array($_GET['lang'], $allowed_langs)) {
        $_SESSION['lang'] = $_GET['lang'];
    }
}

$current_lang = $_SESSION['lang'];

// Language names for display
$languages = [
    'mk' => 'Македонски',
    'en' => 'English',
    'sq' => 'Shqip'
];

// Current page URL without language parameter
$current_url = $_SERVER['REQUEST_URI'] ?? '/';
$current_url = preg_replace('/[?&]lang=[^&]*/', '', $current_url);
$current_url = rtrim($current_url, '?&');
?>

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

<script>
function toggleLanguageMenu() {
    const menu = document.getElementById('languageMenu');
    menu.classList.toggle('active');
}

// Close language menu when clicking outside
document.addEventListener('click', function(event) {
    const switcher = document.querySelector('.language-switcher');
    const menu = document.getElementById('languageMenu');
    
    if (!switcher.contains(event.target)) {
        menu.classList.remove('active');
    }
});
</script>

