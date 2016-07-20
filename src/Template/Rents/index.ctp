<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rent'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Rents'), ['controller' => 'TypeRents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Rent'), ['controller' => 'TypeRents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rents index large-9 medium-8 columns content">
    <h3><?= __('Rents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('account') ?></th>
                <th><?= $this->Paginator->sort('paid') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('type_rent_id') ?></th>
                <th><?= $this->Paginator->sort('rental_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rents as $rent): ?>
            <tr>
                <td><?= $this->Number->format($rent->id) ?></td>
                <td><?= $this->Number->format($rent->account) ?></td>
                <td><?= h($rent->paid) ?></td>
                <td><?= h($rent->date) ?></td>
                <td><?= $this->Number->format($rent->type_rent_id) ?></td>
                <td><?= $rent->has('rental') ? $this->Html->link($rent->rental->id, ['controller' => 'Rentals', 'action' => 'view', $rent->rental->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rent->id)]) ?>
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
