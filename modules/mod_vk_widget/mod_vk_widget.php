<?php
/**
 * @version $Id: header.php 739 2008-11-16 22:07:19Z elkuku $
 * @package		scatalog_categories
 * @subpackage	
 * @author		EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author		Constantine Poltyrev {@link http://www.clubrally.spb.ru}
 * @author		Created on 27-Dec-2008
 */

// no direct access
defined( '_JEXEC' ) or die( ';)' );

$vk_url = $params->get('vk_url');
$vk_widget='<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?49"></script>
<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "290"}, '.$vk_url.');
</script>';
// include the template for display
require(JModuleHelper::getLayoutPath('mod_vk_widget'));