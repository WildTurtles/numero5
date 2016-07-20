<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Immovables Tenant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="immovablesTenants index large-9 medium-8 columns content">
    <h3><?= __('Immovables Tenants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('date_end') ?></th>
                <th><?= $this->Paginator->sort('date_begin') ?></th>
                <th><?= $this->Paginator->sort('immovable_id') ?></th>
                <th><?= $this->Paginator->sort('tenant_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($immovablesTenants as $immovablesTenant): ?>
            <tr>
                <td><?= $this->Number->format($immovablesTenant->id) ?></td>
                <td><?= h($immovablesTenant->date_end) ?></td>
                <td><?= h($immovablesTenant->date_begin) ?></td>
                <td><?= $this->Number->format($immovablesTenant->immovable_id) ?></td>
                <td><?= $this->Number->format($immovablesTenant->tenant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $immovablesTenant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $immovablesTenant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $immovablesTenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immovablesTenant->id)]) ?>
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
