<div class="pagetitle">
    <h1><?= $title ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-end">
                            <a href="<?= base_url('dash/article/create') ?>" class="btn btn-info btn-sm mt-3">Create new article</a>
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#addNewCategory">
                                Add new category
                            </button>
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#addNewTag">
                                Add new tag
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h5 class="card-title">Category</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Category</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($categories as $c) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $c->category_name ?></td>
                                            <td>
                                                <a href="<?= base_url('dash/article/edit/') . $c->slug ?>" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5 class="card-title">Tag</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Tags</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tags as $c) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $c->name ?></td>
                                            <td>
                                                <a href="<?= base_url('dash/article/edit/') . $c->slug ?>" class="btn btn-primary btn-sm">

                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addNewTag" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/article/addNewTag') ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="tag_name" class="form-label">Tag</label>
                            <input type="text" class="form-control" id="tag_name" name="tag_name" autofocus="true">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addNewCategory" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/category/store') ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="category_name" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" autofocus="true">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#addNewCategory').on('shown.bs.modal', function() {
            $('#category_name').trigger('focus');
        });
        $('#addNewTag').on('shown.bs.modal', function() {
            $('#tag_name').trigger('focus');
        });
    });
</script>