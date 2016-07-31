<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tenant'), ['action' => 'edit', $tenant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tenant'), ['action' => 'delete', $tenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tenants view large-9 medium-8 columns content">
    <h3><?= h($tenant->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($tenant->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($tenant->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($tenant->email) ?></td>
        </tr>
        
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $tenant->has('user') ? $this->Html->link($tenant->user->name, ['controller' => 'Users', 'action' => 'view', $tenant->user->id]) : '' ?></td>
        </tr>
        
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tenant->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Immovables') ?></h4>
        <?php if (!empty($tenant->immovables)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Rental') ?></th>
                <th><?= __('Rented') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tenant->immovables as $immovables): ?>
            <tr>
                <td><?= h($immovables->id) ?></td>
                <td><?= h($immovables->description) ?></td>
                <td><?= h($immovables->address) ?></td>
                <td><?= h($immovables->rental) ?></td>
                <td><?= h($immovables->rented) ?></td>
                <td><?= h($immovables->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Immovables', 'action' => 'view', $immovables->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Immovables', 'action' => 'edit', $immovables->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Immovables', 'action' => 'delete', $immovables->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immovables->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
