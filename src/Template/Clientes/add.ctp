<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recibopeds'), ['controller' => 'Recibopeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reciboped'), ['controller' => 'Recibopeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Add Cliente') ?></legend>
        <?php
            echo $this->Form->control('CLIENTE');
            echo $this->Form->control('DESCRIPCION');
            echo $this->Form->control('DIRECCION');
            echo $this->Form->control('CIUDAD');
            echo $this->Form->control('ESTADO');
            echo $this->Form->control('TELEFONO');
            echo $this->Form->control('FAX');
            echo $this->Form->control('CATEGORIA');
            echo $this->Form->control('VENDEDOR');
            echo $this->Form->control('CUPO');
            echo $this->Form->control('PLAZO');
            echo $this->Form->control('IVA');
            echo $this->Form->control('RETENCION');
            echo $this->Form->control('LISTA');
            echo $this->Form->control('CEDULA');
            echo $this->Form->control('CONTACTO');
            echo $this->Form->control('EMAIL');
            echo $this->Form->control('CELULAR');
            echo $this->Form->control('CUMPLEANO');
            echo $this->Form->control('DIRRES');
            echo $this->Form->control('TELRES');
            echo $this->Form->control('ZONA');
            echo $this->Form->control('USUARIO');
            echo $this->Form->control('TIPOCLIENTE');
            echo $this->Form->control('FECHA');
            echo $this->Form->control('FECHAACTUAL');
            echo $this->Form->control('COMENTARIO');
            echo $this->Form->control('ESTADO1');
            echo $this->Form->control('DIRDESPACHO');
            echo $this->Form->control('REFERENCIA');
            echo $this->Form->control('PARROQUIA');
            echo $this->Form->control('CDESCUENTO');
            echo $this->Form->control('CATEGORIA1');
            echo $this->Form->control('CLASE');
            echo $this->Form->control('MASTER');
            echo $this->Form->control('FECHA1');
            echo $this->Form->control('FECHA2');
            echo $this->Form->control('FECHA3');
            echo $this->Form->control('MODIFICACION');
            echo $this->Form->control('NROUNICO');
            echo $this->Form->control('S1');
            echo $this->Form->control('S2');
            echo $this->Form->control('S3');
            echo $this->Form->control('S4');
            echo $this->Form->control('S5');
            echo $this->Form->control('S6');
            echo $this->Form->control('E1');
            echo $this->Form->control('E2');
            echo $this->Form->control('E3');
            echo $this->Form->control('E4');
            echo $this->Form->control('E5');
            echo $this->Form->control('E6');
            echo $this->Form->control('C1');
            echo $this->Form->control('C2');
            echo $this->Form->control('C3');
            echo $this->Form->control('C4');
            echo $this->Form->control('C5');
            echo $this->Form->control('C6');
            echo $this->Form->control('T1');
            echo $this->Form->control('T2');
            echo $this->Form->control('T3');
            echo $this->Form->control('T4');
            echo $this->Form->control('T5');
            echo $this->Form->control('T6');
            echo $this->Form->control('CELULAR2');
            echo $this->Form->control('CELULAR3');
            echo $this->Form->control('NCELULAR');
            echo $this->Form->control('NCELULAR2');
            echo $this->Form->control('NCELULAR3');
            echo $this->Form->control('MARCA');
            echo $this->Form->control('SILENCIAR');
            echo $this->Form->control('PLAZOM');
            echo $this->Form->control('TOLERANCIA');
            echo $this->Form->control('TOLERANCIAV');
            echo $this->Form->control('S7');
            echo $this->Form->control('S8');
            echo $this->Form->control('S9');
            echo $this->Form->control('S10');
            echo $this->Form->control('ANALISTA');
            echo $this->Form->control('ORIGEN');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
