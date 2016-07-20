<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tenant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tenants form large-9 medium-8 columns content">
    <?= $this->Form->create($tenant) ?>
    <fieldset>
        <legend><?= __('Edit Tenant') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('firstname');
            echo $this->Form->input('email');
            echo $this->Form->input('immovables._ids', ['options' => $immovables]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
