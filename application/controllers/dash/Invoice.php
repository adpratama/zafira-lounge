<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(E_ALL & ~E_DEPRECATED);

class Invoice extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_Invoice', 'M_Customer', 'M_Auth']);
		$this->load->helper(['string', 'url', 'date', 'number']);
		$this->load->library(['session', 'pagination', 'pdfgenerator', 'PHPExcel']);

		if (!$this->session->userdata('is_logged_in')) {

			$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			You have to login first.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Invoice',
			'pages' => 'pages/dashboard/invoice/v_invoice',
			'invoices' => $this->M_Invoice->list_invoice(),
			'customers' => $this->M_Customer->list_customer(),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('pages/index', $data);
	}

	public function add()
	{
		$customer = $this->M_Customer->show($this->input->post('customer'));
		$max_num = $this->M_Invoice->select_max();

		if (!$max_num['max']) {
			$bilangan = 1; // Nilai Proses
		} else {
			$bilangan = $max_num['max'] + 1;
		}

		$no_inv = sprintf("%06d", $bilangan);

		$data = [
			'title' => 'Create Invoice',
			'pages' => 'pages/dashboard/invoice/v_add_invoice',
			'no_invoice' => $no_inv,
			'customers' => $this->M_Customer->list_customer(),
			'customer' => $customer,
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		$this->load->view('pages/index', $data);
	}

	public function store()
	{
		$menus = $this->input->post('menu');
		$qtys = $this->input->post('qty');
		$hargas = $this->input->post('harga');
		$totals = $this->input->post('total');

		$id_user = $this->session->userdata('user_id');
		$diskon = $this->input->post('diskon');
		$nominal = preg_replace('/[^a-zA-Z0-9\']/', '', $this->input->post('nominal'));
		$besaran_diskon = preg_replace('/[^a-zA-Z0-9\']/', '', $this->input->post('besaran_diskon'));
		$grandtotal = preg_replace('/[^a-zA-Z0-9\']/', '', $this->input->post('grandtotal'));

		$no_inv = $this->input->post('no_invoice');

		// Insert ke tabel invoice
		$invoice_data = [
			'no_invoice' => $no_inv,
			'tanggal_invoice' => $this->input->post('tgl_invoice'),
			'created_by' => $id_user,
			'keterangan' => $this->input->post('keterangan'),
			'id_customer' => $this->input->post('customer'),
			'subtotal' => $nominal,
			'diskon' => $diskon,
			'besaran_diskon' => $besaran_diskon,
			'total_invoice' => $grandtotal,
		];

		$id_invoice = $this->M_Invoice->insert($invoice_data);

		$detail_data = [];

		if (is_array($menus)) {
			for ($i = 0; $i < count($menus); $i++) {
				$menu = $menus[$i];
				$qty = preg_replace('/[^a-zA-Z0-9\']/', '', $qtys[$i]);
				$harga = preg_replace('/[^a-zA-Z0-9\']/', '', $hargas[$i]);
				$total = preg_replace('/[^a-zA-Z0-9\']/', '', $totals[$i]);

				$detail_data[] = [
					'id_invoice' => $id_invoice,
					'menu' => $menu,
					'qty' => $qty,
					'harga' => $harga,
					'total' => $total,
					'created_by' => $id_user
				];
			}
		}

		if (!empty($detail_data)) {
			$insert = $this->M_Invoice->insert_batch($detail_data);

			if ($insert) {
				$this->session->set_flashdata('message_name', 'The invoice has been successfully created. ' . $no_inv);
				// After that you need to used redirect function instead of load view such as 
				redirect("dash/invoice");
			}
		}
	}

	public function edit($id)
	{
		$id = $this->uri->segment(4);

		$data = [
			'title' => 'Edit Category',
			'pages' => 'pages/dashboard/category/v_add_category',
			'category' => $this->M_Invoice->detail_category($id),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		$this->load->view('pages/index', $data);
	}

	public function print($no_inv)
	{
		$inv =  $this->M_Invoice->show($no_inv);
		$data = [
			'title_pdf' => 'Invoice No. ' . $no_inv,
			'invoice' => $inv,
			'details' => $this->M_Invoice->item_list($inv['Id']),
		];

		// filename dari pdf ketika didownload
		$file_pdf = 'Invoice No. ' . $no_inv;

		// setting paper
		$paper = 'A4';

		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('pages/dashboard/invoice/v_invoice_pdf', $data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function report()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');

		$invoices = $this->M_Invoice->report($from, $to);

		if ($invoices) {

			require_once(APPPATH . 'libraries/PHPExcel/IOFactory.php');

			$excel = new PHPExcel();
			// Settingan awal fil excel
			$excel->getProperties()->setCreator('mlejit.net')
				->setLastModifiedBy('mlejit.net')
				->setTitle("Invoice report")
				->setSubject("Stok")
				->setDescription("Invoice report from " . $from . ' to ' . $to)
				->setKeywords("Invoice report");

			// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
			$style_col = [
				'font' => ['bold' => true],
				'alignment' => ['horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER],
				'borders' => ['top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], 'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], 'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], 'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN]]
			];

			$style_row = [
				'alignment' => ['vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER],
				'borders' => ['top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], 'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], 'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN], 'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN]]
			];

			// bagian header
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "No.");
			$excel->setActiveSheetIndex(0)->setCellValue('B1', "No. Inv.");
			$excel->setActiveSheetIndex(0)->setCellValue('C1', "Tanggal Inv.");
			$excel->setActiveSheetIndex(0)->setCellValue('D1', "Customer");
			$excel->setActiveSheetIndex(0)->setCellValue('E1', "Subtotal");
			$excel->setActiveSheetIndex(0)->setCellValue('F1', "Diskon");
			$excel->setActiveSheetIndex(0)->setCellValue('G1', "Total");

			foreach (range('A', 'G') as $columnID) {
				$excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}

			$no = 1;
			$numrow = 2;
			$totalSubtotal = 0;
			$totalBesaranDiskon = 0;
			$totalInvoice = 0;
			foreach ($invoices as $t) {

				// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $t->no_invoice);
				$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $t->tanggal_invoice);
				$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $t->nama_customer);
				$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $t->subtotal);
				$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $t->besaran_diskon);
				$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $t->total_invoice);

				foreach (range('A', 'G') as $columnID) {
					$excel->getActiveSheet()->getStyle($columnID . $numrow)->applyFromArray($style_row);
				}

				// Menghitung total subtotal, besaran diskon, dan total invoice
				$totalSubtotal += $t->subtotal;
				$totalBesaranDiskon += $t->besaran_diskon;
				$totalInvoice += $t->total_invoice;

				$no++; // Tambah 1 setiap kali looping
				$numrow++; // Tambah 1 setiap kali looping
			}

			// Menambahkan total pada baris terakhir
			$excel->setActiveSheetIndex(0)->mergeCells('A' . $numrow . ':C' . $numrow);
			$excel->setActiveSheetIndex(0)->setCellValue('A' . ($numrow), "TOTAL");
			$excel->setActiveSheetIndex(0)->setCellValue('E' . ($numrow), $totalSubtotal);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . ($numrow), $totalBesaranDiskon);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . ($numrow), $totalInvoice);
			$excel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($style_col);

			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Invoice report from ' . $from . ' to ' . $to . '.xls"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		} else {
			$this->session->set_flashdata('message_error', 'There is no data between ' . $from . ' and ' . $to);
		}

		redirect("dash/invoice");
	}
}
