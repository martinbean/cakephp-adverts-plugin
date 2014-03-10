<div class="adverts form">
<?php echo $this->Form->create('Advert'); ?>
	<fieldset>
		<legend><?php echo __('Add Advert'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('url', array('label' => __('URL'), 'type' => 'url'));
		echo $this->Form->input('required_impressions');
		echo $this->Form->input('start_date', array('minYear' => date('Y')));
		echo $this->Form->input('end_date', array('default' => strtotime('+3 months'), 'minYear' => date('Y')));
		echo $this->Form->input('active');
		echo $this->Form->input('advert_slot_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Adverts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('controller' => 'advert_slots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('controller' => 'advert_slots', 'action' => 'add')); ?> </li>
	</ul>
</div>
