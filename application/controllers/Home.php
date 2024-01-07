<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->m_home->get_all_data(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori Barang : '. $kategori->nama_kategori,
            'barang' => $this->m_home->get_all_data_barang($id_kategori),
            'isi' => 'v_kategori_barang',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function detail_barang($id_barang)
    {
        $data = array(
            'title' => 'Detail Barang',
            'gambar' => $this->m_home->gambar_barang($id_barang),
            'barang' => $this->m_home->detail_barang($id_barang),
            'reviews' => $this->m_home->get_reviews($id_barang),
            'isi' => 'v_detail_barang',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function add_review()
    {
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'rating' => $this->input->post('rating'),
            'review_text' => $this->input->post('review_text'),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->m_home->add_review($data);
        redirect('home/detail_barang/'.$this->input->post('id_barang'));
    }

    public function search() {
        // Ambil kata kunci pencarian dari input pengguna
        $searchTerm = $this->input->get('q');
    
        // Panggil model untuk melakukan pencarian
        $data = array(
            'title' => 'Hasil Pencarian',
            'barang' => $this->m_home->search_items($searchTerm),
            'isi' => 'v_search',
        );
    
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }    
}