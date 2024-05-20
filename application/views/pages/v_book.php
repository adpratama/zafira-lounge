<!-- banner-page -->
<div class="banner-page inner-page book-table" style="background-image: url('https://picsum.photos/id/1/1920/710')">
    <div class="content">
        <div class="banner-text">book a lounge</div>
        <p>Book a table to enjoy the luxury of food, music and service from <br> brochette restaurant</p>
    </div>
</div>
<!-- /banner-page -->

<!-- wg-reservations -->
<div class="wg-reservations style-1 snare-before">
    <div class="content">
        <div class="heading-section">
            <div class="sub wow fadeInUp">Reservations</div>
            <div class="main wow fadeInUp">booking a lounge</div>
            <div class="text wow fadeInUp">After booking we will call the customer to confirm, so please enter your <br> name and phone number is required</div>
            <div class="divider wow fadeInUp">
                <div></div>
            </div>
        </div>
        <form class="book-form" action="<?= base_url('booking/add') ?>" method="POST">
            <div class="columns">
                <fieldset class="name">
                    <input type="text" placeholder="Name*" class="" name="customer_name" tabindex="2" value="" aria-required="true" required="true">
                </fieldset>
            </div>
            <div class="columns">
                <fieldset class="email">
                    <input type="text" placeholder="Email*" class="" name="customer_email" tabindex="2" value="" aria-required="true" required="true">
                </fieldset>
                <fieldset class="phone">
                    <input type="text" placeholder="Whatsapp number*" class="" name="phone_number" tabindex="2" value="" aria-required="true" required="true">
                </fieldset>
            </div>
            <div class="columns">
                <fieldset class="hour select">
                    <select name="lounge" class="" id="lounge" data-label="Room type" required>
                        <?php
                        foreach ($lounges as $l) :
                        ?>
                            <option data-price="<?= number_format($l->price_per_pax, 0, '.', ''); ?>" value="<?= $l->Id ?>"><?= $l->lounge_name ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </fieldset>
                <fieldset class="time select">
                    <input type="date" class="" name="checkin" id="checkin" tabindex="2" aria-required="true" required="true">
                </fieldset>
            </div>
            <div class="columns">
                <fieldset class="event-number">
                    <input type="text" placeholder="Pax*" class="" name="pax" id="pax" tabindex="2" value="" aria-required="true" oninput="calculateTotal()" required="true">
                </fieldset>
                <fieldset class="event-number">
                    <input type="text" class="" name="price" id="price" placeholder="Price" readonly required>
                </fieldset>
                <fieldset class="event-number">
                    <input type="text" placeholder="Subtotal" class="" name="subtotal" id="subtotal" tabindex="2" value="" aria-required="true" oninput="" required="true" readonly>
                </fieldset>
            </div>
            <div class="columns">
                <fieldset class="event-number">
                    <input type="text" class="" name="tax" id="tax" placeholder="Tax" readonly required>
                </fieldset>
                <fieldset class="event-number">
                    <input type="text" placeholder="Total" class="" name="total" id="total" tabindex="2" value="" aria-required="true" oninput="" required="true" readonly>
                </fieldset>
            </div>
            <div class="bot">
                <button class="button-two-line w-full" type="submit">BOOK NOW</button>
            </div>
        </form>
    </div>
    <div class="image">
        <img src="https://picsum.photos/id/301/745/771" alt="">
    </div>
</div>
<!-- /wg-reservations -->
<!-- <script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk menghitung total hasil perkalian pax dan price
    function calculateTotal() {
        var pax = document.getElementById("pax").value || 0;
        var priceOption = document.getElementById("lounge").options[document.getElementById("lounge").selectedIndex];
        var price = priceOption.getAttribute("data-price");

        var subTotal = parseInt(pax) * parseInt(price.replace(/\./g, ''));
        var tax = subTotal * 0.11;
        var total = subTotal + tax;

        document.getElementById("price").value = formatNumber(price);
        document.getElementById("subtotal").value = formatNumber(subTotal);
        document.getElementById("tax").value = formatNumber(tax);
        document.getElementById("total").value = formatNumber(total);
    }

    function formatNumber(amount) {
        return new Intl.NumberFormat('id-ID').format(amount);
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
    tomorrow.setDate(tomorrow.getDate() + 2);

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
</script>