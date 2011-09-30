<div class="big_button">
	<a href="<?php echo site_url('nodes/add'); ?>">
		<img src="<?php echo base_url(); ?>assets/icons/add_button.png" alt="Add" />
	</a>
</div>

<table width="100%" cellspacing="0" class="main_table">
	<tbody>
		<?php foreach($nodes as $n): ?>
		<tr>
			<td><?php echo $n->label; ?><small><?php echo $n->type; ?></small></td>
			<td class="balance"><?php echo $n->balance; ?> kr<small>Balance</small></td>
		</tr>
		
		<?php endforeach; ?>
	</tbody>
</table>