<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
<!--
Window.onDomReady(function(){
document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); } );
});
// -->
</script>
<?php
if(isset($this->message)){
$this->display('message');
}
?>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">
  <?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
  <h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"><?php echo $this->escape($this->params->get('page_title')); ?></h1>
  <div class="clr"></div>
  <?php endif; ?>
  <div class="contentpane">
  <div class="registration_form">
    <div>
      <label id="namemsg" for="name"> <?php echo JText::_( 'Name' ); ?>: </label>
    </div>
    <div>
      <input type="text" name="name" id="name" size="40" value="<?php echo $this->user->get( 'name' );?>" class="inputbox required" maxlength="50" />
      * </div>
    <div>
      <label id="usernamemsg" for="username"> <?php echo JText::_( 'Username' ); ?>: </label>
    </div>
    <div>
      <input type="text" id="username" name="username" size="40" value="<?php echo $this->user->get( 'username' );?>" class="inputbox required validate-username" maxlength="25" />
      * </div>
    <div>
      <label id="emailmsg" for="email"> <?php echo JText::_( 'Email' ); ?>: </label>
    </div>
    <div>
      <input type="text" id="email" name="email" size="40" value="<?php echo $this->user->get( 'email' );?>" class="inputbox required validate-email" maxlength="100" />
      * </div>
    <div>
      <label id="pwmsg" for="password"> <?php echo JText::_( 'Password' ); ?>: </label>
    </div>
    <div>
      <input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" />
      * </div>
    <div>
      <label id="pw2msg" for="password2"> <?php echo JText::_( 'Verify Password' ); ?>: </label>
    </div>
    <div>
      <input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" />
      * </div>
    <div><?php echo JText::_( 'REGISTER_REQUIRED' ); ?> </div>
    <button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
    <input type="hidden" name="task" value="register_save" />
    <input type="hidden" name="id" value="0" />
    <input type="hidden" name="gid" value="0" />
    <?php echo JHTML::_( 'form.token' ); ?> </div></div>
</form>
