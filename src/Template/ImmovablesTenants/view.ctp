<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Immovables Tenant'), ['action' => 'edit', $immovablesTenant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Immovables Tenant'), ['action' => 'delete', $immovablesTenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immovablesTenant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Immovables Tenants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immovables Tenant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="immovablesTenants view large-9 medium-8 columns content">
    <h3><?= h($immovablesTenant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($immovablesTenant->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Immovable Id') ?></th>
            <td><?= $this->Number->format($immovablesTenant->immovable_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tenant Id') ?></th>
            <td><?= $this->Number->format($immovablesTenant->tenant_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date End') ?></th>
            <td><?= h($immovablesTenant->date_end) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Begin') ?></th>
            <td><?= h($immovablesTenant->date_begin) ?></td>
        </tr>
    </table>
</div>
