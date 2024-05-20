<div class="pagetitle">
    <h1>Articles</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Articles</li>
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
                                List of Article
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="<?= base_url('dash/article/create') ?>" class="btn btn-primary btn-sm mt-3">Add new</a>
                        </div>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Act.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($articles as $a) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->category_name ?></td>
                                    <td><?= $a->judul ?></td>
                                    <td>
                                        <div class="btn-group">

                                            <a href="<?= base_url('dash/article/edit/') . $a->slug ?>" class="btn btn-primary btn-sm">

                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <a href="<?= base_url('dash/article/delete/' . $a->slug) ?>" class="btn btn-danger btn-sm btn-process" id="btnHapus">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
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