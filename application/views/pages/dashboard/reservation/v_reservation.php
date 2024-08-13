<div class="pagetitle">
    <h1>Reservation</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Reservation</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title" style="padding: 0;">Reservation</h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#reportExcel">
                                Report
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Resv. Num.</th>
                                <th>Resv. Date</th>
                                <th>Customer</th>
                                <th>Pax</th>
                                <th>Total</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($reservations as $t) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $t->no_reservasi ?></td>
                                    <td><?= format_indo($t->booking_date) ?></td>
                                    <td><?= $t->customer_name ?></td>
                                    <td><?= $t->pax ?></td>
                                    <td><?= number_format($t->total) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $t->no_reservasi ?>">
                                            Detail
                                        </button>
                                        <a href="<?= base_url('dash/booking/print/' . $t->no_reservasi) ?>" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="bi bi-file-pdf"></i> Print
                                        </a>
                                        <a href="<?= base_url('dash/booking/reservasi_pdf/' . $t->no_reservasi) ?>" class="btn btn-warning btn-sm" target="_blank">
                                            <i class="bi bi-file-pdf"></i> Print Reservasi
                                        </a>
                                        <div class="modal fade" id="verticalycentered<?= $t->no_reservasi ?>" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><?= $t->no_reservasi ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('dash/booking/process/' . $t->no_reservasi) ?>" method="post">
                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <h4>Basic Information</h4>
                                                                <div class="col-6">
                                                                    <label for="customer_name" class="form-label">Customer name</label>
                                                                    <input type="text" class="form-control" value="<?= $t->customer_name ?>" name="customer_name" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" value="<?= $t->email ?>" name="email" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="phone_number" class="form-label">Whatsapp number</label>
                                                                    <input type="text" class="form-control" value="<?= $t->phone_number ?>" name="phone_number" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="booking_date" class="form-label">Booking date</label>
                                                                    <input type="date" class="form-control" value="<?= $t->booking_date ?>" name="booking_date" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="room_type" class="form-label">Room type</label>
                                                                    <input type="text" name="room_type" id="room_type" class="form-control" value="<?= $t->lounge_name ?>" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="pax" class="form-label">Pax</label>
                                                                    <input type="text" name="pax" id="pax" class="form-control" value="<?= $t->pax ?>" readonly>
                                                                </div>
                                                                <hr>
                                                                <h4>Proceedings</h4>
                                                                <div class="col-6">
                                                                    <label for="arival_date" class="form-label">Date of Arival</label>
                                                                    <input type="date" class="form-control" name="arival_date" value="<?= $t->arival_date ?>" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="depature_date" class="form-label">Date of Depature</label>
                                                                    <input type="date" class="form-control" name="depature_date" value="<?= $t->depature_date ?>" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="guest_number" class="form-label">Number of Guest</label>
                                                                    <input type="text" class="form-control" value="<?= $t->pax ?>" name="guest_number" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="overall_amount" class="form-label">Overall Amount</label>
                                                                    <input type="text" class="form-control" value="<?= $t->total ?>" name="overall_amount" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="type_event" class="form-label">Type of Event</label>
                                                                    <input type="text" class="form-control" name="type_event" value="<?= $t->type_event ?>" readonly>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="type_packages" class="form-label">Type of Packages</label>
                                                                    <select name="type_packages" class="form-control">
                                                                        <option value="">Select Option Your Packages</option>
                                                                        <option value='1' <?php if ($t->type_packages == '1') echo "selected"; ?>>Full Package</option>
                                                                        <option value='2' <?php if ($t->type_packages == '2') echo "selected"; ?>>Prime Packagee</option>
                                                                        <option value='3' <?php if ($t->type_packages == '3') echo "selected"; ?>>Special Package</option>
                                                                        <option value='4' <?php if ($t->type_packages == '4') echo "selected"; ?>>Regular Package</option>
                                                                        <option value='5' <?php if ($t->type_packages == '5') echo "selected"; ?>>Other Package</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('dash/booking/approve/' . $t->no_reservasi) ?>" class="btn btn-primary btn-process" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Setujui">
                                                                Process
                                                            </a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Vertically centered Modal-->
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

<div class="modal fade" id="reportExcel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/invoice/report') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="from" class="form-label">From</label>
                            <input type="date" name="from" id="from" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="to" class="form-label">To</label>
                            <input type="date" name="to" id="to" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Download excel</button>
                </div>
            </form>
        </div>
    </div>
</div>