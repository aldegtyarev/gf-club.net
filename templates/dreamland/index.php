<?php
/**
* @copyright Copyright (C) 2009 Joomlapanel.com. All rights reserved.
*/


defined( '_JEXEC' ) or die( 'Restricted access' );
$mainframe = JFactory::getApplication();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<?php
/* 
$menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) {
$siteHome = 1;
}
*/
$pageOption = JRequest::getVar('option', ''); 
?>
<jdoc:include type="head" />
<script type="text/javascript">jQuery.noConflict();</script>


<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/css/theme.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/css/new_year_motnya.css" type="text/css" />
<!--[if IE 6]>
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<![endif]-->
<!-- PNG FIX -->
<!--[if IE 6]>
<style type="text/css"> img { behavior: url(<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/css/iepngfix.htc); } </style>
<![endif]-->
<style type="text/css"><?php if($this->params->get('switchSidebar')=="right") { ?>
#content{float:left;} #sidebar{float:right;}<?php } ?><?php if($this->params->get('switchSidebar')=="left") { ?>
#mainbody{float:right;} #sidebar2{float:left;}<?php } ?><?php if(($this->countModules('left') == 0) && ($this->countModules('right') == 0)) { ?>
#mainbody {width:100%;} #content {width:100%;}
<?php } ?>
<?php if(($this->countModules('left') >= 1) && ($this->countModules('right') == 0)) { ?>
#mainbody {width:100%;} #content{width:75.6%;} #sidebar{width:23%;}
<?php } ?>
<?php if(($this->countModules('left') == 0) && ($this->countModules('right') >= 1)) { ?>
#content {width:100%;}
<?php } ?>
<?php if($this->params->get('customWidth')) { ?>
.width {width:<?php echo $this->params->get('customWidth');?>;}
<?php } ?>
<?php if($this->params->get('fontFamily') == "arial") { ?>
body, h1, h2, h3, h4, h5, h6, .componentheading, .contentheading, .contentdescription{font-family:Arial, Helvetica, sans-serif;}
<?php } elseif($this->params->get('fontFamily') == "times") { ?>
body, h1, h2, h3, h4, h5, h6, .componentheading, .contentheading, .contentdescription{font-family:"Times New Roman", Times, serif;}
<?php } elseif($this->params->get('fontFamily') == "courier") { ?>
body, h1, h2, h3, h4, h5, h6, .componentheading, .contentheading, .contentdescription{font-family:"Courier New", Courier, monospace;}
<?php } elseif($this->params->get('fontFamily') == "georgia") { ?>
body, h1, h2, h3, h4, h5, h6, .componentheading, .contentheading, .contentdescription{font-family:Georgia,"Times New Roman", Times, serif;}
<?php } ?>
<?php if($this->params->get('fontColor')){ ?>
body{color:<?php echo $this->params->get('fontColor'); ?>}
<?php } ?>
<?php if($this->params->get('linkColor')){ ?>
a:link, a:active, a:visited{color:<?php echo $this->params->get('linkColor'); ?>}
<?php } ?>
<?php if($this->params->get('linkHoverColor')){ ?>
a:hover{color:<?php echo $this->params->get('linkHoverColor'); ?>}
<?php } ?>
</style>
</head>
<?php
	if (!defined('_SAPE_USER')){
		define('_SAPE_USER', '62915df09639ed898f7284be0b801b81'); 
	}
	require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
	$o['charset'] = 'UTF-8';
	$sape = new SAPE_client($o);
	unset($o);
?>
<body>
<div class="b-page_newyear">   
    <div class="b-page__content">
        <i class="b-head-decor">
        <i class="b-head-decor__inner b-head-decor__inner_n1">
            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>

        <i class="b-head-decor__inner b-head-decor__inner_n2">
            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>
        <i class="b-head-decor__inner b-head-decor__inner_n3">

            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>
        <i class="b-head-decor__inner b-head-decor__inner_n4">
            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>
        <i class="b-head-decor__inner b-head-decor__inner_n5">
            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>
        <i class="b-head-decor__inner b-head-decor__inner_n6">
            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>
        <i class="b-head-decor__inner b-head-decor__inner_n7">
            <div class="b-ball b-ball_n1 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n2 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n3 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n4 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_n5 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n6 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n7 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n8 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_n9 b-ball_bounce"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i1"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i2"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i3"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i4"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>

            <div class="b-ball b-ball_i5"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
            <div class="b-ball b-ball_i6"><div class="b-ball__right"></div><div class="b-ball__i"></div></div>
        </i>
    </i>

	</div>
