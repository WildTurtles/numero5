<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Groups User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groupsUsers index large-9 medium-8 columns content">
    <h3><?= __('Groups Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupsUsers as $groupsUser): ?>
            <tr>
                <td><?= $this->Number->format($groupsUser->id) ?></td>
                <td><?= $groupsUser->has('group') ? $this->Html->link($groupsUser->group->id, ['controller' => 'Groups', 'action' => 'view', $groupsUser->group->id]) : '' ?></td>
                <td><?= $groupsUser->has('user') ? $this->Html->link($groupsUser->user->name, ['controller' => 'Users', 'action' => 'view', $groupsUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $groupsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $groupsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $groupsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupsUser->id)]) ?>
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
