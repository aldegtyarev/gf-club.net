<?php
/**
* @version		1.0 from Beliyadm
* @copyright	Copyright (C) 2008 - 2009 Open Source Matters. All rights reserved.
*/
// no direct access
defined( '_JEXEC' ) or die( 'Прямой доступ запрещен' );

class plgContentPbspoiler extends JPlugin
{
	//protected static $modules = array();
	//protected static $mods = array();
	
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}
	
	
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{
		//include some style CSS
		/*
		function pb_spoiler_css()
			{
				$mainframe = &JFactory::getDocument();
				$config 		= & JFactory::getConfig();
				$plugin 		=& JPluginHelper::getPlugin('content', 'pb_spoiler');

				$pluginParams 	= new JParameter( $plugin->params );
				$jsjquery 		= $pluginParams->get('jsjquery', 1);
				$jsshow 		= $pluginParams->get('jsshow', 1);
				$header 	= '';
				if ($jsjquery == '1') {
				$header 	.= '<script type="text/javascript" src="'.$config->getValue('live_site').'/plugins/content/pb_spoiler/jquery.js"></script>';
				} else {}
				$header 	.= '<script type="text/javascript" src="'.$config->getValue('live_site').'/plugins/content/pb_spoiler/accordion.js"></script>';
				$header 	.= "<script type=\"text/javascript\">
							jQuery().ready(function(){
								// applying the settings
								jQuery('.pbspoiler').Accordion({
									active: 'span.selected',
									header: 'span.head',
									alwaysOpen: false,
									animated: true,
									showSpeed: ".$jsshow."
								});
							});
							</script>";
				$header 	.= '<link rel="stylesheet" href="'.$config->getValue('live_site').'/plugins/content/pb_spoiler/style.css" type="text/css" />';
				$mainframe->addCustomTag($header);
			}

		function pb_spoiler(&$row, &$params)
			{
				$regex = "#{spoiler(?: title=(([_0-9A-Za-zА-яа-яЁё](.*?)))?)?}(.*?){/spoiler}#s";
				$row->text = preg_replace_callback( $regex, 'pb_spoiler_replacer', $row->text );
				return true;
			}

		function pb_spoiler_replacer ( &$matches )
			{
				$html 	= '';
				$regex1 = "#{spoiler title=([_0-9A-Za-zА-яа-яЁё](.*?))}#s";
				$regex2 = "#{/spoiler}#s";
				$spoilertext = preg_replace($regex2, '', (preg_replace($regex1, '', $matches[0])));
				$html .= '<ul class="pbspoiler">';
				$html .= '<li><span class="head"><a href="javascript:;" title="Развернуть">'.$matches[1].'</a></span>
						<ul>
							<li>'.$spoilertext.'</li>
						</ul>
					</li>';
				$html .= '</ul>';
				return $html;
			}
		*/
		//$this->pb_spoiler_css();
		//print '8888888888888888888888888888888888888';
		//print_r($article->text);
		$article->text = '8888888888888888888888888888888888888888';
	}
}

?>