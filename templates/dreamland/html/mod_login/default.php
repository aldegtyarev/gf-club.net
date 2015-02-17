<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if($type == 'logout') : ?>
<style type="text/css">
<!--
#form-login table tr td a {
	font-family: Georgia, "Times New Roman", Times, serif;
}
-->
</style>

<form action="index.php" method="post" name="login" id="form-login">
<?php if ($params->get('greeting')) : ?>
<?php if ($params->get('name')) : {
		echo JText::sprintf( 'HINAME', $user->get('name') );
	} else : {
		echo JText::sprintf( 'HINAME', $user->get('username') );
	} endif; ?>
  <?php endif; ?>
  <div align="center">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'BUTTON_LOGOUT'); ?>" />
  </div>

	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="logout" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>
<?php else : ?>
<?php if(JPluginHelper::isEnabled('authentication', 'openid')) :
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = 	'var JLanguage = {};'.
						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
						' var modlogin = 1;';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
endif; ?>
<form action="<?php echo JRoute::_( 'index.php', true, $params->get('usesecure')); ?>" method="post" name="login" id="form-login" >
<table align="center" cellpadding="2px">
  <tr>
    <td><input name="username" type="text" class="inputbox" id="modlgn_username" value="Username" size="18" alt="username" /></td>
    <td><input name="passwd" type="password" class="inputbox" id="modlgn_passwd" value="Password" size="18" alt="password" /></td>
    <td><input type="submit" name="Submit2" class="button" value="<?php echo JText::_('LOGIN') ?>" /></td>
    <td><a href="<?php echo JRoute::_( 'index.php?option=com_user&task=register' ); ?>"><input type="submit" name="Submit2" class="button" value="<?php echo JText::_('REGISTER') ?>" /></a></td>
  </tr>
  <tr>
    <td><a href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' ); ?>"> Lost Username</a></td>
    <td><a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>"> Lost Password</a></td>
    <td></td>
    <td></td>
    </tr>
</table>

    <?php
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		if ($usersConfig->get('allowUserRegistration')) : ?>

	  <?php endif; ?>
	  <?php echo $params->get('posttext'); ?>
	  
	  <input type="hidden" name="option" value="com_user" />
	  <input type="hidden" name="task" value="login" />
	  <input type="hidden" name="return" value="<?php echo $return; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php endif; ?>
