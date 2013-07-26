	<?php
	header('Content-Type: text/html; charset=utf-8');
	include 'db.php';
	set_time_limit(300000);

	$vkontakteApplicationId = '3607743';
	$vkontakteKey ='HlGYywkBFHnCl5UQsEwT';
	$vkontakteUserId='209542263';
	$group = '44281250';
	//$group = '53188469'; // Lets
	$vkontakteAccessToken = '1dae35720083d90ecdf9015c432c7d1eda07e381f913d93573f223192ba974ccdfccfbd77e3df77785bc1';

	$query = mysql_query('SELECT * FROM `message` ORDER BY id DESC LIMIT 1');

	$row = mysql_fetch_array($query, MYSQL_ASSOC);

	$text = urlencode($row['title'].':  '.$row['text'].' Телефон:'.$row['phone'].' Цена:'.$row['price']);

	$link = 'http://test.ru';

	$sRequest = "https://api.vk.com/method/wall.post?owner_id=-$group&from_group=1&access_token=$vkontakteAccessToken&message=$text&attachments=".$row['photo'];

	$oResponce = json_decode(file_get_contents($sRequest));
	
	if($row['email']) {

	$subject = 'Ваше объявлени опубликовано';
	$to = $row['email'];	
	$message = "
			<html>
			<head>
			 <title>Сообщение с сайте vk.com</title>
			</head>
			<body>
			<p>Ваше объявление добавлено в нашей группе, присоединяйтесь. Вы можете посмотреть его <a href='http://vk.com/magazin_lets'>здесь</a> </p>						
			</body>
			</html>
			";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: vk.com";
	mail($to, $subject, $message, $headers);
		
}		

	echo '<pre>';
	print_r($oResponce);
	echo '</pre>';