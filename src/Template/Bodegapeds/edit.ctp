<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodegaped $bodegaped
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bodegaped->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bodegaped->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bodegapeds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List A R T I C U L O S'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New A R T I C U L O'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orden Items'), ['controller' => 'OrdenItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden Item'), ['controller' => 'OrdenItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bodegapeds form large-9 medium-8 columns content">
    <?= $this->Form->create($bodegaped) ?>
    <fieldset>
        <legend><?= __('Edit Bodegaped') ?></legend>
        <?php
            echo $this->Form->control('CODIGO');
            echo $this->Form->control('BODEGA');
            echo $this->Form->control('EXISTENCIA');
            echo $this->Form->control('articulo_id', ['options' => $aRTICULOS]);
            echo $this->Form->control('DESCRIPCION');
            echo $this->Form->control('VENTA');
            echo $this->Form->control('ESTATUS');
            echo $this->Form->control('SELECCIONADO');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('descmax');
            echo $this->Form->control('cantped');
            echo $this->Form->control('empaque');
            echo $this->Form->control('cif');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
