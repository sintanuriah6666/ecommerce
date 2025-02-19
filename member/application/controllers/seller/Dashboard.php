<?php
class Dashboard extends CI_Controller {


	function __construct() {
        parent::__construct();

      
		if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

	function index() {
        $id_member = $this->session->userdata("id_member");
    
        $this->load->model('Mtransaksi');
        $this->load->model('Mproduk');
        $this->load->model('Mkeranjang');
    
        $this->load->model("Notifikasi_model");
        $data['notifikasi'] = $this->Notifikasi_model->get_unread_notifikasi_by_member($id_member);
        $data['count_notifikasi'] = $this->Notifikasi_model->count_unread_notifikasi_by_member($id_member);
    
        // Get start_date and end_date from GET or POST request (you can modify this based on your frontend)
        $start_date = $this->input->get('start_date'); // For example, '2025-01-01'
        $end_date = $this->input->get('end_date'); // For example, '2025-01-31'
    
        // Pass the date range to the model method
        $data['total_penjualan'] = $this->Mtransaksi->get_total_penjualan($start_date, $end_date);
    
        // Other data for the dashboard
        $data['produk_terlaris'] = $this->Mproduk->get_terlaris();
        $data['status_transaksi'] = $this->Mtransaksi->get_status_transaksi();
        $data['pendapatan_per_transaksi'] = $this->Mtransaksi->get_pendapatan_per_transaksi();
    
        // Load the view
        $this->load->view("header", $data);
        $this->load->view('seller/dashboard_tampil', $data);
        $this->load->view('footer');
    }
    
    public function filter() {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
    
        $this->load->model('Mtransaksi');
        $this->load->model('Mproduk');
    
        // Call your model methods to get the filtered data
        $data['total_penjualan'] = $this->Mtransaksi->get_total_penjualan($start_date, $end_date);
        $data['produk_terlaris'] = $this->Mproduk->get_terlaris($start_date, $end_date);
        $data['status_transaksi'] = $this->Mtransaksi->get_status_transaksi($start_date, $end_date);
        $data['pendapatan_per_transaksi'] = $this->Mtransaksi->get_pendapatan_per_transaksi($start_date, $end_date);
    
        // Send the filtered data as a JSON response
        echo json_encode($data);
    }
    
}