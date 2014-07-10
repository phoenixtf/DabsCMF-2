<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js newie" lang="en"> <![endif]-->
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
<?foreach($this->get("css") as $css){?>
	<link rel="stylesheet" href="<?=$css?>">
<?}?>
<?foreach($this->getChilds("css") as $css){?>
	<link rel="stylesheet" href="<?=$css?>">
<?}?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?foreach($this->get("js") as $js){?>
	<script src="<?=$js?>"></script>
<?}?>
<?foreach($this->getChilds("js") as $js){?>
	<script src="<?=$js?>"></script>
<?}?>
</head>
<body>
<div class="layout">
	<div class="layout__header">
		<?=$this->blocks["header"]->getView()?>
	</div>
	<div class="layout__block">
		<?=$this->blocks["news"]->getView()?>
<?if(!empty($this->mods["child-block"])){ // если есть дочерний блок, берем его ?>
		<?=$this->blocks[$this->mods["child-block"]]->getView()?>
<?}else{?>
		<?=$this->page["content"]?>
<?}?>
	</div>
</div>
</body>
</html>