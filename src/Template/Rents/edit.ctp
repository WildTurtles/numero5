<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Type Rents'), ['controller' => 'TypeRents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Rent'), ['controller' => 'TypeRents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rents form large-9 medium-8 columns content">
    <?= $this->Form->create($rent) ?>
    <fieldset>
        <legend><?= __('Edit Rent') ?></legend>
        <?php
            echo $this->Form->input('account');
            echo $this->Form->input('paid');
            echo $this->Form->input('date');
            echo $this->Form->input('type_rent_id');
            echo $this->Form->input('rental_id', ['options' => $rentals]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
