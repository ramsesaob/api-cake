<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo[]|\Cake\Collection\CollectionInterface $articulos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articulos index large-9 medium-8 columns content">
    <h3><?= __('Articulos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulos as $articulo): ?>
            <tr>
                <td><?= $this->Number->format($articulo->id) ?></td>
                <td><?= h($articulo->departamento) ?></td>
                <td><?= h($articulo->categoria) ?></td>
                <td><?= h($articulo->codigo) ?></td>
                <td><?= h($articulo->descripcion) ?></td>
                <td><?= h($articulo->cantidad) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articulo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articulo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]) ?>
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
