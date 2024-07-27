<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenPedido[]|\Cake\Collection\CollectionInterface $ordenPedidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orden Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orden Items'), ['controller' => 'OrdenItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden Item'), ['controller' => 'OrdenItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordenPedidos index large-9 medium-8 columns content">
    <h3><?= __('Orden Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_ped') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enviada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status_aprobada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aprobada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenPedidos as $ordenPedido): ?>
            <tr>
                <td><?= $this->Number->format($ordenPedido->id) ?></td>
                <td><?= $this->Number->format($ordenPedido->numero_ped) ?></td>
                <td><?= $ordenPedido->has('user') ? $this->Html->link($ordenPedido->user->id, ['controller' => 'Users', 'action' => 'view', $ordenPedido->user->id]) : '' ?></td>
                <td><?= h($ordenPedido->descripcion) ?></td>
                <td><?= h($ordenPedido->enviada) ?></td>
                <td><?= h($ordenPedido->Status_aprobada) ?></td>
                <td><?= h($ordenPedido->aprobada) ?></td>
                <td><?= h($ordenPedido->created) ?></td>
                <td><?= h($ordenPedido->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordenPedido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordenPedido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordenPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenPedido->id)]) ?>
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
