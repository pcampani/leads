
<?php 			foreach($leads as $lead): ?>
					<tr>
						<td><?= $lead->id ?></td>
						<td><?= $lead->first ?></td>
						<td><?= $lead->last ?></td>
						<td><?= date("Y-m-d",strtotime($lead->date)) ?></td>
						<td><?= $lead->email ?></td>
					</tr>
<?php			endforeach ?>
			