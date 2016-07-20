<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rental'), ['action' => 'edit', $rental->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rental'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rentals view large-9 medium-8 columns content">
    <h3><?= h($rental->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rental->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($rental->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Month') ?></th>
            <td><?= $this->Number->format($rental->month) ?></td>
        </tr>
        <tr>
            <th><?= __('Paid') ?></th>
            <td><?= $this->Number->format($rental->paid) ?></td>
        </tr>
        <tr>
            <th><?= __('Immovable Id') ?></th>
            <td><?= $this->Number->format($rental->immovable_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Limit') ?></th>
            <td><?= h($rental->date_limit) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rents') ?></h4>
        <?php if (!empty($rental->rents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Account') ?></th>
                <th><?= __('Paid') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Type Rent Id') ?></th>
                <th><?= __('Rental Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rental->rents as $rents): ?>
            <tr>
                <td><?= h($rents->id) ?></td>
                <td><?= h($rents->account) ?></td>
                <td><?= h($rents->paid) ?></td>
                <td><?= h($rents->date) ?></td>
                <td><?= h($rents->type_rent_id) ?></td>
                <td><?= h($rents->rental_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rents', 'action' => 'view', $rents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rents', 'action' => 'edit', $rents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rents', 'action' => 'delete', $rents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
