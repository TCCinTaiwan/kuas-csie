<!DOCTYPE html>
<html lang="<?=lang('lang')?>">
	<head>
		<title><?=lang('science')?></title>
		<?=meta($meta);?><!--載入meta資訊-->
		<?=link_tag('images/KUAS.png','shortcut icon','image/ico');?><!--載入ICON-->
	    
	    <!--[if lt IE 9]><script type="text/javascript" src="<?=site_url('js/html5shiv.js');?>"></script><![endif]--><!--讓IE6.7.8相容html5標籤-->
		<? foreach ($js as $js_item): ?>
	    	<script src="<?=site_url($js_item);?>"></script>
	    <? endforeach ?>
		<? foreach ($css as $css_item): ?>
	    	<?=link_tag($css_item);?>
	    <? endforeach ?>
	</head>