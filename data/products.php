<?php
// Products data file - contains all product information
// This file will be included in other pages to access product data

$products = [];

// Marble Products
$products = array_merge($products, [
    [
        'id' => 'marble-carrara-white',
        'name' => 'Carrara White',
        'category' => 'marble',
        'description' => 'Класичен бел мермер од Италија со елегантни сиви вени.',
        'long_description' => 'Carrara White е премиум мермер од Италија, познат по својата чиста бела боја и фини сиви вени. Одличен за луксузни ентериери.',
        'features' => ['Елегантен изглед', 'Висока квалитет', 'Луксузен материјал'],
        'applications' => ['Подови', 'Облоги', 'Кујнски работни плочи', 'Бањски шкафчиња'],
        'images' => ['marbel-types/viscon-white.jpg'],
        'main_image' => 'marbel-types/viscon-white.jpg',
        'availability' => 'По нарачка',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'marble-statuario',
        'name' => 'Statuario',
        'category' => 'marble',
        'description' => 'Премиум бел мермер со златни вени од Италија.',
        'long_description' => 'Statuario е еден од најлуксузните мермери од Италија, со карактеристични златни вени на бела основа.',
        'features' => ['Луксузен изглед', 'Златни вени', 'Премиум класа'],
        'applications' => ['Подови', 'Облоги', 'Скали', 'Декоративни површини'],
        'images' => ['marbel-types/Blue-Pearl.jpg'],
        'main_image' => 'marbel-types/Blue-Pearl.jpg',
        'availability' => 'По нарачка',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран'
    ],
    [
        'id' => 'marble-calacatta-gold',
        'name' => 'Calacatta Gold',
        'category' => 'marble',
        'description' => 'Бел мермер со златни вени од Италија.',
        'long_description' => 'Calacatta Gold е мермер со интензивни златни вени на бела основа. Впечатлив за луксузни проекти.',
        'features' => ['Златни вени', 'Впечатлив изглед', 'Луксузен материјал'],
        'applications' => ['Кујнски работни плочи', 'Бањски шкафчиња', 'Подови'],
        'images' => ['marbel-types/star-galaxy.jpeg'],
        'main_image' => 'marbel-types/star-galaxy.jpeg',
        'availability' => 'По нарачка',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран'
    ],
    [
        'id' => 'marble-emperador-dark',
        'name' => 'Emperador Dark',
        'category' => 'marble',
        'description' => 'Темно кафеав мермер со бели вени од Шпанија.',
        'long_description' => 'Emperador Dark е мермер со богата кафеава боја и контрастни бели вени. Одличен за модерни ентериери.',
        'features' => ['Темна боја', 'Контрастни вени', 'Модерен изглед'],
        'applications' => ['Подови', 'Облоги', 'Кујнски работни плочи'],
        'images' => ['marbel-types/Multicolor.jpeg'],
        'main_image' => 'marbel-types/Multicolor.jpeg',
        'availability' => 'По нарачка',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'marble-botticino',
        'name' => 'Botticino',
        'category' => 'marble',
        'description' => 'Беж мермер со топла нијанса од Италија.',
        'long_description' => 'Botticino е мермер со топла беж нијанса и фини вени. Создава топла и пријатна атмосфера.',
        'features' => ['Топла нијанса', 'Пријатна атмосфера', 'Лесно комбинирање'],
        'applications' => ['Подови', 'Облоги', 'Скали', 'Фасади'],
        'images' => ['marbel-types/Crema-Julia.jpeg'],
        'main_image' => 'marbel-types/Crema-Julia.jpeg',
        'availability' => 'По нарачка',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'marble-rosso-levanto',
        'name' => 'Rosso Levanto',
        'category' => 'marble',
        'description' => 'Црвен мермер со бели вени од Италија.',
        'long_description' => 'Rosso Levanto е мермер со интензивна црвена боја и контрастни бели вени. Впечатлив за специјални проекти.',
        'features' => ['Интензивна боја', 'Контрастни вени', 'Впечатлив изглед'],
        'applications' => ['Декоративни површини', 'Облоги', 'Скали'],
        'images' => ['marbel-types/Koliqi.jpg'],
        'main_image' => 'marbel-types/Koliqi.jpg',
        'availability' => 'По нарачка',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран'
    ],
]);

