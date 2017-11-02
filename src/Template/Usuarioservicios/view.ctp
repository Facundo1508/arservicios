<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuarioservicio $usuarioservicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuarioservicio'), ['action' => 'edit', $usuarioservicio->usuario_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuarioservicio'), ['action' => 'delete', $usuarioservicio->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarioservicio->usuario_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarioservicios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuarioservicio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarioservicios view large-9 medium-8 columns content">
    <h3><?= h($usuarioservicio->usuario_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $usuarioservicio->has('usuario') ? $this->Html->link($usuarioservicio->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $usuarioservicio->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicio') ?></th>
            <td><?= $usuarioservicio->has('servicio') ? $this->Html->link($usuarioservicio->servicio->id, ['controller' => 'Servicios', 'action' => 'view', $usuarioservicio->servicio->id]) : '' ?></td>
        </tr>
    </table>
</div>
