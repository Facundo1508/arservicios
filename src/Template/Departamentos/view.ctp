<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Departamento $departamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Departamento'), ['action' => 'edit', $departamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Departamento'), ['action' => 'delete', $departamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Departamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Direccions'), ['controller' => 'Direccions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Direccion'), ['controller' => 'Direccions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departamentos view large-9 medium-8 columns content">
    <h3><?= h($departamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($departamento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($departamento->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($departamento->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($departamento->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Direccions') ?></h4>
        <?php if (!empty($departamento->direccions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Provincia Id') ?></th>
                <th scope="col"><?= __('Departamento Id') ?></th>
                <th scope="col"><?= __('Distrito Id') ?></th>
                <th scope="col"><?= __('Calle Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Barrio') ?></th>
                <th scope="col"><?= __('Manzana') ?></th>
                <th scope="col"><?= __('Casa') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($departamento->direccions as $direccions): ?>
            <tr>
                <td><?= h($direccions->id) ?></td>
                <td><?= h($direccions->provincia_id) ?></td>
                <td><?= h($direccions->departamento_id) ?></td>
                <td><?= h($direccions->distrito_id) ?></td>
                <td><?= h($direccions->calle_id) ?></td>
                <td><?= h($direccions->numero) ?></td>
                <td><?= h($direccions->barrio) ?></td>
                <td><?= h($direccions->manzana) ?></td>
                <td><?= h($direccions->casa) ?></td>
                <td><?= h($direccions->created) ?></td>
                <td><?= h($direccions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Direccions', 'action' => 'view', $direccions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Direccions', 'action' => 'edit', $direccions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Direccions', 'action' => 'delete', $direccions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $direccions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
