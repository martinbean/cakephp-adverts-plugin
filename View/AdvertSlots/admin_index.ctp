<div class="advertSlots index">
	<h2><?php echo __('Advert Slots'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('capacity'); ?></th>
			<th><?php echo $this->Paginator->sort('advert_position_id'); ?></th>
			<th><?php echo $this->Paginator->sort('advert_size_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($advertSlots as $advertSlot): ?>
	<tr>
		<td><?php echo h($advertSlot['AdvertSlot']['id']); ?>&nbsp;</td>
		<td><?php echo h($advertSlot['AdvertSlot']['name']); ?>&nbsp;</td>
		<td>
			<?php if ($advertSlot['AdvertSlot']['unlimited']): ?>
				<?php echo __('Unlimited'); ?>
			<?php else: ?>
				<?php echo h($advertSlot['AdvertSlot']['capacity']); ?>
			<?php endif; ?>
			&nbsp;</td>
		<td>
			<?php echo $this->Html->link($advertSlot['AdvertPosition']['name'], array('controller' => 'advert_positions', 'action' => 'edit', $advertSlot['AdvertPosition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($advertSlot['AdvertSize']['name'], array('controller' => 'advert_sizes', 'action' => 'edit', $advertSlot['AdvertSize']['id'])); ?>
		</td>
		<td><?php echo h($advertSlot['AdvertSlot']['created']); ?>&nbsp;</td>
		<td><?php echo h($advertSlot['AdvertSlot']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $advertSlot['AdvertSlot']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $advertSlot['AdvertSlot']['id']), null, __('Are you sure you want to delete # %s?', $advertSlot['AdvertSlot']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Positions'), array('controller' => 'advert_positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Position'), array('controller' => 'advert_positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Advert Sizes'), array('controller' => 'advert_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Size'), array('controller' => 'advert_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adverts'), array('controller' => 'adverts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert'), array('controller' => 'adverts', 'action' => 'add')); ?> </li>
	</ul>
</div>
