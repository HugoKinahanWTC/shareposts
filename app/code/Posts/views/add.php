<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?= URLROOT; ?>/posts" class="btn btn-light">
    << Back</a>
        <div class="card card-body bg-light mt-5">
            <h2>Create A Post</h2>
            <p>Please fill out the form to create your post. </p>
            <form action="<?php echo URLROOT; ?>/posts/add" method="post">
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="title" class="form-control
                        form-control-lg
                        <?php echo (!empty($data['title_err'])) ? 'is-invalid' :
                            ''; ?>" value="<?php echo htmlspecialchars($data['title']); ?>">
                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="body">Body: <sup>*</sup></label>
                    <textarea name="body"
                        class="form-control
                        form-control-lg
                            <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                    <span class="invalid-feedback"><?php echo
                            htmlspecialchars($data['body_err']); ?></span>
                </div>
                <input type="submit" class="btn btn-success mt-3" value="Post">
            </form>
        </div>

        <?php require APPROOT . '/views/inc/footer.php'; ?>