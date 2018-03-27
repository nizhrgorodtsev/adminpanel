	<!--<form action="" method="GET">
		<input type="hidden" name="page" value="addcomments">
		<button type='submit' class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Item</button>
	</form>	-->	
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>id</th>
			<th>name</th>
			<th>post_id</th>
			<th>status</th>
			<th>text</th>
			<th>date_</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>		
<?php 
	$comments = new Comments;
	foreach($comments->Comments() as $value){
		echo "
		<tr>
			<td>$value[id]</td>			
			<td>$value[name]</td>
			<td>$value[post_id]</td>
			<td>$value[status]</td>
			<td>$value[text]</td>
			<td>$value[date_]</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='editcomments'>
				<input type='hidden' name='edit' value=$value[id] />
				<button type='submit' class='btn btn-warning'>Edit</button>
			</form>
			</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='deletecomments'>
				<input type='hidden' name='delete' value=$value[id] />
				<button type='submit' class='btn btn-danger'>Delete</button>
			</form>
			</td>			
		</tr>
		";
	}
?>
</tbody>
</table>

