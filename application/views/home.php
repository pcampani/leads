<?php $this->load->view("layout/header") ?>
<div class="search-results">
	<div class="links"><?php echo $this->pagination->create_links(); ?></div>
		<table>
			<thead>
				<tr>
					<th>Leads ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Date</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
<?php	 		foreach($leads as $lead): ?>
					<tr>
						<td><?= $lead->id ?></td>
						<td><?= $lead->first ?></td>
						<td><?= $lead->last ?></td>
						<td><?= date("Y-m-d",strtotime($lead->date)) ?></td>
						<td><?= $lead->email ?></td>
					</tr>
<?php			endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view("layout/footer") ?>