<?php
$ulkan = Yii::app()->getModule('yupe');
$this->layout = 'forSiteIndex';

if (Yii::app()->language == 'uz') {
    $this->title = $ulkan->siteName;
    $this->keywords = $ulkan->siteKeyWords;
    $this->description = $ulkan->siteDescription;
} else {
    $this->title = $this->getBlock('seo_title');
    $this->keywords = $this->getBlock('seo_keywords');
    $this->description = $this->getBlock('seo_description');
}
Yii::app()->getClientScript()->registerScript('open-menu', "
    $('.js-burger-open').click(function () {
        $('#ulkan-top').addClass('menu-open');
        $('body').css('overflow', 'hidden');
    });
    $('.js-burger-mobile-open').click(function () {
        $('#ulkan-top').addClass('menu-open');
        $('body').css('overflow', 'hidden');
    });
    $('.js-burger-close').click(function () {
        $('#ulkan-top').removeClass('menu-open');
        $('body').css('overflow', 'auto');
    });
");
?>

<section class="container-fluid banner">
    <div id="ulkan-top" class="pad-top">
        <div class="container">
            <div class="pull-left mob-nav">
                <div class="row">
                    <div class="col-md-1">
                        <a href="/" class="logo"></a>
                    </div>
                    <div class="col-md-10">
                        <div class="collapse navbar-collapse">
                            <?php if (Yii::app()->hasModule('menu')) : ?>
                                <?php
                                $this->widget('application.modules.menu.widgets.MenuWidget', [
                                    'name' => 'top-menu-' . Yii::app()->language,
                                    'layoutParams' => [
                                        'class' => 'site-navbar'
                                    ]
                                ]);
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="burger visible-xs-block pull-right">
                <div class="dropdown js-lang">
                    <a data-toggle="modal" data-target="#login">
                        <span class="fa fa-sign-in"></span> &nbsp;
                    </a>
                    <a class="dropdown-first" data-toggle="dropdown">
                        <i class="fa fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/uz">O'zbekcha</a></li>
                        <li><a href="/ru">Русский</a></li>
                        <li><a href="/en">English</a></li>
                    </ul>
                </div>
                <img alt="Ulkan" class="js-burger-open" src="<?= $this->mainAssets; ?>/img/menu.svg" style="display: inline;">
                <img alt="Ulkan" class="js-burger-mobile-open" src="<?= $this->mainAssets; ?>/img/menu-mobile.svg" style="display: none;">
                <img alt="Ulkan" class="js-burger-close burger__close" style="display: none;" src="<?= $this->mainAssets; ?>/img/close.svg">
            </div>
            <div class="pull-right top-button">
                <button type="button" class="ulkanbutton" data-toggle="modal" data-target="#login">
                    <?= Yii::t('default', 'login'); ?>
                </button>
                <button type="button" class="ulkanbutton"  data-backdrop='static' data-toggle="modal" data-target="#myModal">
                    <?= Yii::t('default', "Sayt yaratish"); ?>
                </button>
            </div>
            <div class="pull-right lang">
                <div class="dropdown">
                    <a data-toggle="modal" data-target="#login">
                        <span class="fa fa-sign-in"></span>
                        <?= Yii::t('default', 'login'); ?> &nbsp;
                    </a>
                </div>
                <?php if (Yii::app()->language == 'uz') : ?>
                    <div class="dropdown">
                        <a class="dropdown-first" data-toggle="dropdown"><i class="fa fa-globe"></i> O'zbekcha
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/ru">Русский</a></li>
                            <li><a href="/en">English</a></li>
                        </ul>
                    </div>
                <?php elseif (Yii::app()->language == 'ru') : ?>
                    <div class="dropdown">
                        <a class="dropdown-first" data-toggle="dropdown"><i class="fa fa-globe"></i> Русский
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/uz">O'zbekcha</a></li>
                            <li><a href="/en">English</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="dropdown">
                        <a class="dropdown-first" data-toggle="dropdown"><i class="fa fa-globe"></i> English
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/uz">O'zbekcha</a></li>
                            <li><a href="/ru">Русский</a></li>
                        </ul>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="section-header text-center"><?= $this->getBlock('main_h1'); ?> </h1>
        <form class="form-group ulkanform">
            <div class="row">
                <div class="col-md-4 col-md-offset-3 col-sm-offset-1 col-sm-6">
                    <input class="ulkaninput" name="email" placeholder="<?= Yii::t('default', 'Elektron pochtangizni kiriting'); ?>">
                </div>
                <div class="col-md-2 col-sm-4 pad-left-0">
                    <button type="button" class="ulkanbutton"  data-backdrop='static' data-toggle="modal" data-target="#myModal"><?= Yii::t('default', "Sayt yaratish"); ?></button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p style="font-weight: 300;" class="ulkantext">
                    <?= $this->getBlock('main_p'); ?>
                </p>
            </div>
        </div>
        <style>
            #interM {
                text-shadow: 0 0 1px; font-size: 20px; text-align: center;     margin-top: 21px;
                display: block;
            }
        </style>
        <div class="row text-center faqs hidden-xs">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <span id="interM"><a href="<?= Yii::app()->createUrl('/site/internetmagazinochish') ?>" class="ahref"><?= Yii::t('default', 'internet-magazin') ?></a></span>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <p class="ulkantext"><a href="#m2" class="ahref"><?= $this->getBlock('main_menu_2'); ?></a></p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <p class="ulkantext"><a href="#m3" class="ahref"><?= $this->getBlock('main_menu_3'); ?></a></p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <p class="ulkantext"><a href="#m4" class="ahref"><?= $this->getBlock('main_menu_4'); ?></a></p>

            </div>
        </div>
    </div>
