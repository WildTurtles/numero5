<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeRent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeRent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Type Rents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="typeRents form large-9 medium-8 columns content">
    <?= $this->Form->create($typeRent) ?>
    <fieldset>
        <legend><?= __('Edit Type Rent') ?></legend>
        <?php
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
