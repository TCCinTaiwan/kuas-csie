			<section><h2 class='hide'><?=lang('marquee');?></h2>
				<ul id="marquee" class="marquee">
					<? foreach ($marquee as $marquee_item):?>
						<?=($marquee_item[lang('lang')]=='')?'':"<li>".$marquee_item[lang('lang')]."</li>"?>
					<? endforeach ?>
				</ul>
			</section>