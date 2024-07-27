<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenItem $ordenItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orden Item'), ['action' => 'edit', $ordenItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orden Item'), ['action' => 'delete', $ordenItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orden Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orden Pedidos'), ['controller' => 'OrdenPedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Pedido'), ['controller' => 'OrdenPedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordenItems view large-9 medium-8 columns content">
    <h3><?= h($ordenItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Articulo') ?></th>
            <td><?= $ordenItem->has('articulo') ? $this->Html->link($ordenItem->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $ordenItem->articulo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orden Pedido') ?></th>
            <td><?= $ordenItem->has('orden_pedido') ? $this->Html->link($ordenItem->orden_pedido->id, ['controller' => 'OrdenPedidos', 'action' => 'view', $ordenItem->orden_pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comentario') ?></th>
            <td><?= h($ordenItem->comentario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ordenItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($ordenItem->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ordenItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ordenItem->modified) ?></td>
        </tr>
    </table>
</div>
