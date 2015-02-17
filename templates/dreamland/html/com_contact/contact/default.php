<?php
/**
* $Id: default.php 10571 2008-07-21 01:27:35Z pasamio $
*/
defined( '_JEXEC' ) or die( 'Restricted access' );

$cparams = JComponentHelper::getParams ('com_media');
?>
<?php if ( $this->params->get( 'show_page_title', 1 ) && !$this->contact->params->get( 'popup' ) && $this->params->get('page_title') != $this->contact->name ) : ?>

<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->params->get( 'page_title' ); ?> </h1>
<div class="clr"></div>
<?php endif; ?>
<div id="component-contact">
  <div class="contentpaneopen<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
    <?php if ( $this->params->get( 'show_contact_list' ) && count( $this->contacts ) > 1) : ?>
    <div>
      <form action="<?php echo JRoute::_('index.php') ?>" method="post" name="selectForm" id="selectForm">
        <?php echo JText::_( 'Select Contact' ); ?>: <br />
        <?php echo JHTML::_('select.genericlist', $this->contacts, 'contact_id', 'class="inputbox" onchange="this.form.submit()"', 'id', 'name', $this->contact->id);?>
        <option type="hidden" name="option" value="com_contact" />
      </form>
    </div>
    <?php endif; ?>
    <?php if ( $this->contact->name && $this->contact->params->get( 'show_name' ) ) : ?>
    <h2 class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"><?php echo $this->contact->name; ?> </h2>
    <div class="clr"></div>
    <?php endif; ?>
    <?php if ( $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>
    <h3 class="contact_position_marker"> <?php echo $this->contact->con_position; ?> </h3>
    <div class="clr"></div>
    <?php endif; ?>
    <div>
      <?php if ( $this->contact->image && $this->contact->params->get( 'show_image' ) ) : ?>
      <div style="float: right;"> <?php echo JHTML::_('image', $cparams->get('image_path') . '/'.$this->contact->image, JText::_( 'Contact' ), array('align' => 'middle')); ?> </div>
      <?php endif; ?>
      <?php echo $this->loadTemplate('address'); ?> </div>
  </div>
  <?php if ( $this->contact->params->get( 'allow_vcard' ) ) : ?>
  <div> <?php echo JText::_( 'Download information as a' );?> <a href="<?php echo JURI::base(); ?>index.php?option=com_contact&amp;task=vcard&amp;contact_id=<?php echo $this->contact->id; ?>&amp;format=raw&amp;tmpl=component"> <?php echo JText::_( 'VCard' );?></a> </div>
  <?php endif;
if ( $this->contact->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id))
echo $this->loadTemplate('form');
?>
</div>

