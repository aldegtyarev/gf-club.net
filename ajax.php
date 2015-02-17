<?php
define('_JEXEC', 1);
define('JPATH_BASE', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once ( JPATH_BASE . DS . 'includes' . DS . 'defines.php' );
require_once ( JPATH_BASE . DS . 'includes' . DS . 'framework.php' );
// Mark afterLoad in the profiler.
JDEBUG ? $_PROFILER->mark('afterLoad') : null;

// Instantiate the application.
$app = JFactory::getApplication('site');

// Initialise the application.
$app->initialise();

// Mark afterIntialise in the profiler.
JDEBUG ? $_PROFILER->mark('afterInitialise') : null;

// Route the application.
$app->route();

// Mark afterRoute in the profiler.
JDEBUG ? $_PROFILER->mark('afterRoute') : null;

// Dispatch the application.
$app->dispatch();

// Mark afterDispatch in the profiler.
JDEBUG ? $_PROFILER->mark('afterDispatch') : null;

// Render the application.
$app->render();

// Mark afterRender in the profiler.
JDEBUG ? $_PROFILER->mark('afterRender') : null;

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


if (JRequest::getVar('getModules'))
{ 
	ob_start(); 
	echo OSModulePosition('login','xhtml');
	$images = ob_get_contents();
	ob_end_clean();

	ob_start(); 
	echo OSModulePosition('news_pos','xhtml');
	$news = ob_get_contents();
	ob_end_clean();

	echo json_encode(array('res' => 'error','images' => $images,'news' => $news));
}


//echo 'Hello';

?>