// Additional stone types (granite) placeholders
$products = array_merge($products, [
    [
        'id' => 'granite-rosa-beta',
        'name' => 'Rosa Beta',
        'category' => 'granite',
        'description' => 'Класичен сив гранит од Сардинија со униформна текстура.',
        'long_description' => 'Rosa Beta е гранит од Сардинија, Италија, познат по својата униформна сиво-розева текстура со ситни зрна. Одличен за екстериер и интериер поради високата издржливост.',
        'features' => ['Висока издржливост', 'Отпорност на временски влијанија', 'Ниска порозност'],
        'applications' => ['Подови', 'Фасади', 'Скали', 'Кујнски работни плочи'],
        'images' => ['marbel-types/rosobeta.jpg'],
        'main_image' => 'marbel-types/rosobeta.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-g664-bainbrook-brown',
        'name' => 'G664 (Bainbrook Brown)',
        'category' => 'granite',
        'description' => 'Кафеав гранит од Кина со равномерна зрнеста структура.',
        'long_description' => 'G664, познат и како Bainbrook Brown, е кинески гранит со топла кафеава нијанса и униформна текстура. Често се користи за плочи и степеници.',
        'features' => ['Униформен изглед', 'Добра ценовна класа', 'Лесно одржување'],
        'applications' => ['Кујнски рабови', 'Подови', 'Степеници'],
        'images' => ['marbel-types/images.jpeg'],
        'main_image' => 'marbel-types/images.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-balmoral-red',
        'name' => 'Balmoral Red',
        'category' => 'granite',
        'description' => 'Длабоко црвен гранит од Финска со висока густина.',
        'long_description' => 'Balmoral Red е фински гранит, познат по својата богата црвена боја и долготрајна стабилност. Идеален за високо-фреквентни површини.',
        'features' => ['Висока густина', 'Естетски впечатлив', 'Одличен за екстериер'],
        'applications' => ['Фасади', 'Споменици', 'Подови'],
        'images' => ['marbel-types/unnamed.jpg'],
        'main_image' => 'marbel-types/unnamed.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-g603',
        'name' => 'G603',
        'category' => 'granite',
        'description' => 'Светло сив кинески гранит (Bianco Crystal) со униформна зрнестост.',
        'long_description' => 'G603 е светло сив гранит од Кина, познат под името Bianco Crystal. Одличен избор за јавни и приватни проекти.',
        'features' => ['Униформна боја', 'Отпорен на абење', 'Прифатлива цена'],
        'applications' => ['Плочки', 'Кантари', 'Надворешни површини'],
        'images' => ['marbel-types/g603-.jpeg'],
        'main_image' => 'marbel-types/g603-.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Жбрусен'
    ],
    [
        'id' => 'granite-viscount-white',
        'name' => 'Viscon White',
        'category' => 'granite',
        'description' => 'Индиски сиво-бел гранит со динамични вени.',
        'long_description' => 'Viscon (Viscount) White е индиски гранит со контрастни сиви вени на бела основа. Популарен за модерни кујни и бањи.',
        'features' => ['Модерен изглед', 'Добра отпорност', 'Лесно комбинирање'],
        'applications' => ['Кујнски рабови', 'Облоги', 'Подови'],
        'images' => ['marbel-types/viscon-white.jpg'],
        'main_image' => 'marbel-types/viscon-white.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-vizag-blue',
        'name' => 'Vizag Blue',
        'category' => 'granite',
        'description' => 'Синкаво-сив индиски гранит со перлист ефект.',
        'long_description' => 'Vizag Blue е индиски гранит со синкаво-сиви тонови и флеки што рефлектираат светлина. Дава елегантен изглед.',
        'features' => ['Елегантен сјај', 'Отпорност на гребење', 'Ниско одржување'],
        'applications' => ['Кујни', 'Бањи', 'Декоративни површини'],
        'images' => ['marbel-types/Vizag-vblue.jpeg'],
        'main_image' => 'marbel-types/Vizag-vblue.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-blue-pearl',
        'name' => 'Blue Pearl',
        'category' => 'granite',
        'description' => 'Норвешки гранит со сини перла ефекти и силен металичен сјај.',
        'long_description' => 'Blue Pearl е премиум норвешки гранит со карактеристични сини перла-флеки. Одличен за луксузни ентериери.',
        'features' => ['Впечатлив изглед', 'Висока издржливост', 'Премиум класа'],
        'applications' => ['Работни плочи', 'Шанкови', 'Интериерни облоги'],
        'images' => ['marbel-types/Blue-Pearl.jpg'],
        'main_image' => 'marbel-types/Blue-Pearl.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран'
    ],
    [
        'id' => 'granite-multicolor-red',
        'name' => 'Multicolor',
        'category' => 'granite',
        'description' => 'Индиски мултиколор гранит со топли црвени и кафеави нијанси.',
        'long_description' => 'Multicolor (често Red Multicolor) е индиски гранит со динамичен микс на црвени и кафеави тонови. Издржлив и впечатлив.',
        'features' => ['Трајност', 'Топли нијанси', 'Визуелна динамика'],
        'applications' => ['Подови', 'Кујнски плочи', 'Надворешни облоги'],
        'images' => ['marbel-types/Multicolor.jpeg'],
        'main_image' => 'marbel-types/Multicolor.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-crema-julia',
        'name' => 'Crema Julia',
        'category' => 'granite',
        'description' => 'Шпански светло беж гранит со фина структура.',
        'long_description' => 'Crema Julia е гранит од Шпанија, светло беж со фина зрнестост. Се користи и за ентериер и екстериер.',
        'features' => ['Неутрална боја', 'Лесно комбинирање', 'Издржлив'],
        'applications' => ['Подови', 'Фасади', 'Работни плочи'],
        'images' => ['marbel-types/Crema-Julia.jpeg'],
        'main_image' => 'marbel-types/Crema-Julia.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-emerald-pearl',
        'name' => 'Emerald Pearl',
        'category' => 'granite',
        'description' => 'Норвешки темно зелен гранит со перла ефекти.',
        'long_description' => 'Emerald Pearl е гранит со длабоко зелена основа и перла-ефект. Премиум избор за луксузни површини.',
        'features' => ['Премиум изглед', 'Висока издржливост', 'Елегантен сјај'],
        'applications' => ['Работни плочи', 'Интериерни облоги'],
        'images' => ['marbel-types/Emerald-pearl.jpeg'],
        'main_image' => 'marbel-types/Emerald-pearl.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран'
    ],
    [
        'id' => 'granite-african-red',
        'name' => 'Red Africa',
        'category' => 'granite',
        'description' => 'Богат црвен гранит од Јужна Африка со висока издржливост.',
        'long_description' => 'Red Africa е гранит со интензивна црвена боја и темни флеки. Одличен за екстериерни апликации.',
        'features' => ['Висока издржливост', 'Интензивна боја'],
        'applications' => ['Споменици', 'Фасади', 'Подови'],
        'images' => ['marbel-types/Koliqi.jpg'],
        'main_image' => 'marbel-types/Koliqi.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-zimbabwe-black',
        'name' => 'Zimbabwe Black',
        'category' => 'granite',
        'description' => 'Финозрнест црн гранит од Зимбабве со униформен изглед.',
        'long_description' => 'Zimbabwe Black е црн гранит со висока густина и елегантен мат сјај. Многу популарен за работни плочи.',
        'features' => ['Униформна црна боја', 'Лесно одржување'],
        'applications' => ['Кујни', 'Бањи', 'Облоги'],
        'images' => ['marbel-types/Zimbabwe.jpg'],
        'main_image' => 'marbel-types/Zimbabwe.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-star-galaxy',
        'name' => 'Star Galaxy',
        'category' => 'granite',
        'description' => 'Црн индиски гранит со златести флеки – ефект на „ѕвездено небо“.',
        'long_description' => 'Star Galaxy од Индија е познат по своите бронзено-златни точки на длабока црна основа. Впечатлив и луксузен.',
        'features' => ['Визуелен ефект', 'Висока издржливост'],
        'applications' => ['Работни плочи', 'Шанкови', 'Интериерни детали'],
        'images' => ['marbel-types/star-galaxy.jpeg'],
        'main_image' => 'marbel-types/star-galaxy.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран'
    ],
    [
        'id' => 'granite-impala',
        'name' => 'Impala',
        'category' => 'granite',
        'description' => 'Темно сив јужноафрикански гранит со униформен образец.',
        'long_description' => 'Impala (најчесто од RSA) е издржлив гранит со неутрална боја, погоден за разни примени.',
        'features' => ['Неутрален изглед', 'Висока отпорност'],
        'applications' => ['Подови', 'Фасади', 'Кантари'],
        'images' => ['marbel-types/Impala.jpg'],
        'main_image' => 'marbel-types/Impala.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-rosa-porrino',
        'name' => 'Rosa Porrino',
        'category' => 'granite',
        'description' => 'Шпански розев гранит со униформна зрнестост.',
        'long_description' => 'Rosa Porrino (Галиција, Шпанија) е познат по топлата розева нијанса и униформната структура. Одличен за големи површини.',
        'features' => ['Униформен', 'Топол тон'],
        'applications' => ['Подови', 'Фасади', 'Скали'],
        'images' => ['marbel-types/Rosa-porino.jpeg'],
        'main_image' => 'marbel-types/Rosa-porino.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-guna-black',
        'name' => 'Guna Black',
        'category' => 'granite',
        'description' => 'Длабок црн гранит со фина зрнестост.',
        'long_description' => 'Guna Black е црн гранит со униформна фина структура. Одличен за елегантни, минималистички решенија.',
        'features' => ['Финозрнест', 'Елегантен'],
        'applications' => ['Работни плочи', 'Облоги', 'Подови'],
        'images' => ['marbel-types/Guna-black.avif'],
        'main_image' => 'marbel-types/Guna-black.avif',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-shanxi-black',
        'name' => 'Shanxi Black',
        'category' => 'granite',
        'description' => 'Кинески премиум црн гранит со униформен изглед.',
        'long_description' => 'Shanxi Black е познат по својата чиста црна боја и одлична завршна обработка. Високо ценет за луксузни апликации.',
        'features' => ['Премиум црна', 'Униформна структура'],
        'applications' => ['Споменици', 'Работни плочи', 'Интериер'],
        'images' => ['marbel-types/Xhanxi black.jpg'],
        'main_image' => 'marbel-types/Xhanxi black.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    
    // Kitchen Products
    [
        'id' => 'marble-kitchen-countertop',
        'name' => 'Кујнска работна плоча',
        'category' => 'kitchen',
        'description' => 'Елегантна мермерна работна плоча за кујна со висококвалитетна обработка.',
        'long_description' => 'Нашите мермерни кујнски работни плочи се изработени од најквалитетен мермер со прецизна обработка. Идеални за модерни кујни што бараат елеганција и функционалност.',
        'features' => ['Висока издржливост', 'Елегантен изглед', 'Лесно одржување', 'Отпорност на топлина'],
        'applications' => ['Кујнски работни плочи', 'Островни кујни', 'Бар шанкови'],
        'images' => ['kitchen/kitchen-marble-countertops.jpeg'],
        'main_image' => 'kitchen/kitchen-marble-countertops.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-kitchen-countertop',
        'name' => 'Кујнска работна плоча',
        'category' => 'kitchen',
        'description' => 'Трајна гранитна работна плоча за кујна со извонредна издржливост.',
        'long_description' => 'Гранитните кујнски работни плочи се познати по својата извонредна издржливост и отпорност на гребење. Совршени за активни кујни што бараат трајност.',
        'features' => ['Извонредна издржливост', 'Отпорност на гребење', 'Отпорност на топлина', 'Ниско одржување'],
        'applications' => ['Кујнски работни плочи', 'Островни кујни', 'Бар шанкови'],
        'images' => ['kitchen/granite-kitchen-1.jpg'],
        'main_image' => 'kitchen/granite-kitchen-1.jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    
    // Bathroom Products
    [
        'id' => 'marble-bathroom-vanity',
        'name' => 'Бањски шкафчиња',
        'category' => 'bathroom',
        'description' => 'Луксузна мермерна бања со елегантен дизајн.',
        'long_description' => 'Нашите мермерни бањски шкафчиња комбинираат елеганција со функционалност. Изработени од висококвалитетен мермер со прецизна обработка.',
        'features' => ['Елегантен дизајн', 'Висока издржливост', 'Отпорност на влага', 'Лесно одржување'],
        'applications' => ['Бањски шкафчиња', 'Тоалетни шкафчиња', 'Бањски ракови'],
        'images' => ['bathroom/marble-bathroom-1.jpeg'],
        'main_image' => 'bathroom/marble-bathroom-1.jpeg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'granite-bathroom-vanity',
        'name' => 'Бањски шкафчиња',
        'category' => 'bathroom',
        'description' => 'Модерна гранитна бања со извонредна издржливост.',
        'long_description' => 'Гранитните бањски шкафчиња се познати по својата извонредна издржливост и отпорност на влага. Совршени за модерни бањи.',
        'features' => ['Извонредна издржливост', 'Отпорност на влага', 'Модерен дизајн', 'Ниско одржување'],
        'applications' => ['Бањски шкафчиња', 'Тоалетни шкафчиња', 'Бањски ракови'],
        'images' => ['bathroom/2-1698656075-1h2zB (1).jpg'],
        'main_image' => 'bathroom/2-1698656075-1h2zB (1).jpg',
        'availability' => 'Достапен',
        'thickness' => '2cm, 3cm',
        'finish' => 'Полиран, Матиран'
    ],
    
    // Floor Products
    [
        'id' => 'marble-floor-tiles',
        'name' => 'Подни плочи',
        'category' => 'floor',
        'description' => 'Елегантни мермерни подни плочи за луксузни ентериери.',
        'long_description' => 'Нашите мермерни подни плочи се изработени од најквалитетен мермер со прецизна обработка. Идеални за луксузни ентериери што бараат елеганција.',
        'features' => ['Елегантен изглед', 'Висока издржливост', 'Лесно одржување', 'Топлост'],
        'applications' => ['Подови', 'Скали', 'Фасади', 'Интериерни облоги'],
        'images' => ['marbel-floor/Marble-Floors-002.jpg', 'marbel-floor/marble-floor-tiles.webp'],
        'main_image' => 'marbel-floor/Marble-Floors-002.jpg',
        'availability' => 'Достапен',
        'thickness' => '1cm, 2cm',
        'finish' => 'Полиран, Матиран, Жбрусен'
    ],
    [
        'id' => 'granite-floor-tiles',
        'name' => 'Подни плочи',
        'category' => 'floor',
        'description' => 'Трајни гранитни подни плочи за интензивна употреба.',
        'long_description' => 'Гранитните подни плочи се познати по својата извонредна издржливост и отпорност на абење. Совршени за интензивна употреба во јавни и приватни простори.',
        'features' => ['Извонредна издржливост', 'Отпорност на абење', 'Ниско одржување', 'Трајност'],
        'applications' => ['Подови', 'Скали', 'Фасади', 'Надворешни облоги'],
        'images' => ['granit-floor/images (1).jpeg'],
        'main_image' => 'granit-floor/images (1).jpeg',
        'availability' => 'Достапен',
        'thickness' => '1cm, 2cm',
        'finish' => 'Полиран, Матиран, Жбрусен'
    ],
    
    // Sculpture Products
    [
        'id' => 'sculpture-marble-1',
        'name' => 'Скулптура Мермер',
        'category' => 'sculpture-tombstones',
        'description' => 'Скулптуa oд мермерен во класичен стил, изработен од најквалитетен мермер.',
        'long_description' => 'Нашите Скулптури се изработени од најквалитетен мермер со прецизна обработка. Идеални за декоративни цели и колекционерски предмети.',
        'features' => ['Класичен дизајн', 'Висока прецизност', 'Елегантен изглед', 'Трајност'],
        'applications' => ['Декорација', 'Колекционерски предмети', 'Споменици', 'Интериерни детали'],
        'images' => ['sculptures/sculpture (1).jpg'],
        'main_image' => 'sculptures/sculpture (1).jpg',
        'availability' => 'Достапен',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'sculpture-marble-14',
        'name' => 'Скулптура Мермер 14',
        'category' => 'sculpture-tombstones',
        'description' => 'Модерна апстрактна скулптура од мермер со уникатен дизајн.',
        'long_description' => 'Нашите мермерни апстрактни скулптури се изработени од најквалитетен мермер со модерен дизајн. Идеални за современ ентериер и екстериер.',
        'features' => ['Модерен дизајн', 'Висока издржливост', 'Уникатен изглед', 'Отпорност на временски влијанија'],
        'applications' => ['Ентериерна декорација', 'Екстериерна декорација', 'Градина', 'Јавни простори'],
        'images' => ['sculptures/sculpture (2).jpg'],
        'main_image' => 'sculptures/sculpture (2).jpg',
        'availability' => 'Достапен',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран, Жбрусен'
    ],
    [
        'id' => 'sculpture-marble-2',
        'name' => 'Скулптура Мермер 2',
        'category' => 'sculpture-tombstones',
        'description' => 'Детална мермерна скулптура на животни со реалистичен изглед.',
        'long_description' => 'Нашите мермерни животински скулптури се изработени со голема прецизност и внимание кон детали. Идеални за градини и декоративни цели.',
        'features' => ['Реалистичен дизајн', 'Детална обработка', 'Елегантен изглед', 'Трајност'],
        'applications' => ['Градинска декорација', 'Интериерна декорација', 'Колекционерски предмети'],
        'images' => ['sculptures/sculpture (3).jpg'],
        'main_image' => 'sculptures/sculpture (3).jpg',
        'availability' => 'Достапен',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'sculpture-marble-15',
        'name' => 'Скулптура Мермер 15',
        'category' => 'sculpture-tombstones',
        'description' => 'Трајна мермерна спомен скулптура за спомен цели.',
        'long_description' => 'Нашите мермерни спомен скулптури се изработени од најквалитетен мермер со фокус на трајност и елеганција. Идеални за спомен цели и меморијали.',
        'features' => ['Трајност', 'Елегантен дизајн', 'Отпорност на временски влијанија', 'Висока издржливост'],
        'applications' => ['Споменици', 'Меморијали', 'Гробишта', 'Спомен паркови'],
        'images' => ['tombstones/tombstones (1).jpg'],
        'main_image' => 'tombstones/tombstones (1).jpg',
        'availability' => 'Достапен',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'sculpture-marble-3',
        'name' => 'Скулптура Мермер Религиозна',
        'category' => 'sculpture-tombstones',
        'description' => 'Сакрална мермерна скулптура за религиозни цели.',
        'long_description' => 'Нашите мермерни религиозни скулптури се изработени со голема прецизност и почит кон традицијата. Идеални за цркви, манастири и приватни сакрални простори.',
        'features' => ['Сакрален дизајн', 'Висока прецизност', 'Традиционален стил', 'Трајност'],
        'applications' => ['Цркви', 'Манастири', 'Сакрални простори', 'Приватни капели'],
        'images' => ['sculptures/sculpture (10).jpg'],
        'main_image' => 'sculptures/sculpture (10).jpg',
        'availability' => 'Достапен',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'sculpture-marble-16',
        'name' => 'Скулптура Мермер 16',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантна мермерна фонтана скулптура за градини и јавни простори.',
        'long_description' => 'Нашите мермерни фонтана скулптури комбинираат уметнички дизајн со функционалност. Идеални за градини, паркови и јавни простори.',
        'features' => ['Функционален дизајн', 'Отпорност на вода', 'Елегантен изглед', 'Трајност'],
        'applications' => ['Градини', 'Паркови', 'Јавни простори', 'Приватни дворови'],
        'images' => ['sculptures/sculpture (7).jpg'],
        'main_image' => 'sculptures/sculpture (7).jpg',
        'availability' => 'Достапен',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран'
    ],
    [
        'id' => 'sculpture-marble-99',
        'name' => 'Скулптура Мермер Прилагодена',
        'category' => 'sculpture-tombstones',
        'description' => 'Прилагодена мермерна скулптура според вашите спецификации.',
        'long_description' => 'Нашите прилагодени мермерни скулптури се изработуваат според вашите спецификации и дизајн. Работиме со клиентите за да создадеме уникатни уметнички дела.',
        'features' => ['Прилагоден дизајн', 'Уникатност', 'Висока прецизност', 'Професионална консултација'],
        'applications' => ['Приватни колекции', 'Корпоративни простори', 'Јавни нарачки', 'Специјални проекти'],
        'images' => ['sculptures/sculpture (12).jpg'],
        'main_image' => 'sculptures/sculpture (12).jpg',
        'availability' => 'По нарачка',
        'thickness' => 'Според спецификации',
        'finish' => 'Според спецификации'
    ],
    [
        'id' => 'sculpture-marble-17',
        'name' => 'Скулптура Мермер 17',
        'category' => 'sculpture-tombstones',
        'description' => 'Монументална мермерна архитектонска скулптура за јавни простори.',
        'long_description' => 'Нашите мермерни архитектонски скулптури се дизајнирани за јавни простори и монументални проекти. Комбинираат уметнички дизајн со архитектонска функционалност.',
        'features' => ['Монументален дизајн', 'Висока издржливост', 'Архитектонска функционалност', 'Отпорност на временски влијанија'],
        'applications' => ['Јавни простори', 'Архитектонски проекти', 'Урбанистички решенија', 'Културни институции'],
        'images' => ['sculptures/sculpture (9).jpg'],
        'main_image' => 'sculptures/sculpture (9).jpg',
        'availability' => 'По нарачка',
        'thickness' => 'Различни димензии',
        'finish' => 'Полиран, Матиран, Жбрусен'
    ],

    // Individual Sculpture Products (one for each image)
    [
        'id' => 'sculpture-marble-1',
        'name' => 'Скулптура Мермер 1',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантна мермерна скулптура со уметнички дизајн.',
        'long_description' => 'Уметничка мермерна скулптура изработена од најквалитетен мермер со прецизна обработка.',
        'features' => ['Уметнички дизајн', 'Висока прецизност', 'Елегантен изглед', 'Трајност'],
        'applications' => ['Декоративни цели', 'Приватни колекции', 'Корпоративни простори'],
        'images' => ['sculptures/sculpture (1).jpg'],
        'main_image' => 'sculptures/sculpture (1).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-2',
        'name' => 'Скулптура Мермер 2',
        'category' => 'sculpture-tombstones',
        'description' => 'Уникатна мермерна скулптура со модерен дизајн.',
        'long_description' => 'Модерна мермерна скулптура која комбинира традиционални техники со современ дизајн.',
        'features' => ['Модерен дизајн', 'Уникатност', 'Висока квалитет', 'Трајност'],
        'applications' => ['Современи простори', 'Уметнички галерии', 'Приватни колекции'],
        'images' => ['sculptures/sculpture (2).jpg'],
        'main_image' => 'sculptures/sculpture (2).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-3',
        'name' => 'Скулптура Мермер 3',
        'category' => 'sculpture-tombstones',
        'description' => 'Класична мермерна скулптура со традиционален дизајн.',
        'long_description' => 'Традиционална мермерна скулптура која го одразува класичниот уметнички стил.',
        'features' => ['Класичен дизајн', 'Традиционални техники', 'Елегантност', 'Трајност'],
        'applications' => ['Класични простори', 'Музеи', 'Културни институции'],
        'images' => ['sculptures/sculpture (3).jpg'],
        'main_image' => 'sculptures/sculpture (3).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-5',
        'name' => 'Скулптура Мермер 5',
        'category' => 'sculpture-tombstones',
        'description' => 'Апстрактна мермерна скулптура со современ дизајн.',
        'long_description' => 'Апстрактна мермерна скулптура која претставува современ уметнички израз.',
        'features' => ['Апстрактен дизајн', 'Современ стил', 'Уметнички израз', 'Трајност'],
        'applications' => ['Современи галерии', 'Корпоративни простори', 'Уметнички колекции'],
        'images' => ['sculptures/sculpture (5).jpg'],
        'main_image' => 'sculptures/sculpture (5).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-6',
        'name' => 'Скулптура Мермер 6',
        'category' => 'sculpture-tombstones',
        'description' => 'Декоративна мермерна скулптура за градини.',
        'long_description' => 'Декоративна мермерна скулптура специјално дизајнирана за градински простори.',
        'features' => ['Градински дизајн', 'Отпорност на временски влијанија', 'Декоративност', 'Трајност'],
        'applications' => ['Градини', 'Паркови', 'Приватни дворови'],
        'images' => ['sculptures/sculpture (6).jpg'],
        'main_image' => 'sculptures/sculpture (6).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-8',
        'name' => 'Скулптура Мермер 8',
        'category' => 'sculpture-tombstones',
        'description' => 'Фигуративна мермерна скулптура со реалистичен дизајн.',
        'long_description' => 'Реалистична фигуративна мермерна скулптура која претставува високо ниво на уметничка прецизност.',
        'features' => ['Реалистичен дизајн', 'Висока прецизност', 'Фигуративност', 'Уметничка вредност'],
        'applications' => ['Уметнички галерии', 'Приватни колекции', 'Музеи'],
        'images' => ['sculptures/sculpture (8).jpg'],
        'main_image' => 'sculptures/sculpture (8).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-10',
        'name' => 'Скулптура Мермер 10',
        'category' => 'sculpture-tombstones',
        'description' => 'Монументална мермерна скулптура за јавни простори.',
        'long_description' => 'Голема монументална мермерна скулптура дизајнирана за јавни простори и монументални проекти.',
        'features' => ['Монументален дизајн', 'Големи димензии', 'Јавни простори', 'Трајност'],
        'applications' => ['Јавни простори', 'Паркови', 'Културни центри'],
        'images' => ['sculptures/sculpture (10).jpg'],
        'main_image' => 'sculptures/sculpture (10).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-11',
        'name' => 'Скулптура Мермер 11',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантна мермерна скулптура со фини детали.',
        'long_description' => 'Прецизно изработена мермерна скулптура со внимателно обработени детали.',
        'features' => ['Фини детали', 'Прецизност', 'Елегантност', 'Висока квалитет'],
        'applications' => ['Луксузни простори', 'Приватни колекции', 'Корпоративни седишта'],
        'images' => ['sculptures/sculpture (11).jpg'],
        'main_image' => 'sculptures/sculpture (11).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'sculpture-marble-13',
        'name' => 'Скулптура Мермер 13',
        'category' => 'sculpture-tombstones',
        'description' => 'Современа мермерна скулптура со минималистички дизајн.',
        'long_description' => 'Минималистичка мермерна скулптура која го одразува современ уметнички вкус.',
        'features' => ['Минималистички дизајн', 'Современ стил', 'Елегантност', 'Трајност'],
        'applications' => ['Современи галерии', 'Минималистички простори', 'Уметнички колекции'],
        'images' => ['sculptures/sculpture (13).jpg'],
        'main_image' => 'sculptures/sculpture (13).jpg',
        'availability' => 'По нарачка'
    ],

    // Individual Tombstone Products (one for each image)
    [
        'id' => 'tombstone-1',
        'name' => 'Споменик 1',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантен мермерен споменик со традиционален дизајн.',
        'long_description' => 'Традиционален мермерен споменик изработен од најквалитетен мермер со прецизна обработка.',
        'features' => ['Традиционален дизајн', 'Висока квалитет', 'Трајност', 'Почитувачки изглед'],
        'applications' => ['Гробишта', 'Меморијални паркови', 'Семејни гробови'],
        'images' => ['tombstones/tombstones (1).jpg'],
        'main_image' => 'tombstones/tombstones (1).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-2',
        'name' => 'Споменик 2',
        'category' => 'sculpture-tombstones',
        'description' => 'Модерен мермерен споменик со современ дизајн.',
        'long_description' => 'Современ мермерен споменик кој комбинира традиционални вредности со модерен дизајн.',
        'features' => ['Современ дизајн', 'Елегантност', 'Трајност', 'Персонализиран'],
        'applications' => ['Современи гробишта', 'Меморијални паркови', 'Семејни гробови'],
        'images' => ['tombstones/tombstones (2).jpg'],
        'main_image' => 'tombstones/tombstones (2).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-3',
        'name' => 'Споменик 3',
        'category' => 'sculpture-tombstones',
        'description' => 'Класичен мермерен споменик со детални резби.',
        'long_description' => 'Класичен мермерен споменик со прецизно изработени детални резби и орнаменти.',
        'features' => ['Детални резби', 'Класичен стил', 'Прецизност', 'Трајност'],
        'applications' => ['Традиционални гробишта', 'Историски паркови', 'Семејни гробови'],
        'images' => ['tombstones/tombstones (3).jpg'],
        'main_image' => 'tombstones/tombstones (3).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-4',
        'name' => 'Споменик 4',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантен мермерен споменик со ангелски мотиви.',
        'long_description' => 'Духовен мермерен споменик со ангелски мотиви и религиозни симболи.',
        'features' => ['Ангелски мотиви', 'Духовен дизајн', 'Религиозни симболи', 'Трајност'],
        'applications' => ['Религиозни гробишта', 'Семејни гробови', 'Меморијални паркови'],
        'images' => ['tombstones/tombstones (4).jpg'],
        'main_image' => 'tombstones/tombstones (4).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-5',
        'name' => 'Споменик 5',
        'category' => 'sculpture-tombstones',
        'description' => 'Монументален мермерен споменик за семејни гробови.',
        'long_description' => 'Голем монументален мермерен споменик дизајниран за семејни гробови.',
        'features' => ['Монументален дизајн', 'Семејни гробови', 'Големи димензии', 'Трајност'],
        'applications' => ['Семејни гробови', 'Меморијални паркови', 'Приватни гробишта'],
        'images' => ['tombstones/tombstones (5).jpg'],
        'main_image' => 'tombstones/tombstones (5).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-6',
        'name' => 'Споменик 6',
        'category' => 'sculpture-tombstones',
        'description' => 'Современ мермерен споменик со минималистички дизајн.',
        'long_description' => 'Минималистички мермерен споменик кој го одразува современ вкус и елегантност.',
        'features' => ['Минималистички дизајн', 'Современ стил', 'Елегантност', 'Трајност'],
        'applications' => ['Современи гробишта', 'Меморијални паркови', 'Урбанистички простори'],
        'images' => ['tombstones/tombstones (6).jpg'],
        'main_image' => 'tombstones/tombstones (6).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-7',
        'name' => 'Споменик 7',
        'category' => 'sculpture-tombstones',
        'description' => 'Традиционален мермерен споменик со крстови.',
        'long_description' => 'Религиозен мермерен споменик со крстови и христијански симболи.',
        'features' => ['Крстови', 'Религиозни симболи', 'Традиционален стил', 'Трајност'],
        'applications' => ['Христијански гробишта', 'Религиозни паркови', 'Семејни гробови'],
        'images' => ['tombstones/tombstones (7).jpg'],
        'main_image' => 'tombstones/tombstones (7).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-8',
        'name' => 'Споменик 8',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантен мермерен споменик со цветни мотиви.',
        'long_description' => 'Декоративен мермерен споменик со цветни мотиви и природни елементи.',
        'features' => ['Цветни мотиви', 'Природни елементи', 'Декоративност', 'Трајност'],
        'applications' => ['Декоративни гробишта', 'Меморијални паркови', 'Природни простори'],
        'images' => ['tombstones/tombstones (8).jpg'],
        'main_image' => 'tombstones/tombstones (8).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-9',
        'name' => 'Споменик 9',
        'category' => 'sculpture-tombstones',
        'description' => 'Класичен мермерен споменик со колони.',
        'long_description' => 'Архитектонски мермерен споменик со колони и класични архитектонски елементи.',
        'features' => ['Колони', 'Архитектонски елементи', 'Класичен стил', 'Трајност'],
        'applications' => ['Архитектонски гробишта', 'Историски паркови', 'Монументални проекти'],
        'images' => ['tombstones/tombstones (9).jpg'],
        'main_image' => 'tombstones/tombstones (9).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-10',
        'name' => 'Споменик 10',
        'category' => 'sculpture-tombstones',
        'description' => 'Современ мермерен споменик со геометриски форми.',
        'long_description' => 'Геометриски мермерен споменик кој комбинира современ дизајн со традиционални вредности.',
        'features' => ['Геометриски форми', 'Современ дизајн', 'Елегантност', 'Трајност'],
        'applications' => ['Современи гробишта', 'Урбанистички паркови', 'Модерни меморијали'],
        'images' => ['tombstones/tombstones (10).jpg'],
        'main_image' => 'tombstones/tombstones (10).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-11',
        'name' => 'Споменик 11',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантен мермерен споменик со детални орнаменти.',
        'long_description' => 'Прецизно изработен мермерен споменик со детални орнаменти и декоративни елементи.',
        'features' => ['Детални орнаменти', 'Декоративни елементи', 'Прецизност', 'Трајност'],
        'applications' => ['Декоративни гробишта', 'Луксузни меморијали', 'Приватни гробови'],
        'images' => ['tombstones/tombstones (11).jpg'],
        'main_image' => 'tombstones/tombstones (11).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-12',
        'name' => 'Споменик 12',
        'category' => 'sculpture-tombstones',
        'description' => 'Традиционален мермерен споменик со натписи.',
        'long_description' => 'Класичен мермерен споменик со прецизно изработени натписи и лични податоци.',
        'features' => ['Натписи', 'Персонализирани податоци', 'Класичен стил', 'Трајност'],
        'applications' => ['Традиционални гробишта', 'Семејни гробови', 'Историски паркови'],
        'images' => ['tombstones/tombstones (12).jpg'],
        'main_image' => 'tombstones/tombstones (12).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-13',
        'name' => 'Споменик 13',
        'category' => 'sculpture-tombstones',
        'description' => 'Современ мермерен споменик со апстрактни форми.',
        'long_description' => 'Апстрактен мермерен споменик кој претставува современ уметнички израз.',
        'features' => ['Апстрактни форми', 'Современ стил', 'Уметнички израз', 'Трајност'],
        'applications' => ['Современи галерии', 'Уметнички меморијали', 'Културни институции'],
        'images' => ['tombstones/tombstones (13).jpg'],
        'main_image' => 'tombstones/tombstones (13).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-14',
        'name' => 'Споменик 14',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантен мермерен споменик со фигури.',
        'long_description' => 'Фигуративен мермерен споменик со прецизно изработени фигури и скулптури.',
        'features' => ['Фигури', 'Скулптури', 'Фигуративен дизајн', 'Трајност'],
        'applications' => ['Уметнички гробишта', 'Меморијални паркови', 'Културни центри'],
        'images' => ['tombstones/tombstones (14).jpg'],
        'main_image' => 'tombstones/tombstones (14).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-15',
        'name' => 'Споменик 15',
        'category' => 'sculpture-tombstones',
        'description' => 'Монументален мермерен споменик со архитектонски елементи.',
        'long_description' => 'Голем архитектонски мермерен споменик со сложени архитектонски елементи.',
        'features' => ['Архитектонски елементи', 'Монументален дизајн', 'Сложеност', 'Трајност'],
        'applications' => ['Архитектонски гробишта', 'Историски паркови', 'Монументални проекти'],
        'images' => ['tombstones/tombstones (15).jpg'],
        'main_image' => 'tombstones/tombstones (15).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-16',
        'name' => 'Споменик 16',
        'category' => 'sculpture-tombstones',
        'description' => 'Современ мермерен споменик со минималистички приод.',
        'long_description' => 'Минималистички мермерен споменик кој го одразува современ вкус за едноставност и елегантност.',
        'features' => ['Минималистички приод', 'Едноставност', 'Елегантност', 'Трајност'],
        'applications' => ['Современи гробишта', 'Минималистички паркови', 'Урбанистички простори'],
        'images' => ['tombstones/tombstones (16).jpg'],
        'main_image' => 'tombstones/tombstones (16).jpg',
        'availability' => 'По нарачка'
    ],
    [
        'id' => 'tombstone-17',
        'name' => 'Споменик 17',
        'category' => 'sculpture-tombstones',
        'description' => 'Елегантен мермерен споменик со детални резби.',
        'long_description' => 'Прецизно изработен мермерен споменик со детални резби и орнаменти.',
        'features' => ['Детални резби', 'Орнаменти', 'Прецизност', 'Трајност'],
        'applications' => ['Декоративни гробишта', 'Луксузни меморијали', 'Приватни гробови'],
        'images' => ['tombstones/tombstones (17).jpg'],
        'main_image' => 'tombstones/tombstones (17).jpg',
        'availability' => 'По нарачка'
    ]]);

// Function to get product by ID
function getProductById($id) {
    global $products;
    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }
    return null;
}

// Transliterate Macedonian Cyrillic to Macedonian Latin (basic approximation)
function mkTransliterateToLatin($text) {
    $map = [
        'А'=>'A','а'=>'a','Б'=>'B','б'=>'b','В'=>'V','в'=>'v','Г'=>'G','г'=>'g','Д'=>'D','д'=>'d',
        'Ѓ'=>'Gj','ѓ'=>'gj','Е'=>'E','е'=>'e','Ж'=>'Zh','ж'=>'zh','З'=>'Z','з'=>'z','Ѕ'=>'Dz','ѕ'=>'dz',
        'И'=>'I','и'=>'i','Ј'=>'J','ј'=>'j','К'=>'K','к'=>'k','Л'=>'L','л'=>'l','Љ'=>'Lj','љ'=>'lj',
        'М'=>'M','м'=>'m','Н'=>'N','н'=>'n','Њ'=>'Nj','њ'=>'nj','О'=>'O','о'=>'o','П'=>'P','п'=>'p',
        'Р'=>'R','р'=>'r','С'=>'S','с'=>'s','Т'=>'T','т'=>'t','Ќ'=>'Kj','ќ'=>'kj','У'=>'U','у'=>'u',
        'Ф'=>'F','ф'=>'f','Х'=>'H','х'=>'h','Ц'=>'C','ц'=>'c','Ч'=>'Ch','ч'=>'ch','Џ'=>'Dj','џ'=>'dj',
        'Ш'=>'Sh','ш'=>'sh'
    ];
    return strtr($text, $map);
}

// Build a slug for a product using Macedonian Latin
function getProductSlug($product) {
    $baseName = isset($product['name']) ? $product['name'] : $product['id'];
    $latin = mkTransliterateToLatin($baseName);
    $latin = strtolower($latin);
    // Replace specific terms to be consistent
    $latin = str_replace(['мермер', 'granit', 'granite', 'marble'], ['Мермер ', 'granit', 'granit', 'Мермер '], $latin);
    // Normalize
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $latin);
    $slug = trim($slug, '-');
    // Ensure uniqueness by appending short id suffix
    if (!empty($product['id'])) {
        $suffix = substr(md5($product['id']), 0, 6);
        $slug .= '-' . $suffix;
    }
    return $slug;
}

// Resolve product by slug
function getProductBySlug($slug) {
    global $products;
    foreach ($products as $product) {
        if (getProductSlug($product) === $slug) {
            return $product;
        }
    }
    return null;
}

// Function to get products by category
function getProductsByCategory($category) {
    global $products;
    $filtered = [];
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $filtered[] = $product;
        }
    }
    return $filtered;
}

// Function to get all products
function getAllProducts() {
    global $products;
    return $products;
}

// Function to get all categories
function getAllCategories() {
    global $products;
    $categories = [];
    foreach ($products as $product) {
        if (!in_array($product['category'], $categories)) {
            $categories[] = $product['category'];
        }
    }
    return $categories;
}
?> 
