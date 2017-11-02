<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuarioservicio $usuarioservicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuarioservicio->usuario_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuarioservicio->usuario_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usuarioservicios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuarioservicios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuarioservicio) ?>
    <fieldset>
        <legend><?= __('Edit Usuarioservicio') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
