<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Post.php' ?>
<?php include_once '../helpers/Format.php' ?>

<!--inert-->
<?php 
$fm=new Format();
$cat=new Category();
$post=new Post();
//delete
if(isset($_GET['delpost'])){
	$delid=$_GET['delpost'];
   
	$delpost=$post->delPostById($delid);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
			<!--delete-->
			<?php 
			if(isset($delpost)){
				echo $delpost;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Post Title</th>
					<th>Cat Name</th>
					<th>Description</th>
					<th>Image</th>
					<th>Author</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<!--show post-->
				<?php 
				$showPost=$post->showPost();
				if($showPost){
					$i=0;
					while($result=$showPost->fetch_assoc())
					{
						$i++;
				
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['title'] ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td> <?php echo $fm->textShorten( $result['body'],150); ?></td>
					<td><img src="<?php echo $result['image'] ?>" width="60px" height="40px" /></td>
					<td><?php echo $result['author']; ?></td>
					<td><?php echo $fm->formatDate($result['date']);?></td>
					<td><a href="editpost.php?postid=<?php echo $result['postId']; ?>">Edit</a> 
					|| <a onclick="return confirm('Are you sure to delete !')" href="?delpost=<?php echo $result['postId']; ?>">Delete</a></td>
				</tr>
					<?php } } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
