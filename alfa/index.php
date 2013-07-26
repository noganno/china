<?php
include 'db.php';
include 'simple_html_dom.php';

$array = array();

$url = 'http://alfa.kz/';

$text = file_get_html($url);

$elements = $text->find('div[class=first]');

$message = array();
foreach($elements as $element) {
    foreach ($element->find('h2.header a') as $key => $value) {
    	$message['link'] = $value->attr['href'];
    }

    foreach ($element->find('.header') as $key => $value) {
    	$message['title'] = $value->plaintext;
    }

    foreach ($element->find('.price strong') as $key => $value) {
    	$message['price'] = $value->plaintext;
    }
	foreach ($element->find('img') as $key => $value) {			
		    	$single['photo'] = $value->src;
		    }
		    $photo = ($single['photo']) ? $single['photo'] : '';
}

$price = ($message['price']) ? $message['price'] : '';

$query = mysql_query('SELECT * FROM `message` ORDER BY id DESC LIMIT 1');

$row = mysql_fetch_array($query, MYSQL_ASSOC);

if($row['link'] != $message['link']) {
		$text->clear();
		unset($text);
		unset($elements);

		include 'a.charset.php';

		$text = file_get_html($message['link']);

		$elements = $text->find('.body');

		$single = array();
		
		
		foreach($elements as $element) {
		    foreach ($element->find('.text') as $key => $value) {
		    	@$single['text'] = $value->plaintext;
                if(!$single['text']) {
                    foreach ($element->find('.descr') as $key => $value) {
                        $single['text'] = $value->plaintext;
                    }
                }
		    }

		    $msg = charset_x_win($single['text']);

		    foreach ($element->find('.contacts-wrapper .first') as $key => $value) {
		    	$single['phone'] = $value->plaintext;
		    }
		    $phone = ($single['phone']) ? $single['phone'] : '';

			
			
			
			
		    if($element->find('.mailru-num')) {
		    	 foreach ($element->find('.mailru-num') as $key => $value) {
		    	$single['email'] = $value->plaintext;
		    	}
		    } else {
		    	$single['email'] = '';
		    }
		}


		$sql = "INSERT INTO `message` (`link`, `title`, `price`, `text`, `phone`, `email`, `photo`)
	 VALUES ('".$message['link']."', '".$message['title']."', '".$price."',
	  '".mb_convert_encoding($msg, 'utf8', 'cp1251')."', '".$phone."', '".$single['email']."', '".$photo."')";

		$insert = mysql_query($sql);

		if($insert) {
			header('Location: http://almaly-fitness.kz/alfa/export.php');
		} else {
			echo "no";
		}

}
