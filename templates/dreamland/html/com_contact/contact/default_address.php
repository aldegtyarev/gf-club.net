<?php
/** $Id: default_address.php 10381 2008-06-01 03:35:53Z pasamio $ */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<div class="contact-form">
  <?php if ( ( $this->contact->params->get( 'address_check' ) > 0 ) && ( $this->contact->address || $this->contact->suburb || $this->contact->state || $this->contact->country || $this->contact->postcode ) ) : ?>
    <?php if ( $this->contact->params->get( 'address_check' ) > 0 ) : ?>
    <?php endif; ?>
    <?php if ( $this->contact->address && $this->contact->params->get( 'show_street_address' ) ) : ?>
    <p class="contact_address_marker"> <?php echo nl2br($this->contact->address); ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->suburb && $this->contact->params->get( 'show_suburb' ) ) : ?>
    <p class="contact_suburb_marker"> <?php echo $this->contact->suburb; ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->state && $this->contact->params->get( 'show_state' ) ) : ?>
    <p class="contact_state_marker"> <?php echo $this->contact->state; ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->postcode && $this->contact->params->get( 'show_postcode' ) ) : ?>
    <p class="contact_postcode_marker"> <?php echo $this->contact->postcode; ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->country && $this->contact->params->get( 'show_country' ) ) : ?>
    <p class="contact_country_marker"> <?php echo $this->contact->country; ?> </p>
    <?php endif; ?>
  <?php endif; ?>
  <?php if ( ($this->contact->email_to && $this->contact->params->get( 'show_email' )) || $this->contact->telephone || $this->contact->fax || $this->contact->mobile || $this->contact->webpage ) : ?>
    <?php if ( $this->contact->email_to && $this->contact->params->get( 'show_email' ) ) : ?>
    <p class="contact_email_marker"> <?php echo $this->contact->email_to; ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->telephone && $this->contact->params->get( 'show_telephone' ) ) : ?>
    <p class="contact_telephone_marker"> <?php echo nl2br($this->contact->telephone); ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->fax && $this->contact->params->get( 'show_fax' ) ) : ?>
    <p class="contact_fax_marker"> <?php echo nl2br($this->contact->fax); ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->mobile && $this->contact->params->get( 'show_mobile' ) ) :?>
    <p class="contact_mobile_marker"> <?php echo nl2br($this->contact->mobile); ?> </p>
    <?php endif; ?>
    <?php if ( $this->contact->webpage && $this->contact->params->get( 'show_webpage' )) : ?>
    <p class="contact_webpage_marker"> <a href="<?php echo $this->contact->webpage; ?>" target="_blank"> <?php echo $this->contact->webpage; ?></a> </p>
    <?php endif; ?>
  <?php endif; ?>
  <?php if ( $this->contact->misc && $this->contact->params->get( 'show_misc' ) ) : ?>
    <p class="contact_misc_marker"> <?php echo $this->contact->misc; ?> </p>
  <?php endif; ?>
</div>

