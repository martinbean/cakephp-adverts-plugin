<?php
$advertSlot = $this->requestAction('/adverts/advert_slots/view/' . $slot);

if (!empty($advertSlot['Advert'][0])) {
	$advert = array_shift($advertSlot['Advert']);
	$advertImage = $this->Html->image('/adverts/adverts/view/' . $advert['id'], array(
		'alt' => $advert['title']
	));
	$advertLink = $this->Html->link($advertImage, $advert['url'], array(
		'class' => 'th',
		'escape' => false,
		'rel' => 'external'
	));
	echo $this->Html->div('advert ' . $slot, $advertLink);
}
