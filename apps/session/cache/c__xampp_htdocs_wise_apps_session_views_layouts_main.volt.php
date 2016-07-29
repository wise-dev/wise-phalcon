
<?php if ($this->dispatcher->getControllerName() != 'connexion' && $this->dispatcher->getControllerName() != 'errors') { ?>
<?= $this->flash->output() ?>
<?= $this->partial('layouts/menu') ?>
<?php } else { ?>
<?= $this->flash->output() ?>
<?= $this->getContent() ?>
<?php } ?>
