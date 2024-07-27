<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodegaped[]|\Cake\Collection\CollectionInterface $bodegapeds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bodegaped'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List A R T I C U L O S'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New A R T I C U L O'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orden Items'), ['controller' => 'OrdenItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden Item'), ['controller' => 'OrdenItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bodegapeds index large-9 medium-8 columns content">
    <h3><?= __('Bodegapeds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CODIGO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BODEGA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EXISTENCIA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('articulo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DESCRIPCION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('VENTA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ESTATUS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SELECCIONADO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descmax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantped') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empaque') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bodegapeds as $bodegaped): ?>
            <tr>
                <td><?= $this->Number->format($bodegaped->id) ?></td>
                <td><?= h($bodegaped->CODIGO) ?></td>
                <td><?= $this->Number->format($bodegaped->BODEGA) ?></td>
                <td><?= $this->Number->format($bodegaped->EXISTENCIA) ?></td>
                <td><?= $bodegaped->has('a_r_t_i_c_u_l_o') ? $this->Html->link($bodegaped->a_r_t_i_c_u_l_o->id, ['controller' => 'Articulos', 'action' => 'view', $bodegaped->a_r_t_i_c_u_l_o->id]) : '' ?></td>
                <td><?= h($bodegaped->DESCRIPCION) ?></td>
                <td><?= $this->Number->format($bodegaped->VENTA) ?></td>
                <td><?= h($bodegaped->ESTATUS) ?></td>
                <td><?= h($bodegaped->SELECCIONADO) ?></td>
                <td><?= $bodegaped->has('user') ? $this->Html->link($bodegaped->user->id, ['controller' => 'Users', 'action' => 'view', $bodegaped->user->id]) : '' ?></td>
                <td><?= $this->Number->format($bodegaped->descmax) ?></td>
                <td><?= $this->Number->format($bodegaped->cantped) ?></td>
                <td><?= $this->Number->format($bodegaped->empaque) ?></td>
                <td><?= $this->Number->format($bodegaped->cif) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bodegaped->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bodegaped->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bodegaped->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bodegaped->id)]) ?>
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
