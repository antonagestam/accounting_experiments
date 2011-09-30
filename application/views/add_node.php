<div class="grid_5 alpha">
	<h2>Add node</h2>
	<?php echo form_open('nodes/add_node'); ?>
		<label for="type">Type</label>
		<select name="type">
			<?php if($types) foreach($types as $type): ?>
			<option value="<?php echo $type->id; ?>"><?php echo $type->label; ?></option>
			
			<?php endforeach; ?>
		</select>
		<br/>

		<label for="label">Name</label>
		<input name="label" id="label" type="text" />
		<br/>

		<input type="submit" value="Save node" />
	</form>
</div>

<div class="grid_5 omega">
	<h2>Type explanations</h2>
	<?php if($types) foreach($types as $type): ?>
	<article>
		<h3><?php echo $type->label; ?></h3>
		<p><?php echo $type->explanation; ?></p>
	</article>
	
	<?php endforeach; ?>
</div>