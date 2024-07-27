<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recibopeds'), ['controller' => 'Recibopeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reciboped'), ['controller' => 'Recibopeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CLIENTE') ?></th>
            <td><?= h($cliente->CLIENTE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DESCRIPCION') ?></th>
            <td><?= h($cliente->DESCRIPCION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CIUDAD') ?></th>
            <td><?= h($cliente->CIUDAD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TELEFONO') ?></th>
            <td><?= h($cliente->TELEFONO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FAX') ?></th>
            <td><?= h($cliente->FAX) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VENDEDOR') ?></th>
            <td><?= h($cliente->VENDEDOR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IVA') ?></th>
            <td><?= h($cliente->IVA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RETENCION') ?></th>
            <td><?= h($cliente->RETENCION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CEDULA') ?></th>
            <td><?= h($cliente->CEDULA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CONTACTO') ?></th>
            <td><?= h($cliente->CONTACTO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EMAIL') ?></th>
            <td><?= h($cliente->EMAIL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CELULAR') ?></th>
            <td><?= h($cliente->CELULAR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DIRRES') ?></th>
            <td><?= h($cliente->DIRRES) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TELRES') ?></th>
            <td><?= h($cliente->TELRES) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('USUARIO') ?></th>
            <td><?= h($cliente->USUARIO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TIPOCLIENTE') ?></th>
            <td><?= h($cliente->TIPOCLIENTE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('COMENTARIO') ?></th>
            <td><?= h($cliente->COMENTARIO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ESTADO1') ?></th>
            <td><?= h($cliente->ESTADO1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('REFERENCIA') ?></th>
            <td><?= h($cliente->REFERENCIA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PARROQUIA') ?></th>
            <td><?= h($cliente->PARROQUIA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CLASE') ?></th>
            <td><?= h($cliente->CLASE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MASTER') ?></th>
            <td><?= h($cliente->MASTER) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S1') ?></th>
            <td><?= h($cliente->S1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S2') ?></th>
            <td><?= h($cliente->S2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S3') ?></th>
            <td><?= h($cliente->S3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S4') ?></th>
            <td><?= h($cliente->S4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S5') ?></th>
            <td><?= h($cliente->S5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S6') ?></th>
            <td><?= h($cliente->S6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C1') ?></th>
            <td><?= h($cliente->C1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C2') ?></th>
            <td><?= h($cliente->C2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C3') ?></th>
            <td><?= h($cliente->C3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C4') ?></th>
            <td><?= h($cliente->C4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C5') ?></th>
            <td><?= h($cliente->C5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C6') ?></th>
            <td><?= h($cliente->C6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T1') ?></th>
            <td><?= h($cliente->T1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T2') ?></th>
            <td><?= h($cliente->T2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T3') ?></th>
            <td><?= h($cliente->T3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T4') ?></th>
            <td><?= h($cliente->T4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T5') ?></th>
            <td><?= h($cliente->T5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T6') ?></th>
            <td><?= h($cliente->T6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CELULAR2') ?></th>
            <td><?= h($cliente->CELULAR2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CELULAR3') ?></th>
            <td><?= h($cliente->CELULAR3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NCELULAR') ?></th>
            <td><?= h($cliente->NCELULAR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NCELULAR2') ?></th>
            <td><?= h($cliente->NCELULAR2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NCELULAR3') ?></th>
            <td><?= h($cliente->NCELULAR3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MARCA') ?></th>
            <td><?= h($cliente->MARCA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SILENCIAR') ?></th>
            <td><?= h($cliente->SILENCIAR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S7') ?></th>
            <td><?= h($cliente->S7) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S8') ?></th>
            <td><?= h($cliente->S8) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S9') ?></th>
            <td><?= h($cliente->S9) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('S10') ?></th>
            <td><?= h($cliente->S10) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ANALISTA') ?></th>
            <td><?= h($cliente->ANALISTA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ORIGEN') ?></th>
            <td><?= h($cliente->ORIGEN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ESTADO') ?></th>
            <td><?= $this->Number->format($cliente->ESTADO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CATEGORIA') ?></th>
            <td><?= $this->Number->format($cliente->CATEGORIA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CUPO') ?></th>
            <td><?= $this->Number->format($cliente->CUPO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PLAZO') ?></th>
            <td><?= $this->Number->format($cliente->PLAZO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LISTA') ?></th>
            <td><?= $this->Number->format($cliente->LISTA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZONA') ?></th>
            <td><?= $this->Number->format($cliente->ZONA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CDESCUENTO') ?></th>
            <td><?= $this->Number->format($cliente->CDESCUENTO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CATEGORIA1') ?></th>
            <td><?= $this->Number->format($cliente->CATEGORIA1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NROUNICO') ?></th>
            <td><?= $this->Number->format($cliente->NROUNICO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E1') ?></th>
            <td><?= $this->Number->format($cliente->E1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E2') ?></th>
            <td><?= $this->Number->format($cliente->E2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E3') ?></th>
            <td><?= $this->Number->format($cliente->E3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E4') ?></th>
            <td><?= $this->Number->format($cliente->E4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E5') ?></th>
            <td><?= $this->Number->format($cliente->E5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E6') ?></th>
            <td><?= $this->Number->format($cliente->E6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PLAZOM') ?></th>
            <td><?= $this->Number->format($cliente->PLAZOM) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TOLERANCIA') ?></th>
            <td><?= $this->Number->format($cliente->TOLERANCIA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TOLERANCIAV') ?></th>
            <td><?= $this->Number->format($cliente->TOLERANCIAV) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CUMPLEANO') ?></th>
            <td><?= h($cliente->CUMPLEANO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FECHA') ?></th>
            <td><?= h($cliente->FECHA) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FECHAACTUAL') ?></th>
            <td><?= h($cliente->FECHAACTUAL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FECHA1') ?></th>
            <td><?= h($cliente->FECHA1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FECHA2') ?></th>
            <td><?= h($cliente->FECHA2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FECHA3') ?></th>
            <td><?= h($cliente->FECHA3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MODIFICACION') ?></th>
            <td><?= h($cliente->MODIFICACION) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('DIRECCION') ?></h4>
        <?= $this->Text->autoParagraph(h($cliente->DIRECCION)); ?>
    </div>
    <div class="row">
        <h4><?= __('DIRDESPACHO') ?></h4>
        <?= $this->Text->autoParagraph(h($cliente->DIRDESPACHO)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recibopeds') ?></h4>
        <?php if (!empty($cliente->recibopeds)): ?>
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
            <?php foreach ($cliente->recibopeds as $recibopeds): ?>
            <tr>
                <td><?= h($recibopeds->id) ?></td>
                <td><?= h($recibopeds->foto) ?></td>
                <td><?= h($recibopeds->foto_dir) ?></td>
                <td><?= h($recibopeds->cliente_id) ?></td>
                <td><?= h($recibopeds->monto) ?></td>
                <td><?= h($recibopeds->comentario) ?></td>
                <td><?= h($recibopeds->user_id) ?></td>
                <td><?= h($recibopeds->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recibopeds', 'action' => 'view', $recibopeds->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recibopeds', 'action' => 'edit', $recibopeds->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recibopeds', 'action' => 'delete', $recibopeds->], ['confirm' => __('Are you sure you want to delete # {0}?', $recibopeds->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ordens') ?></h4>
        <?php if (!empty($cliente->ordens)): ?>
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
            <?php foreach ($cliente->ordens as $ordens): ?>
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
