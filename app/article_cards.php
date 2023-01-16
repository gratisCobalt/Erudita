<div class="card-columns">
    <?php foreach ($articles as $article): ?>
        <div class="card">
            <img src="<?php echo $article['cover_image_url']; ?>" class="card-img-top" alt="Cover image">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $article['title']; ?>
                </h5>
                <p class="card-text">Author: <?php echo getUserByID($article['author_id'])['username']; ?></p>
                <a href="article_post.php?id=<?php echo $article['id']; ?>" class="btn btn-warning">Read more...</a>
            </div>
            <div class="card-footer">
                <span class="badge badge-secondary">
                    <?php echo getCategoryByID($article['category_id'])['name']; ?>
                </span>
                <span class="badge badge-secondary"><?php echo $article['views']; ?> views</span>
            </div>
        </div>
    <?php endforeach; ?>
</div>
