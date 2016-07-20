<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals index large-9 medium-8 columns content">
    <h3><?= __('Rentals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('month') ?></th>
                <th><?= $this->Paginator->sort('paid') ?></th>
                <th><?= $this->Paginator->sort('date_limit') ?></th>
                <th><?= $this->Paginator->sort('immovable_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?= $this->Number->format($rental->id) ?></td>
                <td><?= $this->Number->format($rental->amount) ?></td>
                <td><?= $this->Number->format($rental->month) ?></td>
                <td><?= $this->Number->format($rental->paid) ?></td>
                <td><?= h($rental->date_limit) ?></td>
                <td><?= $this->Number->format($rental->immovable_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rental->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rental->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
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