</section>

<section class="fullyoutube" id="m3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><?= $this->getBlock('main_sec3_h2'); ?></h2>
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9" >
                    <?php if (Yii::app()->language == 'ru') : ?>
                        <iframe src="https://www.youtube.com/embed/O4JtQQmX2Co?autoplay=1"></iframe>
                        <a href="https://www.youtube.com/embed/O4JtQQmX2Co"></a>
                    <?php else : ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/6GjjDKYn2o0?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <a href="https://www.youtube.com/embed/6GjjDKYn2o0"></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
                <a href="<?= Yii::app()->createUrl('page/page/view', ['slug' => 'guidance']); ?>" class="ulkanbutton btn-temp">
                    <?= Yii::t('default', 'guidance'); ?>
                </a>
            </div>
        </div>
    </div>
</section>


<div class="container-fluid" id="m2">
    <div class="container themes-widget">
        <h2 class="section-header text-center"> <?= $this->getBlock('main_sec2_h2'); ?></h2>
        <p class="text-center">
            <?= $this->getBlock('main_sec2_p'); ?>
        </p>
        <div class="container">
            <div class="row">
                <div class="cf">
                    <?php $this->widget('application.modules.theme.widgets.ThemesWidget', ['limit' => 4]); ?>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <a href="<?= Yii::app()->createUrl('/theme/themes/index'); ?>" class="ulkanbutton btn-temp">
                            <?= Yii::t('default', "Ko’proq namunalarni ko’rish"); ?>
                        </a>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </div>
</div>





