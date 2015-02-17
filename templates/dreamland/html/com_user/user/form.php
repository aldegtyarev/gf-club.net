<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
function submitbutton( pressbutton ) {
var form = document.userform;
var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");

if (pressbutton == 'cancel') {
form.task.value = 'cancel';
form.submit();
return;
}

// do field validation
if (form.name.value == "") {
alert( "<?php echo JText::_( 'Please enter your name.', true );?>" );
} else if (form.email.value == "") {
alert( "<?php echo JText::_( 'Please enter a valid e-mail address.', true );?>" );
} else if (((form.password.value != "") || (form.password2.value != "")) && (form.password.value != form.password2.value)){
alert( "<?php echo JText::_( 'REGWARN_VPASS2', true );?>" );
} else if (r.exec(form.password.value)) {
alert( "<?php printf( JText::_( 'VALID_AZ09', true ), JText::_( 'Password', true ), 4 );?>" );
} else {
form.submit();
}
}
</script>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
  <h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </h1>
  <div class="clr"></div>
  <?php endif; ?>


<div class="contentarticle">
<div class="inside">

<form action="index.php" method="post" name="userform" autocomplete="off">
  
	<div class="user_form">

      <div><label for="username"> <?php echo JText::_( 'User Name' ); ?>: </label>
      </div>
      <div><span><?php echo $this->user->get('username');?></span> </div>

      <div><label for="name"> <?php echo JText::_( 'Your Name' ); ?>: </label>
      </div>
      <div><input class="inputbox" type="text" id="name" name="name" value="<?php echo $this->user->get('name');?>" size="40" />
      </div>

      <div><label for="email"> <?php echo JText::_( 'email' ); ?>: </label>
      </div>
      <div><input class="inputbox" type="text" id="email" name="email" value="<?php echo $this->user->get('email');?>" size="40" />
      </div>

    <?php if($this->user->get('password')) : ?>

      <div><label for="password"> <?php echo JText::_( 'Password' ); ?>: </label>
      </div>
      <div><input class="inputbox" type="password" id="password" name="password" value="" size="40" />
      </div>

      <div><label for="password2"> <?php echo JText::_( 'Verify Password' ); ?>: </label>
      </div>
      <div><input class="inputbox" type="password" id="password2" name="password2" size="40" />
      </div>

    <?php endif; ?>

  <?php if(isset($this->params)) : echo $this->params->render( 'params' ); endif; ?>
<div>
  <button class="button" type="submit" onclick="submitbutton( this.form );return false;"><?php echo JText::_('Save'); ?></button>
  <input type="hidden" name="username" value="<?php echo $this->user->get('username');?>" />
  <input type="hidden" name="id" value="<?php echo $this->user->get('id');?>" />
  <input type="hidden" name="gid" value="<?php echo $this->user->get('gid');?>" />
  <input type="hidden" name="option" value="com_user" />
  <input type="hidden" name="task" value="save" />
  <?php echo JHTML::_( 'form.token' ); ?>
</div>
  </div>
</form>
</div>
</div>
