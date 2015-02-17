<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<br />
<table class="pollstableborder" cellspacing="0" cellpadding="0" border="0" width="100%">
  <thead>
    <tr>
      <th colspan="3" class="sectiontableheader" align="left"><h4> <?php echo $this->poll->title; ?> </h4></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($this->votes as $vote) : ?>
    <tr class="sectiontableentry<?php echo $vote->odd; ?>">
      <td width="100%" colspan="3" class="poll_entry_title"><?php echo $vote->text; ?> </td>
    </tr>
    <tr class="sectiontableentry<?php echo $vote->odd; ?>">
      <td width="25" class="poll_entry_number"><strong><?php echo $vote->hits; ?></strong>&nbsp; </td>
      <td width="30" class="poll_entry_percent"><?php echo $vote->percent; ?>% </td>
      <td width="300" class="poll_entry_bar"><div class="<?php echo $vote->class; ?>" style="height:20px;width:<?php echo $vote->percent; ?>%"></div></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="poll_stats">
<div class="smalldark"><?php echo JText::_( 'Number of Voters' ); ?><?php if(isset($this->votes[0])) echo $this->votes[0]->voters; ?></div>
<div class="smalldark"><?php echo JText::_( 'First Vote' ); ?> &nbsp;:&nbsp; <?php echo $this->first_vote; ?> </div>
<div class="smalldark"><?php echo JText::_( 'Last Vote' ); ?> &nbsp;:&nbsp; <?php echo $this->last_vote; ?> </div>
<div class="clr"></div>
</div>

