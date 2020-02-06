<?php foreach($params['courses'] as $course): ?>
	<h2><?php echo $course['name']; ?></h2>
	<p><?php echo $course['description']; ?></p>
<?php endforeach; ?>
