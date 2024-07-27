<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenPedido $ordenPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orden Pedido'), ['action' => 'edit', $ordenPedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orden Pedido'), ['action' => 'delete', $ordenPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenPedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orden Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orden Items'), ['controller' => 'OrdenItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Item'), ['controller' => 'OrdenItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordenPedidos view large-9 medium-8 columns content">
    <h3><?= h($ordenPedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $ordenPedido->has('user') ? $this->Html->link($ordenPedido->user->id, ['controller' => 'Users', 'action' => 'view', $ordenPedido->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($ordenPedido->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enviada') ?></th>
            <td><?= h($ordenPedido->enviada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Aprobada') ?></th>
            <td><?= h($ordenPedido->Status_aprobada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aprobada') ?></th>
            <td><?= h($ordenPedido->aprobada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ordenPedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Ped') ?></th>
            <td><?= $this->Number->format($ordenPedido->numero_ped) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ordenPedido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ordenPedido->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orden Items') ?></h4>
        <?php if (!empty($ordenPedido->orden_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Articulo Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Orden Pedido Id') ?></th>
                <th scope="col"><?= __('Comentario') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ordenPedido->orden_items as $ordenItems): ?>
            <tr>
                <td><?= h($ordenItems->id) ?></td>
                <td><?= h($ordenItems->articulo_id) ?></td>
                <td><?= h($ordenItems->created) ?></td>
                <td><?= h($ordenItems->modified) ?></td>
                <td><?= h($ordenItems->orden_pedido_id) ?></td>
                <td><?= h($ordenItems->comentario) ?></td>
                <td><?= h($ordenItems->cantidad) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrdenItems', 'action' => 'view', $ordenItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrdenItems', 'action' => 'edit', $ordenItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrdenItems', 'action' => 'delete', $ordenItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
