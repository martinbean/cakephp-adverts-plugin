<div class="adverts form">
<?php echo $this->Form->create('Advert'); ?>
	<fieldset>
		<legend><?php echo __('Edit Advert'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('url', array('label' => __('URL'), 'type' => 'url'));
		echo $this->Form->input('required_impressions');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date', array('default' => strtotime('+3 months')));
		echo $this->Form->input('active');
		echo $this->Form->input('advert_slot_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Advert.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Advert.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Adverts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('controller' => 'advert_slots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('controller' => 'advert_slots', 'action' => 'add')); ?> </li>
	</ul>
</div>
