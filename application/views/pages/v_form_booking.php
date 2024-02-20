<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url() ?>assets/front/img/bg-img/bg-8.jpg');">
    <div class="bradcumbContent">
        <h2>Reservation</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Contact Form Area Start ##### -->
<section class="contact-form-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <div class="line-"></div>
                    <h2>Make Reservation</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form -->
                <form action="<?= base_url('booking/add') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" data-label="Name" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" data-label="E-mail" placeholder="E-mail" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="phone_number" class="form-label">Whatsapp number</label>
                            <input type="text" class="form-control" name="phone_number" data-label="Whatsapp number" placeholder="+62" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="reservation_date" class="form-label">Reservation date</label>
                            <input type="date" class="form-control" name="checkin" id="checkin" data-label="Reservation date" placeholder="Reservation date" value="<?= $this->input->post('checkin') ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="lounge_id" class="form-label">Lounge type</label>
                            <select name="lounge_id" id="lounge_id" class="select">
                                <option value="">Room type</option>
                                <?php
                                foreach ($lounges as $l) :
                                ?>
                                    <option data-price="<?= $l->harga_per_pax ?>" value="<?= $l->Id ?>"><?= $l->nama_lounge ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="pax" class="form-label">Pax</label>
                            <input type="text" class="form-control" name="pax" id="pax" data-label="Pax" placeholder="Pax" oninput="calculateTotal()" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" readonly required>
                        </div>
                        <div class="col-lg-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" class="form-control" name="total" id="total" placeholder="Total" readonly required>
                        </div>
                        <div class="col-12">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea name="notes" class="form-control" id="notes" cols="30" rows="10" placeholder="Notes..."></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn palatin-btn mt-50 btn-confirm">Book</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Form Area End ##### -->

<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk menghitung total hasil perkalian pax dan price
    function calculateTotal() {
        var pax = document.getElementById("pax").value;
        var price = document.getElementById("price").value;

        var total = parseInt(pax) * parseInt(price.replace(/\./g, ''));
        document.getElementById("total").value = total.toLocaleString('id-ID');
    }

    // Saat halaman dimuat, cek apakah ada nilai dari input pax, jika ada, hitung totalnya
    document.addEventListener("DOMContentLoaded", function() {
        var paxValue = document.getElementById("pax").value;
        if (paxValue !== "") {
            calculateTotal();
        }
    });

    // input pax maksimal 1000
    document.getElementById("pax").addEventListener("input", function() {
        var value = this.value;
        if (!(/^\d*$/.test(value))) {
            this.value = value.slice(0, -1); // Menghapus karakter terakhir yang tidak valid
        } else {
            var intValue = parseInt(value);
            if (intValue > 1000) {
                this.value = "1000"; // Membatasi nilai maksimum menjadi 1000
            }
        }
    });


    // batasi tanggal sebelum H+1
    var today = new Date();
    var tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    var dd = String(tomorrow.getDate()).padStart(2, '0');
    var mm = String(tomorrow.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = tomorrow.getFullYear();

    tomorrow = yyyy + '-' + mm + '-' + dd;
    document.getElementById("checkin").setAttribute("min", tomorrow);


    // Fungsi untuk memeriksa apakah semua input telah diisi
    function validateForm() {
        var inputs = document.querySelectorAll("input[required], textarea[required]");
        var emptyFields = [];
        for (var i = 0; i < inputs.length; i++) {
            if (!inputs[i].value) {
                emptyFields.push(inputs[i].getAttribute("data-label"));
            }
        }
        return emptyFields; // Semua input telah diisi
    }

    // konfirmasi sebelum booking
    $(".btn-confirm").on("click", function(e) {
        e.preventDefault();
        const form = $(this).parents("form");

        var emptyFields = validateForm();
        if (emptyFields.length === 0) {
            Swal.fire({
                title: "Are you certain the input data is accurate??",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, confirm!",
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        } else {
            // Menampilkan pesan SweetAlert dengan daftar field yang belum diisi
            var errorMessage = "Please fill out all required fields:";
            for (var i = 0; i < emptyFields.length; i++) {
                errorMessage += "\n- " + emptyFields[i];
            }

            Swal.fire({
                title: "Input Required",
                text: errorMessage,
                icon: "error",
                confirmButtonText: "OK",
            });
        }

    });
    $(document).ready(function() {
        // Inisialisasi Nice Select hanya untuk elemen select yang tidak memiliki kelas "no-nice-select"
        $('select:not(.no-nice-select)').niceSelect();
    });
</script>