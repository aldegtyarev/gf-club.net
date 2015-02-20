<?php
/**
 *-------------------------------------------
 * Szablon został wypalony w  Diablodesign.
 * www.diablodesign.eu
 * biuro@diablodesign.eu
 * tel.666-977-944
 *-------------------------------------------
 */
defined('_JEXEC') or die;


require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

$document = $this;

$templateUrl = $document->baseurl . '/templates/' . $document->template;

Artx::load("Artx_Page");

$view = $this->artx = new ArtxPage($this);

$view->componentWrapper();

JHtml::_('behavior.framework', true);
$app = JFactory::getApplication();
$tplparams	= $app->getTemplate(true)->params;
//on off
$fbc = htmlspecialchars($tplparams->get('fbc'));
$twc = htmlspecialchars($tplparams->get('twc'));
$ytc = htmlspecialchars($tplparams->get('ytc'));
$rssc = htmlspecialchars($tplparams->get('rssc'));
$slidec = htmlspecialchars($tplparams->get('slidec'));
$textc = htmlspecialchars($tplparams->get('textc'));
$backc = htmlspecialchars($tplparams->get('backc'));
$sitename = $app->get('sitename');

if (!defined('_SAPE_USER')){
	define('_SAPE_USER', '62915df09639ed898f7284be0b801b81'); 
}
require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
$o['charset'] = 'UTF-8';
$sape = new SAPE_client($o);
unset($o);

?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $document->language; ?>">
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" />


    
    
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" />
    <!--[if lte IE 7]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.responsive.css" media="all" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
    <script src="<?php echo $templateUrl; ?>/jquery.js"></script>
    <script>jQuery.noConflict();</script>

    <script src="<?php echo $templateUrl; ?>/script.js"></script>
    <script src="<?php echo $templateUrl; ?>/script.responsive.js"></script>
    <script src="<?php echo $templateUrl; ?>/modules.js"></script>
    <?php $view->includeInlineScripts() ?>
    <script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
    <?php if ($backc == 1) { ?> <!--scroling head-->
<script src="<?php echo $templateUrl; ?>/js/scroling.js"></script>
<script type="text/javascript">
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});
</script>
<!--end scroling--><?php } ?>
    <?php if ($slidec == 1) { ?><!--slideshow header start-->

<link rel="stylesheet" href="<?php echo $templateUrl; ?>/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $templateUrl; ?>/themes/pascal/pascal.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $templateUrl; ?>/themes/orman/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $templateUrl; ?>/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo $templateUrl; ?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">      
 var $j = jQuery.noConflict();       
 jQuery(document).ready(function ($){   
 $j("#slider").nivoSlider(          
); });          
 </script>
<!--slideshow header end-->
<?php } ?>
</head>
<body>
<!--License Number :<?php echo $this->params->get('license'); ?>-->
<?php if ($backc == 1) { ?><div id="toTop"><p>^<?php echo $this->params->get('scroll'); ?></p></div><?php } ?>
<div id="dd-main">
	<header class="dd-header"><?php echo $view->position('position-30', 'dd-nostyle'); ?>

	<div class="dd-shapes">
		<div class="dd-textblock dd-object1701156306">
			<div class="dd-object1701156306-text-container">
				<div class="dd-object1701156306-text"><?php echo $view->position('headertext', 'dd-nostyle'); ?><?php if ($textc == 1) { ?><p><a href="<?php echo $this->params->get('textlink'); ?>"><?php echo $this->params->get('text'); ?></a></p><?php } ?></div>
			</div>
		</div>
	</div>



	<div class="dd-textblock dd-textblock-619642689">
		<div class="dd-textblock-619642689-text-container">
			<?php if ($fbc == 1) { ?><div class="dd-textblock-619642689-text"><a href="<?php echo $this->params->get('facebook'); ?>" target="_blank" class="dd-facebook-tag-icon"></a></div><?php } ?>
		</div> 
	</div>
	<div class="dd-textblock dd-textblock-122068005">
		<div class="dd-textblock-122068005-text-container">
			<?php if ($twc == 1) { ?><div class="dd-textblock-122068005-text"><a href="<?php echo $this->params->get('twitter'); ?>" target="_blank" class="dd-twitter-tag-icon"></a></div><?php } ?>
		</div>
	</div>
	<?/*
	<div class="dd-textblock dd-textblock-122068005">
		<div class="dd-textblock-122068005-text-container">
			<?php if ($ytc == 1) { ?><div class="dd-textblock-122068005-text"><a href="<?php echo $this->params->get('youtube'); ?>" target="_blank" class="dd-youtube-tag-icon"></a></div><?php } ?>
		</div>
	</div>
	*/?>


	<a href="/" class="dd-logo dd-logo-825675486">
		<img src="<?php echo $this->params->get('logo'); ?>" alt="" />
	</a>
	
	<a href="/" class="dd-logo dd-logo-2128223586">
			<img src="<?php echo $templateUrl; ?>/images/logo-2128223586.png" alt="" />
	</a>
	
	<div class="dd-logo dd-logo-1192095588">
		<img src="<?php echo $templateUrl; ?>/images/logo-1192095588.png" alt="" />
	</div>
	
	<div class="dd-textblock dd-object684197008">
		<form class="dd-search" name="Search" action="<?php echo $document->baseurl; ?>/index.php" method="post">
			<input type="text" value="" name="searchword" />
			<input type="hidden" name="task" value="search" />
			<input type="hidden" name="option" value="com_search" />
			<input type="submit" value="" name="search" class="dd-search-button" />
		</form>
	</div>
	<?php if ($view->containsModules('position-1', 'position-28', 'position-29')) : ?>
	<nav class="dd-nav">

	<?php if ($view->containsModules('position-28')) : ?>
	<div class="dd-hmenu-extra1"><?php echo $view->position('position-28'); ?></div>
	<?php endif; ?>
	<?php if ($view->containsModules('position-29')) : ?>
	<div class="dd-hmenu-extra2"><?php echo $view->position('position-29'); ?></div>
	<?php endif; ?>
	<?php echo $view->position('position-1'); ?>

		</nav>
	<?php endif; ?>


	</header>
	
