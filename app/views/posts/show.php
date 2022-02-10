<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?= URLROOT; ?>/posts" class="btn btn-light"><< Back</a>
    <br>
    <div class="container mt-3">
        <h1><?= $data['post']->title; ?></h1>
        <div class="bg-secondary text-white p-2 mb-3 mt-3">
            Posted by <em><?= $data['user']->name; ?></em> on <em><?=
                $data['post']->created_at; ?></em>
        </div>
        <p><?= $data['post']->body; ?></p>
    </div>
<?php if ($data['post']->user_id === $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?= URLROOT; ?>/posts/edit/<?= $data['post']->id; ?>" class="btn
    btn-dark">Edit</a>

    <form class="float-end" action="<?= URLROOT; ?>/posts/delete/<?=
    $data['post']->id; ?>"
          method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
