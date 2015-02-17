<?php defined('_JEXEC') or die; ?>

<form action="index.php?option=com_user&amp;task=remindusername" method="post" class="josForm form-validate">
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>

<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </h1>
<div class="clr"></div>
<?php endif; ?>
  <div class="contentpane">
  <div class="remind_form">
    <div class="remind_description">
      <p><?php echo JText::_('REMIND_USERNAME_DESCRIPTION'); ?></p>
    </div>
    <div class="remind_email">
      <label for="email" class="hasTip" title="<?php echo JText::_('REMIND_USERNAME_EMAIL_TIP_TITLE'); ?>::<?php echo JText::_('REMIND_USERNAME_EMAIL_TIP_TEXT'); ?>"><?php echo JText::_('Email Address'); ?>:</label>
      <input id="email" name="email" type="text" class="required validate-email" />
    </div>
  
  <button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
  <?php echo JHTML::_( 'form.token' ); ?>
  </div>
  </div>
</form>

