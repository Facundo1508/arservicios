<div class="row">
    <div class="col-md-12">
    	<div class="page-header">
    		<h2>Usuarios</h2>
    	</div>
    	<div class="table-responsive">
    	<table class="table table-striped table-hover">
    		<thead>
    		<tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre', ['Nombre']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido', ['Apellido']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono', ['Telefono']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', ['Correo Electronico']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_usuario', ['Nombre de Usuario']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('contraseña', ['Contraseña']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo', ['Activo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('rol_id', ['Rol']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('genero_id', ['Genero']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
    		</thead>
    		<tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= h($usuario->id) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td><?= h($usuario->apellido) ?></td>
                <td><?= $this->Number->format($usuario->telefono) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><?= h($usuario->nombre_usuario) ?></td>
                <td><?= h($usuario->contraseña) ?></td>
                <td><?= h($usuario->activo) ?></td>
                <td><?= $usuario->has('rol') ? $this->Html->link($usuario->rol->id, ['controller' => 'Rols', 'action' => 'view', $usuario->rol->id]) : '' ?></td>
                <td><?= $usuario->has('genero') ? $this->Html->link($usuario->genero->id, ['controller' => 'Generos', 'action' => 'view', $usuario->genero->id]) : '' ?></td>
                <td><?= h($usuario->created) ?></td>
                <td><?= h($usuario->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id), 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
                </tbody>
    </table>
    <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< Anterior') ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next('Siguiente >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
