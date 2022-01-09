<?php


if(isset($_POST['create_post'])) {


    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $caption = $_POST['caption'];
    $post_user = $_SESSION['username'];
    $post_date = date('d-m-y');
    $post_content = $_POST[ 'post_content' ];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];
    $post_image_1 = $_FILES['post_image_1']['name'];
    $post_image_1_tmp = $_FILES['post_image_1']['tmp_name'];
    $post_image_2 = $_FILES['post_image_2']['name'];
    $post_image_2_tmp = $_FILES['post_image_2']['tmp_name'];
    $post_image_3 = $_FILES['post_image_3']['name'];
    $post_image_3_tmp = $_FILES['post_image_3']['tmp_name'];
    $post_video = $_POST['post_video'];

    if(($post_video == '')) {
      $post_video = 'NULL';
    }
    
    if(($caption == '')) {
      $caption = 'NULL';
    }

    $post_content = $connection->real_escape_string($post_content);

    move_uploaded_file($post_image_1_tmp, "../images/news/{$post_image_1}");
    move_uploaded_file($post_image_2_tmp, "../images/news/{$post_image_2}");
    move_uploaded_file($post_image_3_tmp, "../images/news/{$post_image_3}");

    $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image_1, caption, post_image_2, post_image_3, post_video, post_content, post_tags, post_comment_count, post_status) ";

    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_user}', now(), '{$post_image_1}', '{$caption}', '{$post_image_2}', '{$post_image_3}', '{$post_video}', '{$post_content}', '{$post_tags}', 0, '{$post_status}')";

    $create_post_query = $connection->query($query);

    confirmQuery($create_post_query);

    $last_id = $connection->insert_id;

    echo "<p class='bg-success'>Post Created: <a href='../post.php?p_id=$last_id'>View Post</a> or <a href='posts.php'>Edit More Post</a></p>";

}


 ?>




<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="post_title" required>
	</div>

	<div class="form-group">
		<label for="post_category_id">Post Category</label>
		<select name="post_category_id" class="form-control">

	<?php

		$query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection, $query);
        confirmQuery($select_all_categories);

        while($row = mysqli_fetch_assoc($select_all_categories)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

           echo "<option value='$cat_id'>{$cat_title}</option>";
       }

	?>
		</select>
	</div>


	<div class="form-group">

		<select name="post_status" class="form-control">
			<option value="draft">Post Status</option>
			<option value="draft">Draft</option>
			<option value="published">Published</option>
		</select>

	</div>

	<div class="form-group">
		<label for="post_image">Post Image 1</label>
		<input type="file" name="post_image_1" accept="application/msword,image/gif,image/jpeg,application/pdf,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.xls,.xlsx,.zip">
	</div>
		<div class="form-group">
		<label for="caption">Caption</label>
		<input type="text" class="form-control" name="caption">
	</div>
	<div class="form-group">
		<label for="post_image">Post Image 2</label>
		<input type="file" name="post_image_2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.xls,.xlsx,.zip">
	</div>
	<div class="form-group">
		<label for="post_image">Post Image 3</label>
		<input type="file" name="post_image_3" accept="application/msword,image/gif,image/jpeg,application/pdf,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.xls,.xlsx,.zip">
	</div>
	<div class="form-group">
		<label for="post_video">Post Video</label>
		<input type="text" class="form-control" name="post_video">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>

       <textarea name="post_content" class="form-control"></textarea>

	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>




</form>
