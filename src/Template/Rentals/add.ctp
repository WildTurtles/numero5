<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals form large-9 medium-8 columns content">
    <?= $this->Form->create($rental) ?>
    <fieldset>
        <legend><?= __('Add Rental') ?></legend>
        <?php
            echo $this->Form->input('amount');
            echo $this->Form->input('month');
            echo $this->Form->input('paid');
            echo $this->Form->input('date_limit');
            echo $this->Form->input('immovable_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
