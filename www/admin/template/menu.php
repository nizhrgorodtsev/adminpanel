	<form action="" method="GET">
		<input type="hidden" name="page" value="addmenuitem">
		<button type='submit' class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Item</button>
	</form>		
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>id</th>
			<th>name</th>
			<th>page_id</th>
			<th>status</th>
			<th>orders</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>		
<?php 
	$menu = new Menu;
	foreach($menu->allMenu() as $value){
		echo "
		<tr>
			<td>$value[id]</td>			
			<td>$value[name]</td>
			<td>$value[page_id]</td>
			<td>$value[status]</td>
			<td>$value[orders]</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='editmenu'>
				<input type='hidden' name='edit' value=$value[id] />
				<button type='submit' class='btn btn-warning'>Edit</button>
			</form>
			</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='deletemenu'>
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

