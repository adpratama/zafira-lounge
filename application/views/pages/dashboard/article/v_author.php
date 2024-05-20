<div class="pagetitle">
    <h1>Article authors</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Article authors</li>
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
                        <div class="col-6">
                            <h5 class="card-title">
                                List of Article author
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="<?= base_url('dash/article/create') ?>" class="btn btn-info btn-sm mt-3">Create new article</a>
                            <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#addNewAuthor">
                                Add new author
                            </button>
                        </div>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Act.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($authors as $c) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $c->name ?></td>
                                    <td><?= $c->email ?></td>
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
</section>

<div class="modal fade" id="addNewAuthor" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new author</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?= base_url('dash/article/addNewAuthor') ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="author_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="author_name" name="author_name" autofocus="true">
                        </div>
                        <div class="col-12">
                            <label for="author_email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="author_email" name="author_email">
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
        $('#addNewAuthor').on('shown.bs.modal', function() {
            $('#author_name').trigger('focus');
        });
    });
</script>