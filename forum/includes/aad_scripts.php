<?php
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);
define('JPATH_BASE', str_replace(DS.'forum'.DS.'includes','',dirname(__FILE__)));

require_once ( JPATH_BASE . DS . 'includes' . DS . 'defines.php' );
//require_once ( JPATH_BASE . DS . 'includes' . DS . 'framework.php' );
//
// Joomla system checks.
//

@ini_set('magic_quotes_runtime', 0);
@ini_set('zend.ze1_compatibility_mode', '0');

//
// Installation check, and check on removal of the install directory.
//

if (!file_exists(JPATH_CONFIGURATION.'/configuration.php') || (filesize(JPATH_CONFIGURATION.'/configuration.php') < 10) || file_exists(JPATH_INSTALLATION.'/index.php')) {

	if (file_exists(JPATH_INSTALLATION.'/index.php')) {
		header('Location: '.substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], 'index.php')).'installation/index.php');
		exit();
	} else {
		echo 'No configuration file found and no installation code available. Exiting...';
		exit();
	}
}

//
// Joomla system startup.
//

// System includes.
require_once JPATH_LIBRARIES.'/import.php';

// Force library to be in JError legacy mode
JError::$legacy = true;
JError::setErrorHandling(E_NOTICE, 'message');
JError::setErrorHandling(E_WARNING, 'message');
JError::setErrorHandling(E_ERROR, 'callback', array('JError', 'customErrorPage'));

// Botstrap the CMS libraries.
require_once JPATH_LIBRARIES.'/cms.php';

// Pre-Load configuration.
ob_start();
require_once JPATH_CONFIGURATION.'/configuration.php';
ob_end_clean();

// System configuration.
$config_j = new JConfig();

// Set the error_reporting
switch ($config_j->error_reporting)
{
	case 'default':
	case '-1':
		break;

	case 'none':
	case '0':
		error_reporting(0);
		break;

	case 'simple':
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		ini_set('display_errors', 1);
		break;

	case 'maximum':
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		break;

	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
		break;

	default:
		error_reporting($config_j->error_reporting);
		ini_set('display_errors', 1);
		break;
}

define('JDEBUG', $config_j->debug);

unset($config_j);

//
// Joomla framework loading.
//

// System profiler.
if (JDEBUG) {
	jimport('joomla.error.profiler');
	$_PROFILER = JProfiler::getInstance('Application');
}

//
// Joomla library imports.
//

jimport('joomla.application.menu');
jimport('joomla.environment.uri');
jimport('joomla.utilities.utility');
jimport('joomla.event.dispatcher');
jimport('joomla.utilities.arrayhelper');


//$mainframe = &JFactory::getDocument();
$application = &JFactory::getApplication('site');
//print_r($mainframe);

function OSModulePosition($position, $style =- 2)
{
		//global $mainframe;
		$mainframe = JFactory::getDocument();
		$renderer = $mainframe->loadRenderer('module');
		//print_r($renderer);
		$params = array('style'=>$style); 
		$module ='';
 
		foreach (JModuleHelper::getModules($position) as $mod){
			$module.= $renderer->render($mod, $params);
		}
		//echo'777777777777777777';
		return $module;
}

//print_r($mainframe);

//require JPATH_BASE.'/includes/framework.php';
/*
$db =& JFactory::getDBO();	

*/
	$aad = "HELLO_AAD777";
	$aad = JPATH_CONFIGURATION;
	/*
	ob_start(); 
	echo OSModulePosition('login');
	//echo'<pre>';print_r('7777777777');echo'</pre>';
	//OSModulePosition('login ', 'xhtml');
	$aad = ob_get_contents();
	ob_end_clean();
	//ob_end_flush();
	//print_r($aad);
	print_r($aad);
	*/
	
	$template->assign_var("AAD", $aad);
?>