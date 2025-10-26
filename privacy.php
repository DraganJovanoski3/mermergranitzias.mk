<?php
// Include translations
require_once 'includes/translations.php';

// Get current language
$current_lang = getCurrentLang();
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('page_privacy'); ?></title>
    <meta name="description" content="Политика за приватност - ZiasMermerGranit">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><?php echo t('footer_privacy'); ?></h1>
            <p>Политика за приватност на ZiasMermerGranit</p>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="privacy-page">
        <div class="container">
            <div class="privacy-content">
                <h2>Политика за Приватност</h2>
                <p class="last-updated">Последно ажурирано: 1 јануари 2025 година</p>

                <div class="privacy-section">
                    <h3>1. Вовед</h3>
                    <p>Zias Mermer & Granit DOOEL Македонски Брод (наречена "ние", "нашата", "нас") се посветува на заштитата на вашата приватност. Оваа Политика за приватност објаснува како собираме, користиме и заштитуваме вашите лични податоци кога ја посетувате нашата веб-страница или користите нашите услуги.</p>
                </div>

                <div class="privacy-section">
                    <h3>2. Податоци што ги собираме</h3>
                    <p>Можеме да собираме следниве видови информации:</p>
                    <ul>
                        <li><strong>Лични податоци:</strong> име, е-пошта, телефонски број, адреса</li>
                        <li><strong>Информации за уредот:</strong> IP адреса, тип на прелистувач, оперативен систем</li>
                        <li><strong>Информации за користење:</strong> страници што ги посетувате, време на посета</li>
                        <li><strong>Колачиња:</strong> мали датотеки што се чуваат на вашиот уред</li>
                    </ul>
                </div>

                <div class="privacy-section">
                    <h3>3. Како ги користиме вашите податоци</h3>
                    <p>Вашите податоци ги користиме за:</p>
                    <ul>
                        <li>Одговарање на вашите барања и прашања</li>
                        <li>Пружање на нашите услуги</li>
                        <li>Подобрување на нашата веб-страница</li>
                        <li>Праќање на маркетиншки материјали (само со ваша согласност)</li>
                        <li>Споредување со законските обврски</li>
                    </ul>
                </div>

                <div class="privacy-section">
                    <h3>4. Споделување на податоци</h3>
                    <p>Не ги продаваме, изнајмуваме или споделуваме вашите лични податоци со трети страни, освен:</p>
                    <ul>
                        <li>Кога е потребно за пружање на нашите услуги</li>
                        <li>Кога имаме ваша експлицитна согласност</li>
                        <li>Кога се бара по закон или судски налог</li>
                        <li>За заштита на нашите права и безбедност</li>
                    </ul>
                </div>

                <div class="privacy-section">
                    <h3>5. Безбедност на податоци</h3>
                    <p>Ги спроведуваме соодветните технички и организациски мерки за заштита на вашите лични податоци од неовластен пристап, промена, откривање или уништување.</p>
                </div>

                <div class="privacy-section">
                    <h3>6. Вашите права</h3>
                    <p>Имате право да:</p>
                    <ul>
                        <li>Пристапите до вашите лични податоци</li>
                        <li>Ги поправите неточните податоци</li>
                        <li>Ги избришете вашите податоци</li>
                        <li>Се повлечете од согласност за обработка</li>
                        <li>Подадете жалба до надлежните органи</li>
                    </ul>
                </div>

                <div class="privacy-section">
                    <h3>7. Колачиња</h3>
                    <p>Користиме колачиња за подобрување на вашето искуство на нашата веб-страница. Можете да ги оневозможите колачињата во нагодувањата на вашиот прелистувач.</p>
                </div>

                <div class="privacy-section">
                    <h3>8. Промени на политиката</h3>
                    <p>Можеме да ја ажурираме оваа Политика за приватност од време на време. Ќе ве известиме за какви било промени со поставување на новата политика на оваа страница.</p>
                </div>

                <div class="privacy-section">
                    <h3>9. Контакт</h3>
                    <p>Ако имате прашања во врска со оваа Политика за приватност, контактирајте нè на:</p>
                    <div class="contact-info">
                        <p><strong>Е-пошта:</strong> info@mermergranitzias.mk</p>
                        <p><strong>Телефон:</strong> 078 654 050</p>
                        <p><strong>Адреса:</strong> Кузман Јосифовски - Питу 8, 6530 Македонски Брод</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>
