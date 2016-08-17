<div class="users index large-9 medium-8 columns content">
<?php $this->set('title_for_layout', "S'abonner au site"); ?>
 
<?php echo $this->Form->create(); ?>
<?php foreach ($prices as $k => $v): ?>
   <input type="radio" name="duration" value="<?php echo $k?>">
   <label class="radio" for="<?php echo $v?>">
   <?php echo __("{0,plural, =1{1 month} other{# mouths} },"
           . " {1,number,currency}  ",[$k,$v]);  ?>
   </label><br>
<?php endforeach ?>
<?php echo $this->Form->button('Submit');?>
<?php echo $this->Form->end(); ?>
</div>