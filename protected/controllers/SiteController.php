<?php

class SiteController extends Controller
{
    /**Массив с настройками сайта
     * в видах доступен через $this->aSettings['param']
     */
    public $aSettings = array();

    public $alias = '';

    //Атрибуты страниц
    public $pageAttributes = array(
        'id' => '',
        'content' => '',
        'alias' => '',
        'title' => '',
        'keywords' => '',
        'description' => '',
        'uri' => '',
        'introtext' => '',
        'category_id' => '',
        'comments' => '',
    );

    //Сюда происходит рендеринг различных PHTML-блоков(видов);
    public $htmlBlocks = array(
        'countersBlock' => '',
        'topMenu' => '',
        'topTab' => '',
        'leftBlock' => '',
        'socialBlock' => '',
        'header' => '',
        'left_block_main' => '',
        'left_block_main_inner' => '',
        'footer' => '',
    );


    public function init()
    {
        $model_settings = Settings::model()->findAll();
        $this->aSettings = CHtml::listData($model_settings, 'option_name', 'option_value');
        $this->htmlBlocks['countersBlock'] = $this->renderPartial('_counters', null, true);
        $this->htmlBlocks['topMenu'] = $this->renderPartial('_topMenu', null, true);
        $this->htmlBlocks['topTab'] = $this->renderPartial('_topTab', null, true);
        $this->htmlBlocks['socialBlock'] = $this->renderPartial('_social', null, true);
        $this->htmlBlocks['header'] = $this->renderPartial('/layouts/_header', null, true);
        $this->htmlBlocks['footer'] = $this->renderPartial('/layouts/_footer', null, true);
        $this->htmlBlocks['left_block_main'] = $this->renderPartial('_left_block_main', null, true);
    }

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex($data = null)
    {
        //Получение запроса
        if (isset($_SERVER['REQUEST_URI'])) {
            $this->alias = substr(trim($_SERVER['REQUEST_URI']), 0, 200);
        }

        //Особые запросы
        switch ($this->alias) {
            case '/sitemap.xml':
                $this->run('sitemap');
                $pageRender = false;
                break;

            default:
                $pageRender = true;
                break;
        }

        //Запрос к базе для поиска страниц по Alias
        if (!empty($this->alias) && $pageRender) {

            $model_content = Content::model()->find('uri=:content_alias', array(':content_alias' => $this->alias));

            //Если результат не пустой рендерим вид со страницей
            if (!empty($model_content)) {
                $aResult = $model_content->getAttributes();
                $aResult['comments'] = $this->getComments($aResult['id']);
                if (!$aResult['comments']) $aResult['comments'] = array();
                $this->pageAttributes = $aResult;
                //var_dump($this->pageAttributes);
                //Блок с кнопками соц.сетей
                $this->htmlBlocks['socialBlock'] = $this->renderPartial('_social', null, true);
                //
                header('Last-Modified: ' . gmdate("D, d M Y H:i:s \G\M\T", $aResult['created']));
                $this->render('index', array(
                    'aResult' => $aResult
                ));

            } else {
                throw new CHttpException(404, 'Такой страницы нет');
            }

        }
    }

    /*
    *
    *	Получение комментариев
    *
    */
    public function getComments($meterial_id)
    {
        $model_comments = Comments::model()->findAll('material_id=:id', array(':id' => $meterial_id));
        if (!empty($model_comments)) {
            $aResult = array();
            foreach ($model_comments as $value) {
                $aResult[$value->id] = $value->attributes;
            }
            return $aResult;
        } else return false;
    }

    /*
    *
    *	Добавление комментариев
    *
    */
    public function actionAddcomment()
    {
        $model = new Comments;

        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);

        if (isset($_POST['Comments'])) {
            $model->attributes = $_POST['Comments'];
            $model->created = time();
            $model->content = strip_tags($model->content);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Ваш комментарий успешно добавлен");
                $this->redirect($_POST['Comments']['redirect']);
            } else {
                Yii::app()->user->setFlash('success', "Вы не заполнили все необходимые поля");
                $this->redirect($_POST['Comments']['redirect']);
            }
        }
    }

    /*
    *
    *	Обратная связь
    *
    */
    public function actionFeedbackform()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

                mail($this->aSettings['admin_email'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', '<h3>Сообщение успешно отправлено</h3>');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /*
    *
    *	Форма входа
    *
    */
    public function actionEnter()
    {
        throw new CHttpException(404, '<h3>Неверный логин или пароль :(</h3>');
    }

    /*
    *
    *	один из вариантов обработки ошибок 404
    *
    */
    public function actionError404()
    {
        $this->redirect(Yii::app()->homeUrl);
    }

    /*
    *
    *	Карта сайта без учета экшенов, только страницы
    *
    */
    public function actionSitemap()
    {
        $model_sitemap = Content::model()->findAll();
        if (!empty($model_sitemap)) {
            $aResult = array();
            foreach ($model_sitemap as $value) {
                $aResult['pages'][$value->id] = $value->attributes;
            }
            header('Content-type: text/xml; charset=utf-8');
            $this->renderPartial('sitemap', $aResult);
        }
    }

    /*
    *
    *	Добавление записи о скачке файла
    *
    */
    public function actionAddFilesRecord()
    {
        $model_filescounter = new Filescounter;
        if (isset($_GET['filename'])) {
            $model_filescounter->filename = $_GET['filename'];
            $model_filescounter->remote_addr = isset($_GET['ip']) ? $_GET['ip'] : 'no data';
            $model_filescounter->date = time();
            if ($model_filescounter->save()) {
                echo 'ok :)';
            } else echo 'not ok :(';
        }
    }

    /*
    *
    *	Добавление записи о просмотре страницы
    *
    */
    public function actionAddStatisticRecord()
    {
        $model_statistic = new Statistic;
        $aData = array();
        if (isset($_POST['ip'])) {
            $aData['ip'] = $_POST['ip'];
            $aData['userAgent'] = isset($_POST['UserAgent']) ? $_POST['UserAgent'] : 'no data';
            $aData['UrlReferrer'] = isset($_POST['UrlReferrer']) ? $_POST['UrlReferrer'] : 'no data';
            $aData['uri'] = isset($_POST['page']) ? $_POST['page'] : 'no data';
            $model_statistic->data = CJSON::encode($aData);
            $model_statistic->date = time();
            if ($model_statistic->save()) {
                echo 'ok :)', var_dump(CJSON::decode($model_statistic->data));
            } else echo 'not ok :(';
        }
    }


    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}