<div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<div class="page-header">
    		<h2>Crear usuario</h2>
    	</div>
         <?= $this->Form->create($usuario) ?>
    <fieldset>
        
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('telefono');
            echo $this->Form->control('email');
            echo $this->Form->control('nombre_usuario');
            echo $this->Form->control('contraseña');
            echo $this->Form->control('activo');
            echo $this->Form->control('rol_id', ['options' => $rols]);
            echo $this->Form->control('genero_id', ['options' => $generos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>