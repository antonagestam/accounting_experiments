<div class="big_button">
	<a href="<?php echo site_url('transactions/add'); ?>">
		<img src="<?php echo base_url(); ?>assets/icons/add_button.png" alt="Add" />
	</a>
</div>

<table cellspacing="0" width="100%" class="main_table">
	<tbody>
		<?php foreach($transactions as $t): ?>
		<tr>
			<td><?php echo $t->from; ?><small>Transaction source</small></td>
			<td><?php echo $t->value; ?> kr<small>Sum</small></td>
			<td><?php echo $t->to; ?><small>Transaction destination</small></td>
			<td class="extra" data-note="<?php echo addslashes($t->note); ?>" data-id="<?php echo $t->id; ?>">Note</td>
		</tr>
		
		<?php endforeach; ?>
	
	</tbody>
</table>