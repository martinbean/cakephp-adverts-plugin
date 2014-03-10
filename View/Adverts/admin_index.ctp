<div class="adverts index">
	<h2><?php echo __('Adverts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id', __('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('clicks'); ?></th>
			<th><?php echo $this->Paginator->sort('impressions'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('advert_slot_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($adverts as $advert): ?>
	<tr>
		<td><?php echo h($advert['Advert']['id']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['title']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['clicks']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['impressions']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['active']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($advert['AdvertSlot']['name'], array('controller' => 'advert_slots', 'action' => 'edit', $advert['AdvertSlot']['id'])); ?>
		</td>
		<td><?php echo h($advert['Advert']['created']); ?>&nbsp;</td>
		<td><?php echo h($advert['Advert']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $advert['Advert']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $advert['Advert']['id']), null, __('Are you sure you want to delete # %s?', $advert['Advert']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Advert'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('controller' => 'advert_slots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('controller' => 'advert_slots', 'action' => 'add')); ?> </li>
	</ul>
</div>
