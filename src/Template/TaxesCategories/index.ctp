<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tax Categories'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taxesCategories index large-9 medium-8 columns content">
    <h3><?= __('Taxes Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tax_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taxesCategories as $taxCategories): ?>
            <tr>
                <td><?= $this->Number->format($taxCategories->id) ?></td>
                <td><?= $this->Number->format($taxCategories->tax_id) ?></td>
                <td><?= $this->Number->format($taxCategories->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $taxCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taxCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taxCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taxCategories->id)]) ?>
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
