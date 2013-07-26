<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by JetBrains PhpStorm.
 * File: connect.php
 * Date: 23.04.13
 * Time: 21:06
 */

//$vkontakteApplicationId = '3598110';
//$vkontakteKey ='35M735ZYNP5TPaeGffsw';
//http://vk.com/editapp?id=3609153
$vkontakteApplicationId = '3609153';
$vkontakteKey ='4JyySSuywx0TOOxEL6Lj';

// ID юзера, к которому должно подключаться приложение
//$vkontakteUserId='178835895';
$vkontakteUserId='209542263';

if (!empty($_GET['code'])){

    // вконтакт присылает нам код
    $vkontakteCode=$_GET['code'];

    // получим токен
    echo $sUrl = "https://api.vkontakte.ru/oauth/access_token?client_id=$vkontakteApplicationId&scope=wall%2Coffline&client_secret=$vkontakteKey&code=$vkontakteCode&grant_type=client_credentials";

// создадим объект, содержащий ответ сервера Вконтакте, который приходит в формате JSON
    $oResponce = json_decode(file_get_contents($sUrl));

    echo '<pre>';
    print_r($oResponce);
    echo '</pre>';

    $fp = fopen('token.txt', 'w');
    fputs($fp, $oResponce->access_token);
    fclose($fp);

}
$sYourDomain = 'almaly-fitness.kz';

echo $_SERVER['DOCUMENT_ROOT'].'<br>';
?>
http://oauth.vk.com/authorize?client_id=209542263&scope=wall,photos,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token
<a href="http://oauth.vk.com/authorize?client_id=<?=$vkontakteUserId?>&scope=wall,photos,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token">Авторизация Вконтакте</a><br>


<a href="http://api.vkontakte.ru/oauth/authorize?client_id=<?=$vkontakteApplicationId?>&scope=wall,photos,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token">Авторизация Вконтакте</a>
