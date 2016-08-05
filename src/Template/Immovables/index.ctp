<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="immovables index large-9 medium-8 columns content">
    <h3><?= __('Immovables') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('rental') ?></th>
                <th><?= $this->Paginator->sort('rented') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($immovables as $immovable): ?>
            <tr>
                <td><?= $this->Number->format($immovable->id) ?></td>
                <td><?= h($immovable->name) ?></td>
                <td><?= h($immovable->description) ?></td>
                <td><?= h($immovable->address) ?></td>
                <td><?= $this->Number->format($immovable->rental) ?></td>
                <td><?= h($immovable->rented) ?></td>
                <td><?= $immovable->has('user') ? $this->Html->link($immovable->user->name, ['controller' => 'Users', 'action' => 'view', $immovable->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $immovable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $immovable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $immovable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immovable->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
