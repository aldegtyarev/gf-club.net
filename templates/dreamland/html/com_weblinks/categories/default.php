<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>

<h1 class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->escape($this->params->get('page_title')); ?> </h1>
<div class="clr"></div>
<?php endif; ?>
<?php if ( ($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1) ) : ?>
<div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
    <h4 valign="top" class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>"><?php
if ( isset($this->image) ) : echo $this->image; endif;
echo $this->params->get('comp_description');
?>
    </h4>
    <div class="clr"></div>
<?php endif; ?>
</div>
<div class="weblink_list">
<ul class="weblink_unordered_list">
  <?php foreach ( $this->categories as $category ) : ?>
  <li class="weblink_list_item"> <a href="<?php echo $category->link; ?>" class="category<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->escape($category->title);?></a> &nbsp; <span class="small"> (<?php echo $category->numlinks;?>) </span> </li>
  <?php endforeach; ?>
</ul>
<div class="clr"></div>
</div>

