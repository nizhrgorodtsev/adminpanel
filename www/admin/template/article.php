	<form action="" method="GET">
		<input type="hidden" name="page" value="addarticle">
		<button type='submit' class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Article</button>
	</form>		
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>id</th>
			<th>title</th>
			<th>img_src</th>
			<th>status</th>
			<th>category_id</th>
			<th>date_</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>		
<?php 
$data = new Article;
	foreach($data->allArticle() as $value){
		echo "
		<tr>
			<td>$value[id]</td>			
			<td>$value[title]</td>
			<td>$value[img_src]</td>
			<td>$value[status]</td>
			<td>$value[category_id]</td>
			<td>$value[date_]</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='editarticle'>
				<input type='hidden' name='edit' value=$value[id] />
				<button type='submit' class='btn btn-warning'>Edit</button>
			</form>
			</td>
			<td>
			<form action='' method='GET'>
				<input type='hidden' name='page' value='deletearticle'>
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

