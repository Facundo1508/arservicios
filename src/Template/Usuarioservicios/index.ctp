<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuarioservicio[]|\Cake\Collection\CollectionInterface $usuarioservicios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Usuarioservicio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuarioservicios index large-9 medium-8 columns content">
    <h3><?= __('Usuarioservicios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('servicio_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarioservicios as $usuarioservicio): ?>
            <tr>
                <td><?= $usuarioservicio->has('usuario') ? $this->Html->link($usuarioservicio->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $usuarioservicio->usuario->id]) : '' ?></td>
                <td><?= $usuarioservicio->has('servicio') ? $this->Html->link($usuarioservicio->servicio->id, ['controller' => 'Servicios', 'action' => 'view', $usuarioservicio->servicio->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usuarioservicio->usuario_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuarioservicio->usuario_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuarioservicio->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarioservicio->usuario_id)]) ?>
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
