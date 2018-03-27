<div class="clearfix">
<h3 class="text-center">Comments</h3>
  <div class="form-group">
    <label for="name">Your name:</label>
    <input required type="text" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="text">Comment:</label>
    <textarea required rows="5" class="form-control" id="text"></textarea>
  </div>
  <button type="submit" class="btn btn-default pull-right" onclick="addcomment()">Add Comment</button>
</div>
<div class="clearfix" id="comments">
<?php 
 $comments = new Comments;
 $comments -> post_id = $_GET['post_id'];
 $comments -> x = 0;
 $arr = $comments->allComments();

 foreach($arr as $value){
	echo"
	<div>
		<h4><i>$value[name]</i></h4>
		<i>$value[date_]</i>
		<blockquote><i>$value[text]</i></blockquote>
	</div>
	";
 }
?>
</div>
<script>
//document.addEventListener("DOMContentLoaded", scrollingcomments);
var postid = document.getElementById("title").getAttribute("data-postid");
var x = 0;
function addscrollingcomments(){
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	if(request.readyState == 4){
		var node = document.createElement("DIV");
		node.innerHTML = request.responseText;
		document.getElementById("comments").appendChild(node);
		}
	}
	request.open('POST', 'templates/scrollingcomments.php', true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send('postid=' + postid + '&x=' + x);
	}
	
window.onscroll = function scrollingcomments(){
	var scroll = window.pageYOffset;
	var wheight = window.innerHeight;
	var cheight = document.body.scrollHeight;
	if (scroll == (cheight - wheight)) {
		x += 3;
		addscrollingcomments();
	}
}
	
function addcomment(){
	var name = document.getElementById("name").value;
	var text = document.getElementById("text").value;
	
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	if(request.readyState == 4){
		var node = document.createElement("DIV");
		node.innerHTML = request.responseText;
		var list= document.getElementById('comments');
		list.insertBefore(node, list.childNodes[0]);
		}
	}
	request.open('POST', 'templates/responsecomments.php', true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send('name=' + name + '&text=' + text + '&postid=' + postid);
	x +=1;
	}
</script>