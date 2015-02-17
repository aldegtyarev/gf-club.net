<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>

<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </h1>
<div class="clr"></div>
<?php endif; ?>
<?php if ( ($this->params->get('image') != -1) || $this->params->get('show_comp_description') ) : ?>
<div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
  <h4 valign="top" class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
    <?php
		if ( isset($this->image) ) :  echo $this->image; endif;
		echo $this->params->get('comp_description');
	?>
  </h4>
  <div class="clr"></div>
</div>
<?php endif; ?>
<div class="section_list">
  <ul class="section_unordered_list">
    <?php foreach ( $this->categories as $category ) : ?>
    <li class="section_list_item"> <a href="<?php echo $category->link ?>" class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $category->title;?></a>
      <?php if ( $this->params->get( 'show_cat_items' ) ) : ?>
      &nbsp; <span class="small"> (<?php echo $category->numlinks;?>) </span>
      <?php endif; ?>
      <?php if ( $this->params->get( 'show_cat_description' ) && $category->description ) : ?>
      <br />
      <?php echo $category->description; ?>
      <?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
  <div class="clr"></div>
</div>
