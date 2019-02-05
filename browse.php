<main class="container main-content loaded-container">
<div class="row">
	<h2 class="red">Browse all the podcasts ever created here</h2><br>
</div>
<hr>
<form>
		<div class="row">
			<div class="col-md-3">
				<select class="custom-select browse-sort" onchange="updateBrowse()" onfocus="this.selectedIndex = -1;">
					<option selected>Sort podcasts</option>
					<option>Date ( Newest first )</option>
					<option>Date ( Oldest first )</option>
					<option>Views ( Most viewed first )</option>
					<option>Views ( Least viewed first )</option>
				</select>
			</div>
			<div class="col-md-9"></div>
			

		</div>

</form>

<div class="row podcast">
<?php

include 'mysql-values.php';
$sql = "SELECT * FROM podcast_details ORDER BY `podcast_details`.`timestamp` DESC ;";
if(isset($_GET['sort'])){
	$sort = $_GET['sort'];
	if($sort==1){
		$sql = "SELECT * FROM podcast_details ORDER BY `podcast_details`.`timestamp` DESC ;";
	}else if($sort==2){
		$sql = "SELECT * FROM podcast_details ORDER BY `podcast_details`.`timestamp` ASC ;";
	}
}
$result = $conn->query($sql);
if($result->num_rows > 0){
	$count = 0;
	while($row = $result->fetch_assoc()){
		$count++;

		$fullname = $row["fullname"];
		$image_location = $row["location"];
		$artist = $row["artist"];
echo<<<EOL
          <div class="col-md-3 fetch-list" data-title="$fullname"><img src="$image_location" class="podcast-img">
          <span>$fullname</span><span class="artist">$artist</span>
        </div>

EOL;
		if($count%4==0){
			echo "</div><div class='row podcast'>";
		}
	}
}else{
	echo "<h1>Nothing to show</h1>";
}

?>


</main>