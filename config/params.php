<?php

return [
    'adminEmail' => 'masterplan1804@gmail.com',
    'senderEmail' => 'masterplan1804@gmail.com',
    'senderName' => 'Example.com mailer',
    'fillingCategory' => [
        0 => 'Весь асортимент',
        1 => 'Бісквітні',
        2 => 'Чізкейки',
        3 => 'Мусові',
        4 => 'Капкейки',
    ],
    'fillingCandybarCategory' => [
        10 => ['name'=>'Капкейки', 'price'=>50, 'min_quantity'=>6, 'img' => 'candybar_order-cupcake1.jpg', 'img2' => 'candybar_order-cupcake2.jpg'],
        11 => ['name'=>'Кейкпопси', 'price'=>35, 'min_quantity'=>8, 'img' => 'candybar_order-cakepops1.jpg', 'img2' => 'candybar_order-cakepops2.jpg'],
//        12 => ['name'=>'Пряничні топпери', 'price'=>60, 'min_quantity'=>5, 'img' => 'candybar_order-topper2.jpg'],
        12 => ['name'=>'Ескімо', 'price'=>70, 'min_quantity'=>4, 'img' => 'candybar_order-escimo1.jpg', 'img2' => 'candybar_order-escimo2.jpg'],
        13 => ['name'=>'Трайфли', 'price'=>70, 'min_quantity'=>6, 'img' => 'candybar_order-trifle1.jpg', 'img2' => 'candybar_order-trifle2.jpg'],
        14 => ['name'=>'Тарталетки', 'price'=>70, 'min_quantity'=>5, 'img' => 'candybar_order-tartaletki1.jpg', 'img2' => 'candybar_order-tartaletki2.jpg'],
        15 => ['name'=>'Мусові десерти', 'price'=>70, 'min_quantity'=>6, 'img' => 'candybar_order-muss1.jpg', 'img2' => 'candybar_order-muss2.jpg'],
        16 => ['name'=>'Брауні', 'price'=>70, 'min_quantity'=>6, 'img' => 'candybar_order-seven1.jpg'],
        17 => ['name'=>'Льодяники', 'price'=>35, 'min_quantity'=>8, 'img' => 'candybar_order-seven2.jpg'],
        18 => ['name'=>'Тарти', 'price'=>70, 'min_quantity'=>4, 'img' => 'candybar_order-seven3.jpg'],
        19 => ['name'=>'Меренги на палочці', 'price'=>35, 'min_quantity'=>8, 'img' => 'candybar_order-merengs1.jpg', 'img2' => 'candybar_order-merengs2.jpg'],
        20 => ['name'=>'Маленькі бізешки', 'price'=>20, 'min_quantity'=>10, 'img' => 'candybar_order-small-bize1.jpg', 'img2' => 'candybar_order-small-bize2.jpg'],
        21 => ['name'=>'Сирки в шоколаді', 'price'=>35, 'min_quantity'=>8, 'img' => 'candybar_order-cheese1.jpg', 'img2' => 'candybar_order-cheese2.jpg'],
        22 => ['name'=>'Полуниця в шоколаді', 'price'=>30, 'min_quantity'=>6, 'img' => 'candybar_order-strobbery1.jpg', 'img2' => 'candybar_order-strobbery2.jpg'],
//        23 => ['name'=>'Шоколадні ескімо', 'price'=>20, 'min_quantity'=>5, 'img' => 'candybar_order-ekler.jpg'],
        24 => ['name'=>'Міні капкейки', 'price'=>30, 'min_quantity'=>8, 'img' => 'candybar_order-miniCupcake.jpg'],
//        25 => ['name'=>'Макаронс', 'price'=>30, 'min_quantity'=>15, 'img' => 'candybar_order-macaron.jpg'],
        26 => ['name'=>'Павлова', 'price'=>60, 'min_quantity'=>4, 'img' => 'candybar_order-pavlova.jpg'],
        27 => ['name'=>'Трюфелі', 'price'=>20, 'min_quantity'=>10, 'img' => 'candybar_order-trufel.jpg'],
        28 => ['name'=>'Панакота', 'price'=>50, 'min_quantity'=>6, 'img' => 'candybar_order-panacota.jpg'],
        29 => ['name'=>'Цукерки', 'price'=>35, 'min_quantity'=>5, 'img' => 'candybar_order-sweets.jpg'],
        30 => ['name'=>'Міні чізкейки', 'price'=>70, 'min_quantity'=>4, 'img' => 'candybar_order-miniCheez.jpg'],
    ],
    'productType' => [
        1 => 'торти',
        2 => 'капкейки',
        3 => 'candybar',
        4 => 'дієтичні десерти',
        5 => 'Подарункові набори',
    ],
    'productCategory' => [
        1 => [
            1 => 'Дитячі',
            2 => 'Жіночі',
            3 => 'Чоловічі',
            4 => 'Весільні',
            5 => 'Хрестини',
            6 => 'Чізкейки',
            7 => 'Мусові',
        ],
        2 => [
            1 => 'Дитячі',
            2 => 'Жіночі',
            3 => 'Чоловічі',
        ],
        3 => [
            1 => 'Тематична вечірка',
            2 => 'Весілля',
            3 => 'Дитяче свято',
        ],
        4 => [
            1 => 'Дієтичні десерти1',
            2 => 'Дієтичні десерти2',
            3 => 'Дієтичні десерти3',
        ],
        5 => [
            1 => 'ЧізкейкиПН',
            2 => 'КапкейкиПН',
            3 => 'ТрайфлиПН',
        ],
    ],
    'deliveryType' => [
        1 => 'Самовивіз',
        2 => 'Таксі',
        3 => 'Договірна',
    ],
    'paymentType' => [
        1 => 'Передоплата 50%',
        2 => 'Передоплата 100%',
    ],
    'fillingPerPageLimit' => 6,
    'productPerPageLimit' => 3,
    'hostUrl' => 'http://dicake.loc',
];
