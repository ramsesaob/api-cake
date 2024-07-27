<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenPedido $ordenPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orden Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orden Items'), ['controller' => 'OrdenItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden Item'), ['controller' => 'OrdenItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordenPedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($ordenPedido) ?>
    <fieldset>
        <legend><?= __('Add Orden Pedido') ?></legend>
        <?php
            echo $this->Form->control('numero_ped');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('enviada');
            echo $this->Form->control('Status_aprobada');
            echo $this->Form->control('aprobada');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
