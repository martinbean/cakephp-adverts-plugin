<div class="advertSizes form">
<?php echo $this->Form->create('AdvertSize'); ?>
	<fieldset>
		<legend><?php echo __('Add Advert Size'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('width');
		echo $this->Form->input('height');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Advert Sizes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('controller' => 'advert_slots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('controller' => 'advert_slots', 'action' => 'add')); ?> </li>
	</ul>
</div>
