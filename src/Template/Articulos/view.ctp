<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo $articulo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articulo'), ['action' => 'edit', $articulo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articulo'), ['action' => 'delete', $articulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articulos view large-9 medium-8 columns content">
    <h3><?= h($articulo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Departamento') ?></th>
            <td><?= h($articulo->departamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($articulo->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($articulo->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($articulo->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= h($articulo->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articulo->id) ?></td>
        </tr>
    </table>
</div>
