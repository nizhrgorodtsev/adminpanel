	<form action="" method="GET">
		<input type="hidden" name="page" value="addpage">
		<button type='submit' class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Page</button>
	</form>		
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>id</th>
			<th>title</th>
			<th>keywords</th>
			<th>description</th>
			<th>status</th>
			<th>orders</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>		
<?php 
$data = new Page;
	foreach($data->allPage() as $value){
		echo "
		<tr>
			<td>$value[id]</td>			
			<td>$value[title]</td>
			<td>$value[keywords]</td>
			<td>$value[description]</td>
			<td>$value[status]</td>
			<td>$value[orders]</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='editpage'>
				<input type='hidden' name='edit' value=$value[id] />
				<button type='submit' class='btn btn-warning'>Edit</button>
			</form>
			</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='deletepage'>
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

