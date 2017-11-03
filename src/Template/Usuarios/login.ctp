<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingrese su nombre de usuario y contraseña') ?></legend>
        <?= $this->Form->control('nombre_usuario') ?>
        <?= $this->Form->control('contraseña') ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-success']); ?>
    <?= $this->Html->link(
    	__('Registrarse'), 
    	['controller' => 'Usuarios', 'action' => 'registro'], 
    	['class' => 'btn btn-default']
    	) ?>
    <?= $this->Form->end() ?>
</div>
