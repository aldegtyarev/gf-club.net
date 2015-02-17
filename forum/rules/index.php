<?php
/**
*
* @package phpBB3
* @version: rules.php v.1.0 2010-01-13
* @copyright (c) 2010 Nekstati
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// Load the appropriate faq file
$user->add_lang('rules', false, true);

$cat_count = 0;
$rule_count = 0;
$subrule_count = 0;
$subsubrule_count = 0;

// Pull the array data from the lang pack
$help_blocks = array();
foreach ($user->help as $help_ary)
{
	if ($help_ary[0] == '--') // It's category
	{
		$cat_count++;
		$rule_count = 0;
		
		$template->assign_block_vars('cat_row', array(
			'CAT_TEXT'			=> $help_ary[1],
			'CAT_NUMBER'		=> $cat_count,
		));

		continue;
	}
	
	elseif (strpos($help_ary[0], '~~') === 0) // It's subsubrule
	{
		$subsubrule_count++;

		$template->assign_block_vars('cat_row.rule_row.subrule_row.subsubrule_row', array(
			'SUBSUBRULE_TEXT'		=> $help_ary[1],
			'SUBSUBRULE_NUMBER'		=> $cat_count . '.' . $rule_count . '.' . $subrule_count . '.' . $subsubrule_count,
		));
		
		continue;
	}

	elseif (strpos($help_ary[0], '~') === 0) // It's subrule
	{
		$subrule_count++;
		$subsubrule_count = 0;

		$template->assign_block_vars('cat_row.rule_row.subrule_row', array(
			'SUBRULE_TEXT'			=> $help_ary[1],
			'SUBRULE_NUMBER'		=> $cat_count . '.' . $rule_count . '.' . $subrule_count,
		));
		
		continue;
	}

	else // Hyphen & tilde not found? So it's rule
	{
		$rule_count++;
		$subrule_count = 0;

		$template->assign_block_vars('cat_row.rule_row', array(
			'RULE_TEXT'			=> $help_ary[1],
			'RULE_NUMBER'		=> $cat_count . '.' . $rule_count,
		));
		
		continue;
	}
}

// If we have more than 6 categories, let's split the list of categories into two columns of equal height
$template->assign_vars(array(
	'CAT_COUNT_HALF'		=> ($cat_count > 6) ? round($cat_count / 2 + 1) : 0,
));

// Lets build a page
page_header($user->lang['BOARD_RULES']);

$template->set_filenames(array(
	'body' => 'rules_body.html'
));
make_jumpbox(append_sid("{$phpbb_root_path}viewforum.$phpEx"));

page_footer();

?>