<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Distrito $distrito
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $distrito->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $distrito->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Distritos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Direccions'), ['controller' => 'Direccions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Direccion'), ['controller' => 'Direccions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="distritos form large-9 medium-8 columns content">
    <?= $this->Form->create($distrito) ?>
    <fieldset>
        <legend><?= __('Edit Distrito') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
