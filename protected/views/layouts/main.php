<?php echo $this->htmlBlocks['header']; ?>
<div id="container">
    <div id="content">

        <div class="index_page">
            <?php echo $this->htmlBlocks['left_block_main']; ?>

            <div class="right_block">
                <div class="slider">
                    <div class="slides">
                        <ul>
                            <li><a href="#"><img
                                        src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/big_photo1.jpg"
                                        width="600" height="338" alt=""/></a></li>
                            <li><a href="#"><img
                                        src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/big_photo2.jpg"
                                        width="600" height="338" alt=""/></a></li>
                            <li><a href="#"><img
                                        src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/big_photo1.jpg"
                                        width="600" height="338" alt=""/></a></li>
                            <li><a href="#"><img
                                        src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/big_photo2.jpg"
                                        width="600" height="338" alt=""/></a></li>
                            <li><a href="#"><img
                                        src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/big_photo1.jpg"
                                        width="600" height="338" alt=""/></a></li>
                        </ul>
                    </div>
                    <div class="controls">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <!-- slider -->
                <div class="catalog_block">
                    <div class="description">
                        <?php echo $content; ?>
                        <h5>Парфюмерия. Каталог и цены.</h5>

                        <p>Добро пожаловать в интернет-магазин элитной парфюмерии Letio.ru! В каталоге нашего магазина
                            представлен широкий выбор оригинальной мужской и женской парфюмерии на любой, даже самый
                            изысканный вкус, от качественных недорогих парфюмов, до эксклюзивных элитных ароматов. В
                            нашем интернет-бутике Вы всегда сможете купить <a href="#">оригинальные духи</a>, <a
                                href="#">туалетную воду</a>, <a href="#">одеколон</a> от мировых производителей по
                            лучшим ценам!</p>
                    </div>

                    <?php $this->widget('application.components.GetLastProducts'); ?>

                    <div class="sliderkit">
                        <a href="#" class="viev_all">смотреть все</a>
                        <h5>Лидеры продаж</h5>

                        <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev"><a rel="nofollow" href="#"
                                                                                         title="Previous photo"></a>
                        </div>
                        <div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next"><a rel="nofollow" href="#"
                                                                                         title="Next photo"></a></div>
                        <div class="sliderkit-nav">
                            <div class="sliderkit-nav-clip">
                                <ul>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo1.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Insolense</a> от <a href="#">Guerlain</a><br/>
                                        <span>от 500 до 1590 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo2.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Body</a> от <a href="#">Burberry</a><br/>
                                        <span>от 320 до 3440 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo3.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Eau de Lacoste L.12 Bleu</a> от <a href="#">Lacoste</a><br/>
                                        <span>от 70 до 2300 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo4.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Love of Pink</a> от <a href="#">Lacoste</a><br/>
                                        <span>от 400 до 4050 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo1.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Insolense</a> от <a href="#">Guerlain</a><br/>
                                        <span>от 500 до 1590 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo2.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Body</a> от <a href="#">Burberry</a><br/>
                                        <span>от 320 до 3440 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo3.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Eau de Lacoste L.12 Bleu</a> от <a href="#">Lacoste</a><br/>
                                        <span>от 70 до 2300 руб.</span>
                                    </li>
                                    <li>
                                        <a href="#"><img
                                                src="<?php echo $this->aSettings['siteurl']; ?>/themes/default/images/temp/photo4.jpg"
                                                width="95" height="98" alt="" title=""/></a>
                                        <a href="#">Love of Pink</a> от <a href="#">Lacoste</a><br/>
                                        <span>от 400 до 4050 руб.</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- sliderkit-nav-clip -->
                        </div>
                        <!-- sliderkit-nav -->
                    </div>
                    <!-- #sliderkit -->
                </div>
                <!-- catalog_block -->
            </div>
            <!-- right_block -->

            <div class="text_block">
                <p>Мы сотрудничаем с крупнейшими и проверенными временем поставщиками ОРИГИНАЛЬНОЙ косметики и
                    парфюмерии, что позволяет нам обеспечивать высокий ассортимент и гарантировать Вам оригинальность
                    духов и туалетной воды. Покупая у нас, Вы можете не сомневаться, что покупаете оригинальные ароматы.
                    Мы дорожим нашей репутацией и сотнями наших постоянных клиентов.</p>

                <p>Помимо впечатляющего разнообразия парфюма, в каталоге нашего магазина Вы найдете косметику ведущих
                    мировых производителей. Вы сможете у нас заказать туши, тени, помады, пудры, тональные крема, а
                    также другую декоративную косметику самых лучших и востребованных модных домов.</p>

                <p>Парфюмерия - идеальный подарок, на праздник и не только! Каждому покупателю мы привозим заказ в
                    подарочной упаковке и предлагаем на выбор подарки - пробники духов или косметику. Также мы дарим
                    каждому покупателю дисконтную карту - чтобы Вам было проще заказать туалетную воду или духи у нас в
                    будущем, и можно было сэкономить за счет скидки по карте.</p>

                <p>Мы ценим наших клиентов, и хотим, чтобы нас рекомендовали знакомым. Вежливые менеджеры Вас
                    проконсультируют по любым вопросам, делаете ли Вы заказ по телефону или через сайт нашего интернет
                    магазина.</p>

                <p>Заказывать у нас косметику и парфюмерию стало еще проще - мы ввели круглосуточный прием звонков 7
                    дней в неделю! Теперь заказы в нерабочее время, в субботу или воскресенье, будут обрабатываться
                    значительно быстрее. Следите за обновлениями и оставайтесь с нами!</p>

                <p>Желаем Вам приятных покупок!</p>
            </div>

        </div>
        <!-- index_page -->

    </div>
    <!--#content-->
</div>
<!--#container-->
<?php echo $this->htmlBlocks['footer']; ?>