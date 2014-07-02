<?if($this->vars["type"] != "ajax"){?>
<div class="news news<?if($this->vars["type"]){?>_type_<?=$this->vars["type"]?><?}?>">
<?}?>
	<div class="news__body">
		<div class="news__list">
<?foreach($this->vars["items"] as $item){?>
			<?=$item->property->get("title")->get()?>
			(<?=$item->property->get("title")->cut(12)?>)
<?}?>
		</div>
		<div class="news__time">
			Время: <?=date("H:i:s")?>
		</div>
	</div>
<?if($this->vars["type"] != "ajax"){?>
	<div class="news__toolbar">
		<a href="javascript:void(0);" class="news__renew">обновить</a>
	</div>
</div>
<?}?>