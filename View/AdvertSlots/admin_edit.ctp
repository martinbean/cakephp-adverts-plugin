<div class="advertSlots form">
<?php echo $this->Form->create('AdvertSlot'); ?>
	<fieldset>
		<legend><?php echo __('Edit Advert Slot'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('capacity');
		echo $this->Form->input('unlimited');
		echo $this->Form->input('advert_position_id');
		echo $this->Form->input('advert_size_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AdvertSlot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AdvertSlot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Positions'), array('controller' => 'advert_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Position'), array('controller' => 'advert_positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Advert Sizes'), array('controller' => 'advert_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Size'), array('controller' => 'advert_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adverts'), array('controller' => 'adverts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert'), array('controller' => 'adverts', 'action' => 'add')); ?> </li>
	</ul>
</div>