</div>


	<div id="header">
		<div class="width">
			<div class="inside">
				<table width="100%" border="0">
					<tr>
						<td width="35%">
							<a href="<?php echo $mainframe->getCfg('live_site'); ?>" id="logo" title="<?php echo $mainframe->getCfg('sitename'); ?>"></a>
						</td>
						<td align="right" width="60%">
							<jdoc:include type="modules" name="login" style="xhtml"/>
						</td>
					</tr>
				</table>
				<div id="submenu">
					<?php if ($this->countModules('menu')) { ?>
						<div id="mainmenu">
							<div id="mainmenu-l">
								<div id="mainmenu-r">
									<jdoc:include type="modules" name="menu" />
									<div class="clr"></div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div id="wrapper">
		<div class="width">
			<div id="slideshow">
				<div class="inside">
					<jdoc:include type="modules" name="slideshow" style="rounded"/>
				</div>
			</div>
			<div id="container">
				<div id="container-l">
					<div id="container-r">
						<?php if (($this->countModules('banner7')) || ($this->countModules('banner8')) || ($this->countModules('banner9'))) { ?>
						<div id="promo">
							<div class="inside">
								<table width="100%" class="banner-promo">
									<tr>
										<?php if ($this->countModules('banner7')) { ?>
										<td class="promo1">
											<jdoc:include type="modules" name="banner7" style="rounded"/>
										</td>
										<?php } ?>
										<?php if ($this->countModules('banner8')) { ?>
										<td class="promo2">
											<jdoc:include type="modules" name="banner8" style="rounded"/>
										</td>
										<?php } ?>
										<?php if ($this->countModules('banner9')) { ?>
										<td class="promo3">
											<jdoc:include type="modules" name="banner9" style="rounded"/>
										</td>
										<?php } ?>
									</tr>
								</table>
							</div>
						</div>
						<?php } ?>
						<div class="clr"></div>
						<div id="container-inner">
							<div id="mainbody">
								<div id="content">
									<?php if (($this->countModules('advert1')) || ($this->countModules('advert2'))) { ?>
										<table width="100%" border="0" class="advert">
											<tr>
												<?php if ($this->countModules('advert1')) { ?>
													<td class="advert-1">
														<jdoc:include type="modules" name="advert1" style="rounded" />
													</td>
												<?php } ?>
												<?php if ($this->countModules('advert2')) { ?>
													<td class="advert-2">
														<jdoc:include type="modules" name="advert2" style="rounded" />
													</td>
												<?php } ?>
											</tr>
										</table>
									<?php } ?>
									<?php if ($this->countModules('breadcrumb')) { ?>
										<div id="pathway">
											<div id="pathway-tr">
												<div id="pathway-bl">
													<div id="pathway-br">
														<jdoc:include type="modules" name="breadcrumb" />
														<div class="clr"></div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
									<jdoc:include type="message" />
									<jdoc:include type="component" />
								<?php if ($this->countModules('insert')) { ?>
									<div id="sidebar">
										<jdoc:include type="modules" name="insert" style="rounded" />
									</div>
									<div class="clr"></div>																		
								<?php } ?>

									<div class="sape">
										<div class="module">
											<h3>Полезно посмотреть</h3>
											<?php echo $sape->return_links(1); ?>
										</div>
									</div>

								</div>
								<div class="clr"></div>
							</div>
							<?php if ($this->countModules('right')) { ?>
								<div id="sidebar2">
									<jdoc:include type="modules" name="right" style="rounded" />
									<div class="sape">
										<div class="module">
											<h3>Полезно посмотреть</h3>
											<?php echo $sape->return_links(); ?>
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="clr"></div>
						</div>
					</div>
				</div>
			</div>
			<?php if (($this->countModules('user5')) || ($this->countModules('user6')) || ($this->countModules('user7')) || ($this->countModules('user6'))) { ?>
				<div id="bottom-tl">
					<div id="bottom-tr">
						<div id="bottom-bl">
							<div id="bottom-br">
								<table width="100%" class="elements">
									<tr>
										<?php if ($this->countModules('user5')) { ?>
											<td class="elements-1">
												<div class="elements_1_wrap">
													<div class="elements_1_wr">
														<jdoc:include type="modules" name="user5" style="xhtml" />
													</div>
												</div>
											</td>
										<?php } ?>
										<?php if ($this->countModules('user6')) { ?>
											<td class="elements-2">
												<jdoc:include type="modules" name="user6" style="xhtml" />
											</td>
										<?php } ?>
										<?php if ($this->countModules('user7')) { ?>
											<td class="elements-3">
												<jdoc:include type="modules" name="user7" style="xhtml" />
											</td>
										<?php } ?>
										<?php if ($this->countModules('user8')) { ?>
											<td class="elements-4">
												<jdoc:include type="modules" name="user8" style="xhtml" />
											</td>
										<?php } ?>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<div id="footer">
			<?php require_once (JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'ytrkjaerffkkf.php'); ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/js/swfobject.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/js/newyear.js"></script>

</body>
</html>