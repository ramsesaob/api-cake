<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo $articulo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articulos form large-9 medium-8 columns content">
    <?= $this->Form->create($articulo) ?>
    <fieldset>
        <legend><?= __('Add Articulo') ?></legend>
        <?php
            echo $this->Form->control('departamento');
            echo $this->Form->control('categoria');
            echo $this->Form->control('codigo');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('cantidad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
