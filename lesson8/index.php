﻿<?php
// Запмсь в файл
error_reporting( E_ERROR );
$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root. '/smarty/';

// put full path to Smarty.class.php
require( $smarty_dir.'libs/Smarty.class.php');
include('functions.php');

$filename = 'test.html';

$show_param = filter_var($_GET['show'], FILTER_SANITIZE_URL);
$id = filter_var($_GET['id'], FILTER_SANITIZE_URL);

$button_value="Добавить объявление";


if(file_exists($filename) && is_writable($filename)) {
    $data_temp = file_get_contents($filename);
    $data = unserialize($data_temp);
} else {
    die ("Файл". $filename ."недоступен");
}

if(isset($_POST['add'])) { // Добавление записи
    if(isset($_GET['del'])){
        unset($_GET['del']);
    }

    $validate_data = [
        'type' => validate_input($_POST['type']),
        'name' => validate_input($_POST['name']),
        'email' => validate_input($_POST['email']),
        'confirm_rss' => validate_input($_POST['confirm'][0]),
        'phone' => validate_input($_POST['phone']),
        'city_id' => validate_input($_POST['city']),
        'category_id' => validate_input($_POST['cat']),
        'name_ad' => validate_input($_POST['name_ad']),
        'ad_text' => validate_input($_POST['ad_text']),
        'price' => validate_input($_POST['price']),
        'id' => validate_input($_POST['id']),
    ];

    if(isset($_GET['show']) && isset($data['ads'][$validate_data['id']])){
        $edition_ad = array_replace($data['ads'][$validate_data['id']], $validate_data);
        $data['ads'][$validate_data['id']] = $edition_ad;
        header('location: index.php');

    } else {
        $data['ads'][]=$validate_data;
    }
}
if (isset($_GET['show'])){
    $button_value="Сохранить объявление";
}


if (isset($_GET['del']) && isset($data['ads'][$_GET['id']])) { //Удаление записи
    unset($data['ads'][$_GET['id']]);
}

// массив select cities
$cities=[
    '543644'=>'Новосибирск',
    '543645'=>'Москва',
    '543646'=>'Минск'
];

$rss_confirm=[
    'checked' =>'Я хочу получать вопросы по объявлению на email',
];

$business_type=[
    'private' =>'Частное лицо',
    'corp' =>'Компания'
];

// массив select categories

$categories=[
    '543655'=>'Бытовая техника',
    '543659'=>'Товары для дома',
    '543660'=>'Коампьютерная техника'
];

$smarty_data=[
    'button_value' => $button_value,
    'show_param' => $show_param,
    'cat'=> $categories,
    'cities' => $cities,
    'rss_confirm'=> $rss_confirm,
    'business_type' => $business_type

];

$string_data = serialize($data);
file_put_contents($filename, $string_data);

// SMARTY

    $smarty = new Smarty();
    $smarty->compile_check = true;
    $smarty->debugging = true;

    $smarty->template_dir = $smarty_dir.'templates';
    $smarty->compile_dir = $smarty_dir.'templates_c';
    $smarty->cache_dir = $smarty_dir.'cache';
    $smarty->config_dir = $smarty_dir.'configs';


    $smarty->assign('ads', $data['ads']);
    $smarty->assign('smarty_data', $smarty_data);
    $smarty->assign('var_array', $data['ads'][$show_param]);



    $smarty->display('index.tpl');
?>