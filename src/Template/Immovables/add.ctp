<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="immovables form large-9 medium-8 columns content">
    <?= $this->Form->create($immovable) ?>
    <fieldset>
        <legend><?= __('Add Immovable') ?></legend>
        <?php
            echo $this->Form->input('address');
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('rental');
            echo $this->Form->input('rented');
            
            echo $this->Form->input('tenants._ids', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
