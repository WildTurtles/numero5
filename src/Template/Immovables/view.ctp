<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Immovable'), ['action' => 'edit', $immovable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Immovable'), ['action' => 'delete', $immovable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immovable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Immovables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immovable'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="immovables view large-9 medium-8 columns content">
    <h3><?= h($immovable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($immovable->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($immovable->address) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $immovable->has('user') ? $this->Html->link($immovable->user->name, ['controller' => 'Users', 'action' => 'view', $immovable->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($immovable->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($immovable->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Rental') ?></th>
            <td><?= $this->Number->format($immovable->rental) ?></td>
        </tr>
        <tr>
            <th><?= __('Rented') ?></th>
            <td><?= $immovable->rented ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rentals') ?></h4>
        <?php if (!empty($immovable->rentals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Month') ?></th>
                <th><?= __('Paid') ?></th>
                <th><?= __('Date Limit') ?></th>
                <th><?= __('Immovable Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($immovable->rentals as $rentals): ?>
            <tr>
                <td><?= h($rentals->id) ?></td>
                <td><?= h($rentals->amount) ?></td>
                <td><?= h($rentals->month) ?></td>
                <td><?= h($rentals->paid) ?></td>
                <td><?= h($rentals->date_limit) ?></td>
                <td><?= h($rentals->immovable_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rentals', 'action' => 'view', $rentals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rentals', 'action' => 'edit', $rentals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rentals', 'action' => 'delete', $rentals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Taxes') ?></h4>
        <?php if (!empty($immovable->taxes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Immovable Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($immovable->taxes as $taxes): ?>
            <tr>
                <td><?= h($taxes->id) ?></td>
                <td><?= h($taxes->amount) ?></td>
                <td><?= h($taxes->immovable_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Taxes', 'action' => 'view', $taxes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Taxes', 'action' => 'edit', $taxes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Taxes', 'action' => 'delete', $taxes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taxes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tenants') ?></h4>
        <?php if (!empty($immovable->tenants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($immovable->tenants as $tenants): ?>
            <tr>
                <td><?= h($tenants->id) ?></td>
                <td><?= h($tenants->name) ?></td>
                <td><?= h($tenants->firstname) ?></td>
                <td><?= h($tenants->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tenants', 'action' => 'view', $tenants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tenants', 'action' => 'edit', $tenants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tenants', 'action' => 'delete', $tenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tenants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
