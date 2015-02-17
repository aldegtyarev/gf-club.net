<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="contentpaneopen<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php
foreach( $this->results as $result ) : ?>
      <div class="search_result_row">
      <div> <span class="small<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $this->pagination->limitstart + $result->count.'. ';?> </span>
        <?php if ( $result->href ) :
if ($result->browsernav == 1 ) : ?>
        <a href="<?php echo JRoute::_($result->href); ?>" target="_blank">
        <?php else : ?>
        <a href="<?php echo JRoute::_($result->href); ?>">
        <?php endif;

echo $this->escape($result->title);

if ( $result->href ) : ?>
        </a>
        <?php endif;
if ( $result->section ) : ?>
        <br />
        <span class="small<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> (<?php echo $this->escape($result->section); ?>) </span>
        <?php endif; ?>
        <?php endif; ?>
      </div>
      <div> <?php echo $result->text; ?> </div>
      <?php
if ( $this->params->get( 'show_date' )) : ?>
      <div class="small<?php echo $this->params->get( 'pageclass_sfx' ); ?>"> <?php echo $result->created; ?> </div>
      <?php endif; ?>
      </div>
      <?php endforeach; ?>

<div align="center"> <?php echo $this->pagination->getPagesLinks( ); ?> </div>
</div>

