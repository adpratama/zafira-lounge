<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                Incoming Reservation
                            </h5>
                        </div>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Num.</th>
                                <th>Resv. Num.</th>
                                <th>Resv. Date</th>
                                <th>Pax</th>
                                <th>Customer</th>
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
                                    <td><?= $t->booking_date ?></td>
                                    <td><?= $t->pax ?></td>
                                    <td><?= $t->customer_name ?></td>
                                    <td>

                                        <!-- <a href="<?= base_url('dash/booking/pending/' . $t->no_reservasi) ?>" class="btn btn-danger btn-sm btn-pending" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Batalkan">
                                            Pending
                                        </a> -->
                                        <!-- <a href="<?= base_url('dash/booking/process/' . $t->no_reservasi) ?>" class="btn btn-primary btn-sm btn-process" id="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Setujui">
                                            Process
                                        </a> -->
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $t->no_reservasi ?>">
                                            Detail
                                        </button>
                                        <div class="modal fade" id="verticalycentered<?= $t->no_reservasi ?>" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><?= $t->no_reservasi ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('dash/booking/process/' . $t->no_reservasi) ?>" method="post">
                                                        <div class="modal-body ">
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
                                                                <div class="col-12">
                                                                    <label for="address" class="form-label">Address</label>
                                                                    <input type="text" class="form-control" value="<?= $t->address ?>" name="address" readonly>
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
                                                                <h4>PROCEEDINGS</h4>
                                                                <div class="col-6">
                                                                    <label for="arival_date" class="form-label">Date of Arival</label>
                                                                    <input type="date" class="form-control" name="arival_date" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="depature_date" class="form-label">Date of Depature</label>
                                                                    <input type="date" class="form-control" name="depature_date" required>
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
                                                                    <input type="text" class="form-control" name="type_event" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="type_packages" class="form-label">Type of Packages</label>
                                                                    <select name="type_packages" class="form-control">
                                                                        <option value="">Select Option Your Packages</option>
                                                                        <option value="1">Full Package</option>
                                                                        <option value="2">Prime Packagee</option>
                                                                        <option value="3">Special Package</option>
                                                                        <option value="4">Regular Package</option>
                                                                        <option value="5">Other Package</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a type="button" href="<?= base_url('dash/booking/pending/' . $t->no_reservasi) ?>" class="btn btn-danger btn-pending" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Pending">
                                                                Pending
                                                            </a>
                                                            <!-- <a type="button" href="<?= base_url('dash/booking/approve/' . $t->no_reservasi) ?>" class="btn btn-primary btn-process" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Setujui">
                                                                Process
                                                            </a> -->
                                                            <button type="submit" class="btn btn-primary" href="<?= base_url('dash/booking/pending/' . $t->no_reservasi) ?>"> Process
                                                            </button>
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