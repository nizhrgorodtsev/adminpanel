	<!--<form action="" method="GET">
		<input type="hidden" name="page" value="addmenuitem">
		<button type='submit' class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New User</button>
	</form>	-->	
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>id</th>
			<th>name</th>
			<th>lastname</th>
			<th>mail</th>
			<th>password</th>
			<th>phone</th>
			<th>status</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>		
<?php 
	$users = new Users;
	foreach($users->allUsers() as $value){
		echo "
		<tr>
			<td>$value[id]</td>			
			<td>$value[name]</td>
			<td>$value[lastname]</td>
			<td>$value[mail]</td>
			<td>$value[password]</td>
			<td>$value[phone]</td>
			<td>$value[status]</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='editusers'>
				<input type='hidden' name='edit' value=$value[id] />
				<button type='submit' class='btn btn-warning'>Edit</button>
			</form>
			</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='deleteusers'>
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

