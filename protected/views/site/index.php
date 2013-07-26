 <?php 
	//Массив с айдишниками категорий в которых должны быть комментарии
	$comments_category = array(4,10);
?>

<?php 
	/*
	*
	* Вывод заголовка везде, кроме главной (id = 4)
	*
	*/
	if ($id != 4) echo '<h1>'.CHtml::encode($title).'</h1>'; 

?>

<?php echo $content; ?>


<?php
	
	if(in_array($this->pageAttributes['category_id'], $comments_category)) {
		$this->renderPartial('_comments', $this->pageAttributes);
	} 

?>
