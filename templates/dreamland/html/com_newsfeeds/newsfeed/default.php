<?php // no direct acces
defined('_JEXEC') or die('Restricted access'); ?>

<div style="direction: <?php echo $this->newsfeed->rtl ? 'rtl' :'ltr'; ?>; text-align: <?php echo $this->newsfeed->rtl ? 'right' :'left'; ?>">
  <?php if ($this->params->get('show_page_title', 1)) : ?>
  <h1 class="componentheading<?php echo $this->params->get('pageclass_sfx')?>"><?php echo $this->escape($this->params->get('page_title')); ?></h1>
  <div class="clr"></div>
  <?php endif; ?>
  <div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
    <h2 class="contentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>"><a href="<?php echo $this->newsfeed->channel['link']; ?>" target="_blank"> <?php echo str_replace('&apos;', "'", $this->newsfeed->channel['title']); ?></a> </h2>
    <div class="clr"></div>
    <?php if ( $this->params->get( 'show_feed_description' ) ) : ?>
    <div> <?php echo str_replace('&apos;', "'", $this->newsfeed->channel['description']); ?> </div>
    <?php endif; ?>
    <?php if ( isset($this->newsfeed->image['url']) && isset($this->newsfeed->image['title']) && $this->params->get( 'show_feed_image' ) ) : ?>
    <div> <img src="<?php echo $this->newsfeed->image['url']; ?>" alt="<?php echo $this->newsfeed->image['title']; ?>" /> </div>
    <?php endif; ?>
    <div class="section_list">
      <ul class="section_unordered_list">
        <?php foreach ( $this->newsfeed->items as $item ) :  ?>
        <li class="section_list_item">
          <?php if ( !is_null( $item->get_link() ) ) : ?>
          <a href="<?php echo $item->get_link(); ?>" target="_blank"> <?php echo $item->get_title(); ?></a>
          <?php endif; ?>
          <?php if ( $this->params->get( 'show_item_description' ) && $item->get_description()) : ?>
          <br />
          <?php $text = $this->limitText($item->get_description(), $this->params->get( 'feed_word_count' ));
					echo str_replace('&apos;', "'", $text);
				?>
          <br />
          <br />
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="clr"></div>
    </div>
  </div>
</div>
