<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codigo[]|\Cake\Collection\CollectionInterface $codigos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Codigo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="codigos index large-9 medium-8 columns content">
    <h3><?= __('Codigos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CODIGO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DESCRIPCION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TIPO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UBICACION') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($codigos as $codigo): ?>
            <tr>
                <td><?= $this->Number->format($codigo->id) ?></td>
                <td><?= $this->Number->format($codigo->CODIGO) ?></td>
                <td><?= h($codigo->DESCRIPCION) ?></td>
                <td><?= h($codigo->TIPO) ?></td>
                <td><?= h($codigo->UBICACION) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $codigo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $codigo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $codigo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codigo->id)]) ?>
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
