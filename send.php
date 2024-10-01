<?php

$token = "8088381218:AAGykLQg79sqU6zZHpKyBXB-a_jZ29d8Lk8";

$chat_id = "170195649";

/*$token = "7405933413:AAHRb-M7T282WvILRR8pkUCzacyxiauaahQ";

$chat_id = "-4273521241";*/

if ($_POST['act'] == 'order') {
    $product = ($_POST['product']);
    $street = ($_POST['street']);
    $home = ($_POST['home']);
    $podhome = ($_POST['podhome']);
    $levelhome = ($_POST['levelhome']);
    $kvartira = ($_POST['kvartira']);
    $tel = ($_POST['tel']);
    $name = ($_POST['name']);

    $arr = array(
        'Имя:' => $name,
        'Заказ:' => $product,
        'Телефон:' => $tel,
        'Улица:' => $street,
        'Дом:' => $home,
        'Подъезд:' => $podhome,
        'Этаж:' => $levelhome,
        'Квартира:' => $kvartira,
    );

    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

    if ($sendToTelegram) {
        echo($txt);
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }

    else {
        echo($txt);
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}
