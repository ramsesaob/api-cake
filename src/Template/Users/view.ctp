<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recibopeds'), ['controller' => 'Recibopeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reciboped'), ['controller' => 'Recibopeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bodega Respaldo'), ['controller' => 'BodegaRespaldo', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bodega Respaldo'), ['controller' => 'BodegaRespaldo', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Confirm') ?></th>
            <td><?= h($user->password_confirm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendedor') ?></th>
            <td><?= h($user->vendedor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefonovend') ?></th>
            <td><?= h($user->telefonovend) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefonoana') ?></th>
            <td><?= h($user->telefonoana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userbod') ?></th>
            <td><?= h($user->userbod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Recibopeds') ?></h4>
        <?php if (!empty($user->recibopeds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Foto') ?></th>
                <th scope="col"><?= __('Foto Dir') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Comentario') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
           
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bodega Respaldo') ?></h4>
        <?php if (!empty($user->bodega_respaldo)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('CODIGO') ?></th>
                <th scope="col"><?= __('BODEGA') ?></th>
                <th scope="col"><?= __('EXISTENCIA') ?></th>
                <th scope="col"><?= __('Articulo Id') ?></th>
                <th scope="col"><?= __('DESCRIPCION') ?></th>
                <th scope="col"><?= __('VENTA') ?></th>
                <th scope="col"><?= __('ESTATUS') ?></th>
                <th scope="col"><?= __('SELECCIONADO') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Descmax') ?></th>
                <th scope="col"><?= __('Cantped') ?></th>
                <th scope="col"><?= __('Empaque') ?></th>
                <th scope="col"><?= __('Cif') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->bodega_respaldo as $bodegaRespaldo): ?>
            <tr>
                <td><?= h($bodegaRespaldo->id) ?></td>
                <td><?= h($bodegaRespaldo->CODIGO) ?></td>
                <td><?= h($bodegaRespaldo->BODEGA) ?></td>
                <td><?= h($bodegaRespaldo->EXISTENCIA) ?></td>
                <td><?= h($bodegaRespaldo->articulo_id) ?></td>
                <td><?= h($bodegaRespaldo->DESCRIPCION) ?></td>
                <td><?= h($bodegaRespaldo->VENTA) ?></td>
                <td><?= h($bodegaRespaldo->ESTATUS) ?></td>
                <td><?= h($bodegaRespaldo->SELECCIONADO) ?></td>
                <td><?= h($bodegaRespaldo->user_id) ?></td>
                <td><?= h($bodegaRespaldo->descmax) ?></td>
                <td><?= h($bodegaRespaldo->cantped) ?></td>
                <td><?= h($bodegaRespaldo->empaque) ?></td>
                <td><?= h($bodegaRespaldo->cif) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ordens') ?></h4>
        <?php if (!empty($user->ordens)): ?>
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
            <?php foreach ($user->ordens as $ordens): ?>
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
