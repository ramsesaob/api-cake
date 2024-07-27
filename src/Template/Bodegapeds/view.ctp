<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bodegaped $bodegaped
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bodegaped'), ['action' => 'edit', $bodegaped->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bodegaped'), ['action' => 'delete', $bodegaped->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bodegaped->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bodegapeds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bodegaped'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List A R T I C U L O S'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New A R T I C U L O '), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orden Items'), ['controller' => 'OrdenItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Item'), ['controller' => 'OrdenItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bodegapeds view large-9 medium-8 columns content">
    <h3><?= h($bodegaped->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CODIGO') ?></th>
            <td><?= h($bodegaped->CODIGO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('A R T I C U L O') ?></th>
            <td><?= $bodegaped->has('a_r_t_i_c_u_l_o') ? $this->Html->link($bodegaped->a_r_t_i_c_u_l_o->id, ['controller' => 'Articulos', 'action' => 'view', $bodegaped->a_r_t_i_c_u_l_o->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DESCRIPCION') ?></th>
            <td><?= h($bodegaped->DESCRIPCION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ESTATUS') ?></th>
            <td><?= h($bodegaped->ESTATUS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SELECCIONADO') ?></th>
            <td><?= h($bodegaped->SELECCIONADO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bodegaped->has('user') ? $this->Html->link($bodegaped->user->id, ['controller' => 'Users', 'action' => 'view', $bodegaped->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bodegaped->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BODEGA') ?></th>
            <td><?= $this->Number->format($bodegaped->BODEGA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EXISTENCIA') ?></th>
            <td><?= $this->Number->format($bodegaped->EXISTENCIA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VENTA') ?></th>
            <td><?= $this->Number->format($bodegaped->VENTA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descmax') ?></th>
            <td><?= $this->Number->format($bodegaped->descmax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantped') ?></th>
            <td><?= $this->Number->format($bodegaped->cantped) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empaque') ?></th>
            <td><?= $this->Number->format($bodegaped->empaque) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cif') ?></th>
            <td><?= $this->Number->format($bodegaped->cif) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orden Items') ?></h4>
        <?php if (!empty($bodegaped->orden_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Subtotal') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Orden Id') ?></th>
                <th scope="col"><?= __('Bodegaped Id') ?></th>
                <th scope="col"><?= __('Articulo Id') ?></th>
                <th scope="col"><?= __('Dmax') ?></th>
                <th scope="col"><?= __('Porcentaje') ?></th>
                <th scope="col"><?= __('Userped') ?></th>
                <th scope="col"><?= __('Preciodesc') ?></th>
                <th scope="col"><?= __('Numeroped') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bodegaped->orden_items as $ordenItems): ?>
            <tr>
                <td><?= h($ordenItems->id) ?></td>
                <td><?= h($ordenItems->cantidad) ?></td>
                <td><?= h($ordenItems->subtotal) ?></td>
                <td><?= h($ordenItems->created) ?></td>
                <td><?= h($ordenItems->modified) ?></td>
                <td><?= h($ordenItems->orden_id) ?></td>
                <td><?= h($ordenItems->bodegaped_id) ?></td>
                <td><?= h($ordenItems->articulo_id) ?></td>
                <td><?= h($ordenItems->dmax) ?></td>
                <td><?= h($ordenItems->porcentaje) ?></td>
                <td><?= h($ordenItems->userped) ?></td>
                <td><?= h($ordenItems->preciodesc) ?></td>
                <td><?= h($ordenItems->numeroped) ?></td>
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
