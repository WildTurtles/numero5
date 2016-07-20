<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $immovablesTenant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $immovablesTenant->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Immovables Tenants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="immovablesTenants form large-9 medium-8 columns content">
    <?= $this->Form->create($immovablesTenant) ?>
    <fieldset>
        <legend><?= __('Edit Immovables Tenant') ?></legend>
        <?php
            echo $this->Form->input('date_end');
            echo $this->Form->input('date_begin');
            echo $this->Form->input('immovable_id');
            echo $this->Form->input('tenant_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
