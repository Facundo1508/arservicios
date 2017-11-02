<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Direccion $direccion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Direccion'), ['action' => 'edit', $direccion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Direccion'), ['action' => 'delete', $direccion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $direccion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Direccions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Direccion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departamentos'), ['controller' => 'Departamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Departamento'), ['controller' => 'Departamentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distritos'), ['controller' => 'Distritos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distrito'), ['controller' => 'Distritos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calles'), ['controller' => 'Calles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calle'), ['controller' => 'Calles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="direccions view large-9 medium-8 columns content">
    <h3><?= h($direccion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($direccion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td><?= $direccion->has('provincia') ? $this->Html->link($direccion->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $direccion->provincia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Departamento') ?></th>
            <td><?= $direccion->has('departamento') ? $this->Html->link($direccion->departamento->id, ['controller' => 'Departamentos', 'action' => 'view', $direccion->departamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distrito') ?></th>
            <td><?= $direccion->has('distrito') ? $this->Html->link($direccion->distrito->id, ['controller' => 'Distritos', 'action' => 'view', $direccion->distrito->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calle') ?></th>
            <td><?= $direccion->has('calle') ? $this->Html->link($direccion->calle->, ['controller' => 'Calles', 'action' => 'view', $direccion->calle->]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barrio') ?></th>
            <td><?= h($direccion->barrio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manzana') ?></th>
            <td><?= h($direccion->manzana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Casa') ?></th>
            <td><?= h($direccion->casa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= $this->Number->format($direccion->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($direccion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($direccion->modified) ?></td>
        </tr>
    </table>
</div>
