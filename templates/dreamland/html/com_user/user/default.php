<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>



<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
    <div class="clr"></div>
<?php endif; ?>
<div class="user_description">

<div class="contentarticle">
<div class="inside">
		<?php echo JText::_( 'WELCOME_DESC' ); ?>
</div>
</div>
</div>
