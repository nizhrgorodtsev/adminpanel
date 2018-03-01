<h4 class="text-center">Останні публікації:</h4>

<?php 
	$data = new Lastpost;
	$data -> lastPost();

	
	for ($i = 0; $i<3; $i++){
		
		$data -> id = $data -> lastPost()[$i]['category_id'];
		$data -> lastPostCategory();
		
		$name_category = $data -> name_category;	
		$title = $data -> lastPost()[$i]['title'];
		$intro = $data -> lastPost()[$i]['intro'];
		$date = $data -> lastPost()[$i]['date_'];
		$post_id = $data -> lastPost()[$i]['id'];
		$categori_id = $data -> lastPost()[$i]['category_id'];
		$img_src = $data -> lastPost()[$i]['img_src'];
		
		echo "
		<figure class='well well-lg'>
		  <img src='$img_src' class='img-responsive center-block' alt='A generic square placeholder image with rounded corners in a figure.'>
		  <figcaption class='text-right'>
		  <h4>$title</h4>
		  <p>Категорія: <a href='index.php?category_id=$categori_id'>$name_category</a> <i>$date</i></p>
		  <!--<p>$intro</p>-->
		  <p><a href='index.php?post_id=$post_id'>Read more</a></p>
		  </figcaption>
		</figure>		
		";
	}
	
?>