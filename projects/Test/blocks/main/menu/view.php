<div class="menu">
<?foreach($this->vars["items"] as $item){?>
	<div class="menu__item">
		<a href="<?=$item["url"]?>"><?=$item["title"]?></a>
	</div>
<?}?>
	<div class="clear"></div>
</div>