<?php defined('_JEXEC') or die; ?>

<form action="index.php?option=com_user&amp;task=requestreset" method="post" class="josForm form-validate">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>

<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </h1>
<div class="clr"></div>
<?php endif; ?>
  <div class="contentpane">
  <div class="reset_form">
    <div class="reset_description"><p><?php echo JText::_('RESET_PASSWORD_REQUEST_DESCRIPTION'); ?></p></div>
      <div class="reset_email"><label for="email" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_EMAIL_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_EMAIL_TIP_TEXT'); ?>"><?php echo JText::_('Email Address'); ?>:</label>
      <input id="email" name="email" type="text" class="required validate-email" />
      </div>
  
  <button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
  <?php echo JHTML::_( 'form.token' ); ?>
  </div>
  </div>
</form>

