<?php

if(isset($_GET['post_id'])) {
	$edit_post_id = $_GET['post_id'];
}


$query = "SELECT * FROM posts WHERE post_id = {$edit_post_id}";
        $select_all_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts)) {

            $post_title = $row['post_title'];
            $caption = $row['caption'] == 'NULL' ? '' : $row['caption'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image_1 = $row['post_image_1'];
            $post_image_2 = $row['post_image_2'];
            $post_image_3 = $row['post_image_3'];
						$post_video = $row['post_video'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];
            $post_category_id = $row['post_category_id'];

        }

 ?>

<?php

if(isset($_POST['update_post'])) {

    $post_title = $_POST['post_title'];
    $caption = $_POST['caption'];
    $post_user = $_SESSION['username'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];
    $post_category_id = $_POST['post_category_id'];
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

    	$query = "SELECT post_image_1, post_image_2, post_image_3 FROM posts WHERE post_id = {$edit_post_id}";
    	$result = $connection->query($query);
			confirmQuery($result);
    	$row = $result->fetch_assoc();

    if(empty($post_image_1)) {

			$post_image_1 = $row['post_image_1'];
    }
    if(empty($post_image_2)) {
			$post_image_2 = $row['post_image_2'];
    }
    if(empty($post_image_3)) {
			$post_image_3 = $row['post_image_3'];
    }

    $query = "UPDATE posts SET ";
    $query .= "post_category_id = {$post_category_id}, ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_user = '{$post_user}', ";
    $query .= "post_date = now(), ";
	$query .= "post_image_1 = '{$post_image_1}', ";
	$query .= "post_image_2 = '{$post_image_2}', ";
	$query .= "post_image_3 = '{$post_image_3}', ";
	$query .= "post_video = '{$post_video}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "caption = '{$caption}' ";
    $query .= "WHERE post_id = {$edit_post_id} ";

    $update_query = $connection->query($query);
    confirmQuery($update_query);

    echo "<p class='bg-success'>Post Updated:. <a href='../post.php?p_id=$edit_post_id'>View Post</a> or <a href='posts.php'>Edit More Post</a></p>";
}

?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title" required>
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

            if($cat_id == $post_category_id) {

                echo "<option selected value='$cat_id'>{$cat_title}</option>";

            } else {
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
       }

	?>
		</select>
	</div>








	<div class="form-group">

        <select name="post_status" class="form-control">
            <option value="<?php echo $post_status; ?>"><?php echo ucfirst($post_status); ?></option>
            <?php
                if($post_status == 'draft')
                    echo "<option value='published'>Publish</option>";
                else
                    echo "<option value='draft'>Draft</option>";
             ?>
        </select>

    </div>
	<div class="form-group">
		<label for="post_image_1">Post Image 1</label>
		<img width="100px" src="../images/news/<?php echo $post_image_1; ?>" alt="image">
		<input type="file" name="post_image_1" accept="application/msword,image/gif,image/jpeg,application/pdf,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.xls,.xlsx,.zip">
	</div>
	<div class="form-group">
		<label for="caption">Caption</label>
		<input value="<?php echo $caption; ?>" type="text" class="form-control" name="caption">
	</div>
	<div class="form-group">
		<img width="100px" src="../images/news/<?php echo $post_image_2; ?>" alt="image">
		<label for="post_image_2">Post Image 2</label>
		<input type="file" name="post_image_2" accept="application/msword,image/gif,image/jpeg,application/pdf,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.xls,.xlsx,.zip">
	</div>
	<div class="form-group">
		<img width="100px" src="../images/news/<?php echo $post_image_3; ?>" alt="image">
		<label for="post_image_3">Post Image 3</label>
		<input type="file" name="post_image_3" accept="application/msword,image/gif,image/jpeg,application/pdf,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip,.doc,.gif,.jpeg,.jpg,.pdf,.png,.xls,.xlsx,.zip">
	</div>
	<div class="form-group">
		<label for="post_video">Post Video</label>
		<input type="text" class="form-control" name="post_video">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" cols="30" POSTs="10"><?php echo $post_content; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
	</div>




</form>
