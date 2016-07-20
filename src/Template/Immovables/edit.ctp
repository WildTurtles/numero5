<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $immovable->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $immovable->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="immovables form large-9 medium-8 columns content">
    <?= $this->Form->create($immovable) ?>
    <fieldset>
        <legend><?= __('Edit Immovable') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('address');
            echo $this->Form->input('rental');
            echo $this->Form->input('rented');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('tenants._ids', ['options' => $tenants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