<div class="dd-sheet clearfix">
            <?php echo $view->position('position-15', 'dd-nostyle'); ?>
<?php echo $view->positions(array('position-16' => 33, 'position-17' => 33, 'position-18' => 34), 'dd-block'); ?>
<div class="dd-layout-wrapper">
                <div class="dd-content-layout">
                    <div class="dd-content-layout-row">
                        <div class="dd-layout-cell dd-content">
                        <!--slideshow image-->
                        <?php echo $view->position('slideshow'); ?><!--498px/400px-->
    <?php if ($slidec == 1) { ?><div id="wrapper">
<div class="slider-wrapper theme-default">
            
            <div id="slider" class="nivoSlider">

<img src="<?php echo $this->baseurl ?>/<?php echo $this->params->get('foto1'); ?>" alt="foto1"/>
<img src="<?php echo $this->baseurl ?>/<?php echo $this->params->get('foto2'); ?>" alt="foto2"/>
<img src="<?php echo $this->baseurl ?>/<?php echo $this->params->get('foto3'); ?>" alt="foto3"/>
<img src="<?php echo $this->baseurl ?>/<?php echo $this->params->get('foto4'); ?>" alt="foto4"/>
<img src="<?php echo $this->baseurl ?>/<?php echo $this->params->get('foto5'); ?>" alt="foto5"/>

</div>
</div>
</div>

 
<br><br><?php } ?>
<!-- end slideshow image-->
<?php
  echo $view->position('position-19', 'dd-nostyle');
  if ($view->containsModules('position-2'))
    echo artxPost($view->position('position-2'));
  echo $view->positions(array('position-20' => 50, 'position-21' => 50), 'dd-article');
  echo $view->position('position-12', 'dd-nostyle');
  echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' dd-messages'));
  echo '<jdoc:include type="component" />';
  echo $view->position('position-22', 'dd-nostyle');
  echo $view->positions(array('position-23' => 50, 'position-24' => 50), 'dd-article');
  echo $view->position('position-25', 'dd-nostyle');
?>

							<div class="dd-block clearfix">
								<div class="dd-blockheader"><h3 class="t">Полезно посмотреть</h3></div>
								<div class="dd-blockcontent"><?php echo $sape->return_links(1); ?></div>
							</div>                        

                        </div>

                       <div class="dd-layout-cell dd-sidebar1">                        
						   <?php if ($view->containsModules('position-7', 'position-4', 'position-5')) : ?>

							<?php echo $view->position('position-7', 'dd-block'); ?>
							<?php echo $view->position('position-4', 'dd-block'); ?>
							<?php echo $view->position('position-5', 'dd-block'); ?>

							<div class="dd-block clearfix">
								<div class="dd-blockheader"><h3 class="t">Полезно посмотреть</h3></div>
								<div class="dd-blockcontent"><?php echo $sape->return_links(); ?></div>
							</div>
							<?php endif; ?>
                        </div>


                        <?php if ($view->containsModules('position-6', 'position-8', 'position-3')) : ?>
							<div class="dd-layout-cell dd-sidebar2">
								<?php echo $view->position('position-6', 'dd-block'); ?>
								<?php echo $view->position('position-8', 'dd-block'); ?>
								<?php echo $view->position('position-3', 'dd-block'); ?>
							</div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
            
			<?php echo $view->positions(array('position-9' => 33, 'position-10' => 33, 'position-11' => 34), 'dd-block'); ?>
			
			<div class="block-position-26 clearfix"><div class="block-position-26-wr"><?php echo $view->position('position-26', 'dd-nostyle'); ?></div></div>
			

	<footer class="dd-footer">
		<?php if ($view->containsModules('position-27')) : ?>
			<?php echo $view->position('position-27', 'dd-nostyle'); ?>
		<?php else: ?>
			<div style="position:relative;padding-left:0px;padding-right:0px">
				&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
			</div>
		<?php endif; ?>
	</footer>

    </div>
    <?/*
    <p class="dd-page-footer">
        &copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
    </p>
	*/?>
</div>


<?php echo $view->position('debug'); ?>
</body>
</html>