<section id="themo_service_block_2" class=" service-blocks-horiz">
    <div class="container" id="m4">
        <div class="row">
            <div class="col-xs-12 centered">
                <h2 class="section-header text-center"><?= $this->getBlock('main_sec4_h2'); ?>
                    <p><?= $this->getBlock('main_sec4_p'); ?></p>
                </h2>

            </div><!-- /.section-header -->
        </div><!-- /.row -->
        <div class="row">
            <div class="service-block-col first col-sm-4">
                <div class="service-block service-block-1 circle-block hide-animation slideUp">
                    <div class="circle-med-icon">
                        <i class="accent glyphicons glyphicons-cloud-download"></i>
                    </div>
                    <div class="service-block-text">
                        <h3><?= $this->getBlock('main_sec4_h3_1'); ?></h3>
                        <p>
                            <?= $this->getBlock('main_sec4_p_1'); ?>
                        </p>
                    </div>
                </div>
                <div class="service-block service-block-2 circle-block hide-animation slideUp">
                    <div class="circle-med-icon">
                        <i class="accent glyphicons glyphicons-certificate"></i>
                    </div>
                    <div class="service-block-text">
                        <h3><?= $this->getBlock('main_sec4_h3_2'); ?></h3>
                        <p>
                            <?= $this->getBlock('main_sec4_p_2'); ?>
                        </p>
                    </div>
                </div>
                <div class="service-block service-block-3 circle-block hide-animation slideUp">
                    <div class="circle-med-icon">
                        <i class="accent glyphicons glyphicons-ok-2"></i>
                    </div>
                    <div class="service-block-text">
                        <h3><?= $this->getBlock('main_sec4_h3_3'); ?></h3>
                        <p>
                            <?= $this->getBlock('main_sec4_p_3'); ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="service-block-col col-sm-4">
                <div class="service-block-img hide-animation slideUp"></div>
            </div>

            <div class="service-block-col col-sm-4">
                <div class="service-block service-block-1 circle-block hide-animation slideUp">
                    <div class="circle-med-icon">
                        <i class="accent glyphicons glyphicons-adjust-alt"></i>
                    </div>
                    <div class="service-block-text">
                        <h3><?= $this->getBlock('main_sec4_h3_4'); ?></h3>
                        <p>
                            <?= $this->getBlock('main_sec4_p_4'); ?>
                        </p>
                    </div>
                </div>
                <div class="service-block service-block-2 circle-block hide-animation slideUp">
                    <div class="circle-med-icon">
                        <i class="accent glyphicons glyphicons-crown"></i>
                    </div>
                    <div class="service-block-text">
                        <h3><?= $this->getBlock('main_sec4_h3_5'); ?></h3>
                        <p>
                            <?= $this->getBlock('main_sec4_p_5'); ?>
                        </p>
                    </div>
                </div>
                <div class="service-block service-block-3 circle-block hide-animation slideUp">
                    <div class="circle-med-icon">
                        <i class="accent glyphicons glyphicons-magic"></i>
                    </div>
                    <div class="service-block-text">
                        <h3><?= $this->getBlock('main_sec4_h3_6'); ?></h3>
                        <p>
                            <?= $this->getBlock('main_sec4_p_6'); ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="text-center">
                <a href="<?= Yii::app()->createUrl('/news/news/features'); ?>" class="ulkanbutton btn-temp"><?= Yii::t('default', "Barcha xususiyatlarni ko'rish"); ?></a>
            </div>
        </div>
        <!--/row-->
    </div><!-- /.container -->
</section>

<section class="clientsay container" id="m1">
    <h2 class="section-header text-center"><?= $this->getBlock('main_menu_1'); ?></h2>
    <?php
    $this->widget('news.widgets.LastNewsWidget', [
        'view' => 'mijoz',
        'limit' => 10,
        'category' => 'mijoz'
    ]);
    ?>
    <div id="mPlayer">
        <div> </div>
    </div>
</section>

<section class="yellowform">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="section-header text-center">
                    <?= $this->getBlock('main_sec5_h2'); ?>
                </h2>
            </div>
            <div class="col-sm-6">
                <form class="form-group ulkanform">
                    <div class="col-md-8">
                        <input class="ulkaninput ulkaninput2" name="em" placeholder="<?= Yii::t('default', 'Elektron pochtangizni kiriting'); ?>">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="ulkanbutton" style="border-bottom: 3px solid rgba(0, 0, 0, 0.1) !important;"  data-backdrop='static' data-toggle="modal" data-target="#myModal"><?= Yii::t('default', "Sayt yaratish"); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
Yii::app()->getClientScript()->registerScript('sticky', "
		//offset() measures how far down the sticky element is from the top of the window
		var stickyTop = $('#ulkan-top').offset().top;

		//whenever the user scrolls, measure how far we have scrolled
		$(window).scroll(function() {
		  var windowTop = $(window).scrollTop();

		  //check to see if we have scrolled past the original location of the sticky element
		  if (windowTop > stickyTop) {

		    //if so, change the sticky element to fised positioning
		    $('#ulkan-top').addClass('ulkan-top-fixed');
		  } else {   
		    $('#ulkan-top').removeClass('ulkan-top-fixed');
		  }
		});
		$('#em').change(function() {
	        $('input[name=\"GetStartedForm[email]\"]').val($(this).val());
	    });
	    
	    $('.ulkantext').click(function (e) {
	        e.preventDefault();
	        var targetId = $(this).find('a').attr('href');
	        $('html,body').animate({
	                scrollTop: $(targetId).offset().top-25
	            },
	            'slow');
	    });
	");
?>
