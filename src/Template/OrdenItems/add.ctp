<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenItem $ordenItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orden Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orden Pedidos'), ['controller' => 'OrdenPedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden Pedido'), ['controller' => 'OrdenPedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordenItems form large-9 medium-8 columns content">
    <?= $this->Form->create($ordenItem) ?>
    <fieldset>
        <legend><?= __('Add Orden Item') ?></legend>
        <?php
            echo $this->Form->control('articulo_id', ['options' => $articulos, 'empty' => true]);
            echo $this->Form->control('orden_pedido_id', ['options' => $ordenPedidos, 'empty' => true]);
            echo $this->Form->control('comentario');
            echo $this->Form->control('cantidad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
