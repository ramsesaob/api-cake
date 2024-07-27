<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sucursale $sucursale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sucursale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sucursale->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sucursales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sucursales form large-9 medium-8 columns content">
    <?= $this->Form->create($sucursale) ?>
    <fieldset>
        <legend><?= __('Edit Sucursale') ?></legend>
        <?php
            echo $this->Form->control('codigo');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
