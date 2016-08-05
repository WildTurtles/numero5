<?php $this->set('title_for_layout', "abonner au site");?>

<?php echo $this->Form->create('User'); ?> 
 
<?php foreach (Configure::read('Site.prices') as $k => $v): ?>
     <label class="checkbox">
         <input type="chekbox" value="<?php echo $k; ?>">
         <?php echo $k; ?> mois, <?php echo $v; ?> €
     <\label>
    <?php endforeach ?>
    
    
<?php echo $this->Form->end("Abonnement"); ?>
