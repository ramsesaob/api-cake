<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codigo $codigo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Codigo'), ['action' => 'edit', $codigo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Codigo'), ['action' => 'delete', $codigo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codigo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Codigos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Codigo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="codigos view large-9 medium-8 columns content">
    <h3><?= h($codigo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('DESCRIPCION') ?></th>
            <td><?= h($codigo->DESCRIPCION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TIPO') ?></th>
            <td><?= h($codigo->TIPO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UBICACION') ?></th>
            <td><?= h($codigo->UBICACION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($codigo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CODIGO') ?></th>
            <td><?= $this->Number->format($codigo->CODIGO) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ordens') ?></h4>
        <?php if (!empty($codigo->ordens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Codigo Id') ?></th>
                <th scope="col"><?= __('Transporte') ?></th>
                <th scope="col"><?= __('Pago') ?></th>
                <th scope="col"><?= __('Comentario') ?></th>
                <th scope="col"><?= __('Numpedido') ?></th>
                <th scope="col"><?= __('Iva') ?></th>
                <th scope="col"><?= __('Subtotal') ?></th>
                <th scope="col"><?= __('Tipo Doc') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Tipo Log') ?></th>
                <th scope="col"><?= __('Fecha Log') ?></th>
                <th scope="col"><?= __('ESTATUS') ?></th>
                <th scope="col"><?= __('Fecha Modif') ?></th>
                <th scope="col"><?= __('Despacho') ?></th>
                <th scope="col"><?= __('Fecha Despacho') ?></th>
                <th scope="col"><?= __('Documento Conv') ?></th>
                <th scope="col"><?= __('Fecha Doc Conv') ?></th>
                <th scope="col"><?= __('Sucursale Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($codigo->ordens as $ordens): ?>
            <tr>
                <td><?= h($ordens->id) ?></td>
                <td><?= h($ordens->total) ?></td>
                <td><?= h($ordens->created) ?></td>
                <td><?= h($ordens->modified) ?></td>
                <td><?= h($ordens->cliente_id) ?></td>
                <td><?= h($ordens->user_id) ?></td>
                <td><?= h($ordens->codigo_id) ?></td>
                <td><?= h($ordens->transporte) ?></td>
                <td><?= h($ordens->pago) ?></td>
                <td><?= h($ordens->comentario) ?></td>
                <td><?= h($ordens->numpedido) ?></td>
                <td><?= h($ordens->iva) ?></td>
                <td><?= h($ordens->subtotal) ?></td>
                <td><?= h($ordens->tipo_doc) ?></td>
                <td><?= h($ordens->numero) ?></td>
                <td><?= h($ordens->fecha) ?></td>
                <td><?= h($ordens->tipo_log) ?></td>
                <td><?= h($ordens->fecha_log) ?></td>
                <td><?= h($ordens->ESTATUS) ?></td>
                <td><?= h($ordens->fecha_modif) ?></td>
                <td><?= h($ordens->despacho) ?></td>
                <td><?= h($ordens->fecha_despacho) ?></td>
                <td><?= h($ordens->documento_conv) ?></td>
                <td><?= h($ordens->fecha_doc_conv) ?></td>
                <td><?= h($ordens->sucursale_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ordens', 'action' => 'view', $ordens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ordens', 'action' => 'edit', $ordens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ordens', 'action' => 'delete', $ordens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
