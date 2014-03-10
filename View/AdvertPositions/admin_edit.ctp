<div class="advertPositions form">
<?php echo $this->Form->create('AdvertPosition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Advert Position'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AdvertPosition.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AdvertPosition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Positions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('controller' => 'advert_slots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('controller' => 'advert_slots', 'action' => 'add')); ?> </li>
	</ul>
</div>
