<div class="advertSizes index">
	<h2><?php echo __('Advert Sizes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('width'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($advertSizes as $advertSize): ?>
	<tr>
		<td><?php echo h($advertSize['AdvertSize']['id']); ?>&nbsp;</td>
		<td><?php echo h($advertSize['AdvertSize']['name']); ?>&nbsp;</td>
		<td><?php echo h($advertSize['AdvertSize']['width']); ?>&nbsp;</td>
		<td><?php echo h($advertSize['AdvertSize']['height']); ?>&nbsp;</td>
		<td><?php echo h($advertSize['AdvertSize']['created']); ?>&nbsp;</td>
		<td><?php echo h($advertSize['AdvertSize']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $advertSize['AdvertSize']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $advertSize['AdvertSize']['id']), null, __('Are you sure you want to delete # %s?', $advertSize['AdvertSize']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Advert Size'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Advert Slots'), array('controller' => 'advert_slots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advert Slot'), array('controller' => 'advert_slots', 'action' => 'add')); ?> </li>
	</ul>
</div>
