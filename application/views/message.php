			<section><div class="center"><H2><?=lang('news');?></H2></div>
				<div class="MessageTable">
					<table class='tablesorter'>
						<thead>
							<tr>
								<th><?=lang('title');?></th>
								<th><?=lang('date');?></th>
								<th><?=lang('type');?></th>
								<th><?=lang('visitors');?></th>
							</tr>
						</thead>
						<tbody>
							<? foreach ($message as $message_item): ?>
								<?$date = new DateTime($message_item['date'], new DateTimeZone('Asia/Taipei'));?>
								<tr>
									<td><?=$message_item['title']?></td>
									<td><?=$date->format('Y-m-d')?></td>
									<td><?=lang($message_item['type'])?></td>
									<td><?=$message_item['visits']?></td>
								</tr>
							<? endforeach ?>
						</tbody>
					</table>
				</div>
			</section>