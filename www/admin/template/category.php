	<form action="" method="GET">
		<input type="hidden" name="page" value="addcategory">
		<button type='submit' class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Category</button>
	</form>		
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>id</th>
			<th>name</th>
			<th>status</th>
			<th>orders</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>		
<?php 
	$category = new Category;
	foreach($category->allCategory() as $value){
		echo "
		<tr>
			<td>$value[id]</td>			
			<td>$value[name]</td>
			<td>$value[status]</td>
			<td>$value[orders]</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='editcategory'>
				<input type='hidden' name='edit' value=$value[id] />
				<button type='submit' class='btn btn-warning'>Edit</button>
			</form>
			</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='deletecategory'>
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

