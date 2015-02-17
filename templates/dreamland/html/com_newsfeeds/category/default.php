<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>

<h1 class="componentheading<?php echo $this->params->get('pageclass_sfx')?>"><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<div class="clr"></div>
<?php endif; ?>
<div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
  <?php if ( @$this->image || @$this->category->description ) : ?>
  <h4 class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
    <?php
		if ( isset($this->image) ) :  echo $this->image; endif;
		echo $this->category->description;
	?>
  </h4>
  <div class="clr"></div>
  <?php endif; ?>
  <div> <?php echo $this->loadTemplate('items'); ?> </div>
</div>
