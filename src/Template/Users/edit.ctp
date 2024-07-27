<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recibopeds'), ['controller' => 'Recibopeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reciboped'), ['controller' => 'Recibopeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bodega Respaldo'), ['controller' => 'BodegaRespaldo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bodega Respaldo'), ['controller' => 'BodegaRespaldo', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ordens'), ['controller' => 'Ordens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orden'), ['controller' => 'Ordens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('password_confirm');
            echo $this->Form->control('role');
            echo $this->Form->control('status');
            echo $this->Form->control('nombre');
            echo $this->Form->control('vendedor');
            echo $this->Form->control('telefonovend');
            echo $this->Form->control('telefonoana');
            echo $this->Form->control('userbod');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
