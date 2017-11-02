<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio $servicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicio'), ['action' => 'edit', $servicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicio'), ['action' => 'delete', $servicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarioservicios'), ['controller' => 'Usuarioservicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuarioservicio'), ['controller' => 'Usuarioservicios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicios view large-9 medium-8 columns content">
    <h3><?= h($servicio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($servicio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($servicio->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $servicio->has('categoria') ? $this->Html->link($servicio->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $servicio->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($servicio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($servicio->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Usuarioservicios') ?></h4>
        <?php if (!empty($servicio->usuarioservicios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Servicio Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servicio->usuarioservicios as $usuarioservicios): ?>
            <tr>
                <td><?= h($usuarioservicios->usuario_id) ?></td>
                <td><?= h($usuarioservicios->servicio_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarioservicios', 'action' => 'view', $usuarioservicios->usuario_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarioservicios', 'action' => 'edit', $usuarioservicios->usuario_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarioservicios', 'action' => 'delete', $usuarioservicios->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarioservicios->usuario_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
