// batasi tanggal sebelum H+1
var today = new Date();
var tomorrow = new Date(today);
tomorrow.setDate(tomorrow.getDate() + 1);

var dd = String(tomorrow.getDate()).padStart(2, "0");
var mm = String(tomorrow.getMonth() + 1).padStart(2, "0"); //January is 0!
var yyyy = tomorrow.getFullYear();

tomorrow = yyyy + "-" + mm + "-" + dd;
document.getElementById("datepicker").setAttribute("min", tomorrow);

$("#datepicker").datepicker({
	iconsLibrary: "fontawesome",
	icons: {
		rightIcon: '<span class="fa fa-caret-down"></span>',
	},
	minDate: new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
});

// hitung total
function calculateTotal() {
	var pax = parseInt(document.getElementById("pax").value);
	var pricePerPax = parseInt(
		document
			.getElementById("lounge")
			.options[document.getElementById("lounge").selectedIndex].getAttribute(
				"data-price"
			)
	);

	var subtotal = pax * pricePerPax;
	var tax = subtotal * 0.11;
	var totalPrice = subtotal + tax;

	if (isNaN(pricePerPax)) {
		pricePerPax = 0;
	}

	if (isNaN(subtotal)) {
		subtotal = 0;
	}

	if (isNaN(tax)) {
		tax = 0;
	}

	if (isNaN(totalPrice)) {
		totalPrice = 0;
	}
	document.getElementById("price").value = pricePerPax.toLocaleString("id-ID");
	document.getElementById("subtotal").value = subtotal.toLocaleString("id-ID");
	document.getElementById("tax").value = tax.toLocaleString("id-ID");
	document.getElementById("total").value = totalPrice.toLocaleString("id-ID");
}

// fungsi onchange lounge
document.getElementById("lounge").onchange = function () {
	var pricePerPax = parseInt(
		this.options[this.selectedIndex].getAttribute("data-price")
	);
	var formattedPrice = pricePerPax.toLocaleString("id-ID"); // Format price as currency
	document.getElementById("price").value = formattedPrice;
	calculateTotal(); // Recalculate total when room type changes
};

// input pax maksimal 1000
document.getElementById("pax").addEventListener("input", function () {
	var value = this.value;
	if (!/^\d*$/.test(value)) {
		this.value = value.slice(0, -1); // Menghapus karakter terakhir yang tidak valid
	} else {
		var intValue = parseInt(value);
		if (intValue > 1000) {
			this.value = "1000"; // Membatasi nilai maksimum menjadi 1000
		}
	}
});

// Saat halaman dimuat, cek apakah ada nilai dari input pax, jika ada, hitung totalnya
var paxValue = parseInt(document.getElementById("pax").value);
if (!isNaN(paxValue)) {
	calculateTotal();
}

// Fungsi untuk memeriksa apakah semua input telah diisi
function validateForm() {
	var requiredInputs = [
		"customer_name",
		"email",
		"phone_number",
		"booking_date",
		"pax",
		"lounge",
	];
	var emptyFields = [];
	requiredInputs.forEach(function (inputName) {
		var input = document.getElementsByName(inputName)[0]; // Ambil elemen input berdasarkan nama
		if (!input.value.trim()) {
			// Periksa apakah nilai input tidak kosong
			emptyFields.push(input.getAttribute("data-label")); // Jika kosong, tambahkan label input ke dalam array emptyFields
		}
	});

	return emptyFields; // Kembalikan array emptyFields yang berisi label input yang belum diisi
}

// Konfirmasi sebelum booking
$(".boxed-btn3").on("click", function (e) {
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
