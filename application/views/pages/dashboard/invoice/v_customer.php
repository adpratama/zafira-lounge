<link href="<?= base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
<div class="pagetitle">
    <h1>Customers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item  <?php if ($this->uri->segment(2) == 'customer') echo 'active' ?>">Customers</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
            <div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('message_error') ?>"></div>
            <div class="card">
                <div class="card-header text-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNewCustomer">
                        Add new
                    </button>
                </div>
                <div class="card-body">
                    <table class="table datatable" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($customers as $i) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $i->nama_customer ?></td>
                                    <td><?= strtoupper($i->status_customer) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?= $i->slug ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addNewCustomer" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('dash/customer/store') ?>" method="POST">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="nama_customer" class="form-label">Name</label>
                            <input type="text" class="form-control" name="nama_customer" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="col-6">
                            <label for="telepon_customer" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="telepon_customer" required>
                        </div>
                        <div class="col-6">
                            <label for="status_customer" class="form-label">Status</label>
                            <select name="status_customer" id="status_customer" class="form-control">
                                <option value="eksternal">Eksternal</option>
                                <option value="internal">Internal</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="alamat_customer" class="form-label">Address</label>
                            <!-- <textarea name="alamat_customer" id="alamat_customer" cols="30" rows="3" class="form-control" required></textarea> -->

                            <input type="hidden" name="alamat_customer" value='' class="form-control">
                            <div id="input_alamat_customer" style="height: 150px;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
foreach ($customers as $i) {
?>
    <div class="modal fade" id="detail<?= $i->slug ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $i->nama_customer ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('dash/customer/store/' . $i->slug) ?>" method="POST">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="nama_customer" class="form-label">Name</label>
                                <input type="text" class="form-control" name="nama_customer" value="<?= $i->nama_customer ?>" oninput="this.value = this.value.toUpperCase()" required>
                            </div>
                            <div class="col-6">
                                <label for="telepon_customer" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="telepon_customer" value="<?= $i->telepon_customer ?>" required>
                            </div>
                            <div class="col-6">
                                <label for="status_customer" class="form-label">Status</label>
                                <select name="status_customer" id="status_customer" class="form-control">
                                    <option <?= ($i->status_customer == "eksternal") ? 'selected' : '' ?> value="eksternal">Eksternal</option>
                                    <option <?= ($i->status_customer == "internal") ? 'selected' : '' ?> value="internal">Internal</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="alamat_customer" class="form-label">Address</label>
                                <input type="hidden" name="edit_alamat_customer" value='<?= $i->alamat_customer ?>' class="form-control">
                                <div id="edit_alamat_customer" style="height: 150px;"><?= $i->alamat_customer ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Vertically centered Modal-->
<?php
}
?>

<script src="<?= base_url() ?>assets/vendor/quill/quill.min.js"></script>
<script>
    var quill_alamat_customer = new Quill('#input_alamat_customer', {
        theme: 'snow',
    });

    quill_alamat_customer.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='alamat_customer']").value = quill_alamat_customer.root.innerHTML;
    });

    document.getElementById('input_alamat_customer').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('input_alamat_customer').value = content;
    });
</script>
<script>
    var quill_edit_alamat_customer = new Quill('#edit_alamat_customer', {
        theme: 'snow',
    });

    quill_edit_alamat_customer.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='edit_alamat_customer']").value = quill_edit_alamat_customer.root.innerHTML;
    });

    document.getElementById('edit_alamat_customer').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('edit_alamat_customer').value = content;
    });
</script>