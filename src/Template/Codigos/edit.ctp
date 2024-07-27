<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codigo $codigo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $codigo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $codigo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Codigos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="codigos form large-9 medium-8 columns content">
    <?= $this->Form->create($codigo) ?>
    <fieldset>
        <legend><?= __('Edit Codigo') ?></legend>
        <?php
            echo $this->Form->control('CODIGO');
            echo $this->Form->control('DESCRIPCION');
            echo $this->Form->control('TIPO');
            echo $this->Form->control('UBICACION');
            echo $this->Form->control('ordens._ids', ['options' => $ordens]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
