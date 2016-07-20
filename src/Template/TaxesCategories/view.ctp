<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tax Categories'), ['action' => 'edit', $taxCategories->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tax Categories'), ['action' => 'delete', $taxCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taxCategories->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Taxes Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax Categories'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Taxes'), ['controller' => 'Taxes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tax'), ['controller' => 'Taxes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="taxesCategories view large-9 medium-8 columns content">
    <h3><?= h($taxCategories->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($taxCategories->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Id') ?></th>
            <td><?= $this->Number->format($taxCategories->tax_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($taxCategories->category_id) ?></td>
        </tr>
    </table>
</div>
