<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Immovables'), ['controller' => 'Immovables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Immovable'), ['controller' => 'Immovables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Immovables') ?></h4>
        <?php if (!empty($user->immovables)): ?>
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
            <?php foreach ($user->immovables as $immovables): ?>
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
    <div class="related">
        <h4><?= __('Related Groups') ?></h4>
        <?php if (!empty($user->groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Desc') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->groups as $groups): ?>
            <tr>
                <td><?= h($groups->id) ?></td>
                <td><?= h($groups->desc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
