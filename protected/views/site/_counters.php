<?php
/*  Здесь подключается счетчик, который свзяан со статистикой одминки
*   !!! Получение IP пользователя через $_SERVER['REMOTE_ADDR'] работает не на всех хостингах
*   и в некоторых случаях нужно использовать $_SERVER['HTTP_X_FORWARDED_FOR']
*/
echo '<script type="text/javascript">
                var Stat = new Object();
                Stat["ip"] = "'.$_SERVER['REMOTE_ADDR'].'";
                Stat["UserAgent"] = "'.Yii::app()->request->getUserAgent().'";
                Stat["UrlReferrer"] = "'.Yii::app()->request->getUrlReferrer().'";
                Stat["page"] = window.location.toString();
  			$(document).ready(function(){
				$.ajax({
					url: "/site/addstatisticrecord",
					type: "post",
					data: Stat,
					success: function (data) {}
				});
		});

</script>';

?>