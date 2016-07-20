<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tax'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taxes index large-9 medium-8 columns content">
    <h3><?= __('Taxes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('immovable_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taxes as $tax): ?>
            <tr>
                <td><?= $this->Number->format($tax->id) ?></td>
                <td><?= $this->Number->format($tax->amount) ?></td>
                <td><?= $tax->has('immovable') ? $this->Html->link($tax->immovable->id, ['controller' => 'Immovables', 'action' => 'view', $tax->immovable->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tax->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tax->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tax->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tax->id)]) ?>
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
