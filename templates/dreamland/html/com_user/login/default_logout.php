<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php /** @todo Should this be routed */ ?>

<form action="index.php" method="post" name="login" id="com-form-login">
  <?php if ( $this->params->get( 'show_logout_title' ) ) : ?>
  <h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->params->get( 'header_logout' ); ?> </h1>
  <div class="clr"></div>
  <?php endif; ?>
  <div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>" width="100%">
    <div> <?php echo $this->image; ?>
      <?php
if ($this->params->get('description_logout')) :
echo $this->params->get('description_logout_text');
endif;
?>
    </div>
    
    <div class="clr"></div>
    
    <div align="center">
      <input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'Logout' ); ?>" />
    </div>
  </div>
  <input type="hidden" name="option" value="com_user" />
  <input type="hidden" name="task" value="logout" />
  <input type="hidden" name="return" value="<?php echo $this->return; ?>" />
</form>

