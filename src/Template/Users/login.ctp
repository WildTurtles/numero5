<h1>Connexion</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

<?= $this->Form->postButton(__('Enregistrer'), ['controller' => 'Users', 'action' => 'add']); ?>
