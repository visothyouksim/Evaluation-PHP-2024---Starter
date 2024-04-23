<div class="col-md-4 mt-4">
    <div class="card shadow-sm h-100">
        <div class="card-body">
            <h5 class="card-title"><?php echo $post['TITLE']; ?></h5>
            <p><?php echo $post['DESCRIPTION']; ?></p>
            <a href="post.php?id=<?php echo $post['ID_POST']; ?>" class="btn btn-primary">
                Consulter les discussions
            </a>
        </div>
    </div>
</div>