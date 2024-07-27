<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recibopeds'), ['controller' => 'Recibopeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reciboped'), ['controller' => 'Recibopeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientes index large-9 medium-8 columns content">
    <h3><?= __('Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CLIENTE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DESCRIPCION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CIUDAD') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ESTADO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TELEFONO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FAX') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CATEGORIA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('VENDEDOR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CUPO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PLAZO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IVA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('RETENCION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LISTA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CEDULA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CONTACTO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EMAIL') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CELULAR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CUMPLEANO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DIRRES') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TELRES') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ZONA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('USUARIO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TIPOCLIENTE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FECHA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FECHAACTUAL') ?></th>
                <th scope="col"><?= $this->Paginator->sort('COMENTARIO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ESTADO1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('REFERENCIA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PARROQUIA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CDESCUENTO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CATEGORIA1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CLASE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MASTER') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FECHA1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FECHA2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FECHA3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MODIFICACION') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NROUNICO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('E6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('C1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('C2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('C3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('C4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('C5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('C6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('T6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CELULAR2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CELULAR3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NCELULAR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NCELULAR2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NCELULAR3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MARCA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SILENCIAR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PLAZOM') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TOLERANCIA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TOLERANCIAV') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S7') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S8') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S9') ?></th>
                <th scope="col"><?= $this->Paginator->sort('S10') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ANALISTA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ORIGEN') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $this->Number->format($cliente->id) ?></td>
                <td><?= h($cliente->CLIENTE) ?></td>
                <td><?= h($cliente->DESCRIPCION) ?></td>
                <td><?= h($cliente->CIUDAD) ?></td>
                <td><?= $this->Number->format($cliente->ESTADO) ?></td>
                <td><?= h($cliente->TELEFONO) ?></td>
                <td><?= h($cliente->FAX) ?></td>
                <td><?= $this->Number->format($cliente->CATEGORIA) ?></td>
                <td><?= h($cliente->VENDEDOR) ?></td>
                <td><?= $this->Number->format($cliente->CUPO) ?></td>
                <td><?= $this->Number->format($cliente->PLAZO) ?></td>
                <td><?= h($cliente->IVA) ?></td>
                <td><?= h($cliente->RETENCION) ?></td>
                <td><?= $this->Number->format($cliente->LISTA) ?></td>
                <td><?= h($cliente->CEDULA) ?></td>
                <td><?= h($cliente->CONTACTO) ?></td>
                <td><?= h($cliente->EMAIL) ?></td>
                <td><?= h($cliente->CELULAR) ?></td>
                <td><?= h($cliente->CUMPLEANO) ?></td>
                <td><?= h($cliente->DIRRES) ?></td>
                <td><?= h($cliente->TELRES) ?></td>
                <td><?= $this->Number->format($cliente->ZONA) ?></td>
                <td><?= h($cliente->USUARIO) ?></td>
                <td><?= h($cliente->TIPOCLIENTE) ?></td>
                <td><?= h($cliente->FECHA) ?></td>
                <td><?= h($cliente->FECHAACTUAL) ?></td>
                <td><?= h($cliente->COMENTARIO) ?></td>
                <td><?= h($cliente->ESTADO1) ?></td>
                <td><?= h($cliente->REFERENCIA) ?></td>
                <td><?= h($cliente->PARROQUIA) ?></td>
                <td><?= $this->Number->format($cliente->CDESCUENTO) ?></td>
                <td><?= $this->Number->format($cliente->CATEGORIA1) ?></td>
                <td><?= h($cliente->CLASE) ?></td>
                <td><?= h($cliente->MASTER) ?></td>
                <td><?= h($cliente->FECHA1) ?></td>
                <td><?= h($cliente->FECHA2) ?></td>
                <td><?= h($cliente->FECHA3) ?></td>
                <td><?= h($cliente->MODIFICACION) ?></td>
                <td><?= $this->Number->format($cliente->NROUNICO) ?></td>
                <td><?= h($cliente->S1) ?></td>
                <td><?= h($cliente->S2) ?></td>
                <td><?= h($cliente->S3) ?></td>
                <td><?= h($cliente->S4) ?></td>
                <td><?= h($cliente->S5) ?></td>
                <td><?= h($cliente->S6) ?></td>
                <td><?= $this->Number->format($cliente->E1) ?></td>
                <td><?= $this->Number->format($cliente->E2) ?></td>
                <td><?= $this->Number->format($cliente->E3) ?></td>
                <td><?= $this->Number->format($cliente->E4) ?></td>
                <td><?= $this->Number->format($cliente->E5) ?></td>
                <td><?= $this->Number->format($cliente->E6) ?></td>
                <td><?= h($cliente->C1) ?></td>
                <td><?= h($cliente->C2) ?></td>
                <td><?= h($cliente->C3) ?></td>
                <td><?= h($cliente->C4) ?></td>
                <td><?= h($cliente->C5) ?></td>
                <td><?= h($cliente->C6) ?></td>
                <td><?= h($cliente->T1) ?></td>
                <td><?= h($cliente->T2) ?></td>
                <td><?= h($cliente->T3) ?></td>
                <td><?= h($cliente->T4) ?></td>
                <td><?= h($cliente->T5) ?></td>
                <td><?= h($cliente->T6) ?></td>
                <td><?= h($cliente->CELULAR2) ?></td>
                <td><?= h($cliente->CELULAR3) ?></td>
                <td><?= h($cliente->NCELULAR) ?></td>
                <td><?= h($cliente->NCELULAR2) ?></td>
                <td><?= h($cliente->NCELULAR3) ?></td>
                <td><?= h($cliente->MARCA) ?></td>
                <td><?= h($cliente->SILENCIAR) ?></td>
                <td><?= $this->Number->format($cliente->PLAZOM) ?></td>
                <td><?= $this->Number->format($cliente->TOLERANCIA) ?></td>
                <td><?= $this->Number->format($cliente->TOLERANCIAV) ?></td>
                <td><?= h($cliente->S7) ?></td>
                <td><?= h($cliente->S8) ?></td>
                <td><?= h($cliente->S9) ?></td>
                <td><?= h($cliente->S10) ?></td>
                <td><?= h($cliente->ANALISTA) ?></td>
                <td><?= h($cliente->ORIGEN) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
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
