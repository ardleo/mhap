<?php foreach (($data?:array()) as $item): ?>

<div class="uk-article">

	<h1 class="uk-article-title"><?php echo $item['title']; ?></h1>

	<p class="uk-article-meta">Written by <?php echo $item['username']; ?> on <?php echo $item['date_created']; ?>. </p>

	<p class="uk-article-lead"> <?php echo $item['content']; ?></p>

</div>
<?php endforeach; ?>