<?php
set_time_limit(300000);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
include 'simple_html_dom.php';
header('Content-Language: zh-CN');
header('Content-Type: text/html; charset=GBK');
$array = array();

//$url = 'http://item.taobao.com/item.htm?spm=a230r.1.14.10.iBpyKv&id=19832983608';
$url = filter_var($_REQUEST['link'], FILTER_SANITIZE_STRING);

$text = file_get_html($url);

$elements = $text->find('#detail');

$message = array();
foreach($elements as $element) {
   /* foreach ($element->find('tb-detail-hd h3') as $key => $value) {
        $message['link'] = $value->attr['href'];
    }*/

    foreach ($element->find('.tb-detail-hd h3') as $key => $value) {
        $message['title'] = $value->plaintext;
    }
    foreach ($element->find('#J_StrPrice .tb-rmb-num') as $key => $value) {
        $message['price'] = strip_tags($value->outertext);
    }

    foreach ($element->find('.tb-gallery img[id=J_ImgBooth]') as $key => $value) {
        $message['img'] = $value->outertext;
    }
}

$message['title'] = iconv("GBK", "UTF-8", $message['title']);

echo json_encode($message);