
<?php if ($this->dispatcher->getControllerName() != 'connexion' && $this->dispatcher->getControllerName() != 'errors') { ?>
<?php echo $this->flash->output(); ?>
<?php echo $this->partial('layouts/menu'); ?>
<?php } else { ?>
<?php echo $this->flash->output(); ?>
<?php echo $this->getContent(); ?>
<?php } ?>
