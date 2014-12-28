			<section><h2 class='hide'><?=lang('photo');?></h2>
				<div class="slideshow">
					<? foreach ($photo as $photo_item): ?>
				    	<img src="<?=site_url($photo_item['filename'])?>" />
					<? endforeach ?>
				</div>
			</section>