<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Direccion[]|\Cake\Collection\CollectionInterface $direccions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Direccion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departamentos'), ['controller' => 'Departamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Departamento'), ['controller' => 'Departamentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distritos'), ['controller' => 'Distritos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distrito'), ['controller' => 'Distritos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calles'), ['controller' => 'Calles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calle'), ['controller' => 'Calles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="direccions index large-9 medium-8 columns content">
    <h3><?= __('Direccions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('provincia_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departamento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('distrito_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calle_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('barrio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manzana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('casa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($direccions as $direccion): ?>
            <tr>
                <td><?= h($direccion->id) ?></td>
                <td><?= $direccion->has('provincia') ? $this->Html->link($direccion->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $direccion->provincia->id]) : '' ?></td>
                <td><?= $direccion->has('departamento') ? $this->Html->link($direccion->departamento->id, ['controller' => 'Departamentos', 'action' => 'view', $direccion->departamento->id]) : '' ?></td>
                <td><?= $direccion->has('distrito') ? $this->Html->link($direccion->distrito->id, ['controller' => 'Distritos', 'action' => 'view', $direccion->distrito->id]) : '' ?></td>
                <td><?= $direccion->has('calle') ? $this->Html->link($direccion->calle->, ['controller' => 'Calles', 'action' => 'view', $direccion->calle->]) : '' ?></td>
                <td><?= $this->Number->format($direccion->numero) ?></td>
                <td><?= h($direccion->barrio) ?></td>
                <td><?= h($direccion->manzana) ?></td>
                <td><?= h($direccion->casa) ?></td>
                <td><?= h($direccion->created) ?></td>
                <td><?= h($direccion->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $direccion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $direccion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $direccion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $direccion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
