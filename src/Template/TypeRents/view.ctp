<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Type Rent'), ['action' => 'edit', $typeRent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type Rent'), ['action' => 'delete', $typeRent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeRent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Type Rents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Rent'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="typeRents view large-9 medium-8 columns content">
    <h3><?= h($typeRent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($typeRent->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($typeRent->id) ?></td>
        </tr>
    </table>
</div>
