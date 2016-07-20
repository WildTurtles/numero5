<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Taxes Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taxesCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($taxCategories) ?>
    <fieldset>
        <legend><?= __('Add Tax Categories') ?></legend>
        <?php
            echo $this->Form->input('tax_id');
            echo $this->Form->input('category_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
