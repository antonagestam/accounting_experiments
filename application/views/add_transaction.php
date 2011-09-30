<h2>Add transaction</h2>
<?php echo form_open('transactions/add_transaction'); ?>
	<label for="from">From</label>
	<select name="from" id="from">
		<?php if($nodes) foreach($nodes as $n): ?>
		<option value="<?php echo $n->id; ?>"><?php echo $n->label; ?></option>
		
		<?php endforeach; ?>
	</select>
	<br/>
	
	
	<label for="value">Sum</label>
	<input type="number" value="0" name="value" id="value" /> kr
	<br/>
	
	<label for="to">To</label>
	<select name="to" id="to">
		<?php if($nodes) foreach($nodes as $n): ?>
		<option value="<?php echo $n->id; ?>"><?php echo $n->label; ?></option>
		
		<?php endforeach; ?>
	</select>
	<br/>
	
	<label for="reference_no">Reference number</label>
	<input name="refrence_no" id="reference_no" value="0" type="number" />
	<br/>
	
	<label for="note">Notes</label>
	<textarea name="note" cols="40" rows="7" id="note"></textarea>
	<br/>

	<input type="submit" value="Save node" />
</form>