<?php
include('db.php');
include('partials/header.php');

$query = "SELECT * FROM posts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<h1>Postagens Recentes</h1>
<?php while($post = mysqli_fetch_assoc($result)): ?>
  <div class="post">
    <h2><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
    <p><?php echo substr($post['content'], 0, 100); ?>...</p>
  </div>
<?php endwhile; ?>

<?php include('partials/footer.php'); ?>
