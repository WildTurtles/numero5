<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rent'), ['action' => 'edit', $rent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rent'), ['action' => 'delete', $rent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Rents'), ['controller' => 'TypeRents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Rent'), ['controller' => 'TypeRents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rents view large-9 medium-8 columns content">
    <h3><?= h($rent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Rental') ?></th>
            <td><?= $rent->has('rental') ? $this->Html->link($rent->rental->id, ['controller' => 'Rentals', 'action' => 'view', $rent->rental->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Account') ?></th>
            <td><?= $this->Number->format($rent->account) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Rent Id') ?></th>
            <td><?= $this->Number->format($rent->type_rent_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($rent->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Paid') ?></th>
            <td><?= $rent->paid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
