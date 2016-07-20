<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Desc') ?></th>
            <td><?= h($category->desc) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Taxes') ?></h4>
        <?php if (!empty($category->taxes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Immovable Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->taxes as $taxes): ?>
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
</div>
