<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenItem[]|\Cake\Collection\CollectionInterface $ordenItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orden Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orden Pedidos'), ['controller' => 'OrdenPedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden Pedido'), ['controller' => 'OrdenPedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordenItems index large-9 medium-8 columns content">
    <h3><?= __('Orden Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('articulo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orden_pedido_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comentario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenItems as $ordenItem): ?>
            <tr>
                <td><?= $this->Number->format($ordenItem->id) ?></td>
                <td><?= $ordenItem->has('articulo') ? $this->Html->link($ordenItem->articulo->id, ['controller' => 'Articulos', 'action' => 'view', $ordenItem->articulo->id]) : '' ?></td>
                <td><?= h($ordenItem->created) ?></td>
                <td><?= h($ordenItem->modified) ?></td>
                <td><?= $ordenItem->has('orden_pedido') ? $this->Html->link($ordenItem->orden_pedido->id, ['controller' => 'OrdenPedidos', 'action' => 'view', $ordenItem->orden_pedido->id]) : '' ?></td>
                <td><?= h($ordenItem->comentario) ?></td>
                <td><?= $this->Number->format($ordenItem->cantidad) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordenItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordenItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordenItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenItem->id)]) ?>
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
