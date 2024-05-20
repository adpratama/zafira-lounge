<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="pagetitle">
    <h1>Articles</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('dash/article') ?>">Articles</a></li>
            <li class="breadcrumb-item active">Add new</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <?php
        if ($this->uri->segment(4) == true) { ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('dash/article/store/' . $article['slug']) ?>" method="post" class="row g-2" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="kategori_artikel" class="form-label">Kategori</label>
                                    <select name="kategori_artikel" id="kategori_artikel" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php
                                        foreach ($categories as $c) {
                                        ?>
                                            <option <?= ($article['id_category'] == $c->Id) ? "selected" : "" ?> value="<?= $c->Id ?>"><?= $c->category_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="author_id" class="form-label">Authors</label>
                                    <select name="author_id" id="author" class="form-select select2" onchange="handleSelectChange(this)" required>
                                        <option value="">Choose author</option>
                                        <?php
                                        foreach ($authors as $author) : ?>
                                            <option <?= ($article['author'] == $author->Id) ? "selected" : "" ?> value="<?= $author->Id; ?>"><?= $author->name; ?></option>
                                        <?php
                                        endforeach; ?>
                                        <option value="__tambah__">Tambah author baru...</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="namaAuthorBaru" name="namaAuthorBaru" style="display: none;" placeholder="Nama author baru">
                                    <input type="text" class="form-control mt-2" id="emailAuthorBaru" name="emailAuthorBaru" style="display: none;" placeholder="Email author baru">
                                </div>
                                <div class="col-12">
                                    <label for="judul_artikel" class="form-label">Judul</label>
                                    <textarea name="judul_artikel" id="judul_artikel" cols="30" rows="2" class="form-control"><?= $article['judul'] ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="headline_artikel" class="form-label">Headline / SEO Description</label>
                                    <textarea name="headline_artikel" id="headline_artikel" cols="30" rows="3" class="form-control"><?= $article['headline'] ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="keywords" class="form-label">Keywords</label>
                                    <textarea name="keywords" id="keywords" cols="30" rows="3" class="form-control" placeholder="Masukkan keyword artikel" required><?= $article['keywords'] ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="tags" class="form-label">Tag</label>
                                    <select name="tags[]" class="form-select" id="multiple-select-tag" data-placeholder="Choose tag" multiple required>
                                        <?php foreach ($tags as $tag) : ?>
                                            <option value="<?= $tag->Id; ?>" <?= (in_array($tag->Id, $article_tags) ? 'selected' : ''); ?>>
                                                <?= $tag->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="content_artikel" class="form-label">Content</label>
                                    <input type="hidden" name="isi_artikel" value='<?= $article['content'] ?>' class="form-control">
                                    <div id="content_artikel" style="height: 150px;"><?= $article['content'] ?></div>
                                </div>
                                <div class="col-12 text-end">
                                    <a href="<?= base_url('dash/article') ?>" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Update data" value="update_nama">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url('dash/article/update_photo/' . $article['slug']) ?>" method="post" class="row g-2" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="foto_artikel" class="form-label">Foto</label>
                                    <input type="file" name="foto_artikel" id="foto_artikel" class="form-control" onchange="previewImageAdd(this);" required>
                                </div>
                                <div class="col-6">
                                    <span class="badge bg-primary mb-2 text-end">Saat ini</span>
                                    <img src="<?= base_url('assets/front/images/articles/' . $article['photo']) ?>" alt="" class="card-img-top" style="max-width: 200px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Existing photo">
                                </div>
                                <div class="col-6">
                                    <span class="badge bg-warning mb-2 text-end">Terbaru</span>
                                    <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="tooltip" title="Perbarui foto" value="update_photo">Perbarui photo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?= validation_errors(); ?>
                            <form action="<?= base_url('dash/article/store') ?>" method="post" class="row g-2" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="kategori_artikel" class="form-label">Kategori</label>
                                    <select name="kategori_artikel" id="kategori_artikel" class="form-select select2" required>
                                        <option value="">--Pilih--</option>
                                        <?php
                                        foreach ($categories as $c) {
                                        ?>
                                            <option <?= ($this->session->flashdata('kategori_artikel') == $c->Id) ? "selected" : "" ?> value="<?= $c->Id ?>"><?= $c->category_name ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="author_id" class="form-label">Authors</label>
                                    <select name="author_id" id="author" class="form-select select2" onchange="handleSelectChange(this)" required>
                                        <option value="">Choose author</option>
                                        <?php
                                        foreach ($authors as $author) : ?>
                                            <option <?= ($this->session->flashdata('judul_artikel') == $author->Id) ? "selected" : "" ?> value="<?= $author->Id; ?>"><?= $author->name; ?></option>
                                        <?php
                                        endforeach; ?>
                                        <option value="__tambah__">Tambah author baru...</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="namaAuthorBaru" name="namaAuthorBaru" style="display: none;" placeholder="Nama author baru">
                                    <input type="text" class="form-control mt-2" id="emailAuthorBaru" name="emailAuthorBaru" style="display: none;" placeholder="Email author baru">
                                </div>
                                <div class="col-12">
                                    <label for="judul_artikel" class="form-label">Judul</label>
                                    <textarea name="judul_artikel" id="judul_artikel" cols="30" rows="2" class="form-control" placeholder="Masukkan judul artikel" value="<?= set_value('judul_artikel'); ?>" required><?= $this->session->flashdata('judul_artikel') ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="headline_artikel" class="form-label">Headline / SEO Description</label>
                                    <textarea name="headline_artikel" id="headline_artikel" cols="30" rows="3" class="form-control" placeholder="Masukkan headline artikel" required><?= $this->session->flashdata('headline_artikel') ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="keywords" class="form-label">Keywords</label>
                                    <textarea name="keywords" id="keywords" cols="30" rows="3" class="form-control" placeholder="Masukkan keyword artikel" required><?= set_value('keywords') ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="foto_artikel" class="form-label">Foto</label>
                                    <input type="file" name="foto_artikel" id="foto_artikel" class="form-control" onchange="previewImageAdd(this);" required>
                                </div>
                                <div class="col-12 text-center">
                                    <img id="previewAdd" class="card-img-top" style="max-width: 200px; display:none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="New logo">
                                </div>
                                <div class="col-12">
                                    <label for="tags" class="form-label">Tag</label>
                                    <select name="tags[]" class="form-select" id="multiple-select-tag" data-placeholder="Choose tag" multiple required>
                                        <?php
                                        foreach ($tags as $t) : ?>
                                            <option <?= ($this->session->flashdata('tags') == $author->Id) ? "selected" : "" ?> value="<?= $t->Id; ?>"><?= $t->name; ?></option>
                                        <?php
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="content_artikel" class="form-label">Content</label>
                                    <input type="hidden" name="isi_artikel" value="<?= set_value('isi_artikel'); ?>" class="form-control">
                                    <div id="content_artikel" style="height: 150px;"><?= set_value('isi_artikel') ?></div>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<script>
    function previewImageAdd(input) {
        var preview = document.getElementById('previewAdd');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = '';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.select2').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });

    $('#multiple-select-tag').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });
</script>

<script src="<?= base_url() ?>assets/vendor/quill/quill.min.js"></script>
<script>
    var quill_content = new Quill('#content_artikel', {
        theme: 'snow',
    });

    quill_content.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("input[name='isi_artikel']").value = quill_content.root.innerHTML;
    });

    document.getElementById('content_artikel').addEventListener('input', function() {
        var content = this.innerHTML;
        document.getElementById('content_artikel').value = content;
    });

    function handleSelectChange(selectElement) {
        // Mendapatkan nilai terpilih
        var selectedValue = selectElement.value;

        // Menampilkan atau menyembunyikan input teks berdasarkan nilai terpilih
        var namaAuthorBaruInput = document.getElementById('namaAuthorBaru');
        var emailAuthorBaruInput = document.getElementById('emailAuthorBaru');
        if (selectedValue === '__tambah__') {
            namaAuthorBaruInput.style.display = 'block';
            emailAuthorBaruInput.style.display = 'block';
        } else {
            namaAuthorBaruInput.style.display = 'none';
            emailAuthorBaruInput.style.display = 'none';
        }
    }
</script>