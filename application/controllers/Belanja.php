<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_barang');
    }
    
    public function index()
    {
        if(empty($this->cart->contents())){
            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang Belanja',
            'isi' => 'v_belanja',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
    
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function update()
    {
        $i = 1;
        foreach($this->cart->contents() as $items){
            $data = array(
                'rowid' => $items['rowid'],
                'qty' => $this->input->post($i.'[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang Berhasil Di Update !!!');
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function checkout()
    {
        $this->pelanggan_login->proteksi_halaman();
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('ekspedisi', 'Ekspedisi', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s Harus Diisi !!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'CheckOut Belanja',
                'isi' => 'v_checkout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            // simpan ke tabel transaksi
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'ekspedisi' => $this->input->post('ekspedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'sub_total' => $this->input->post('sub_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',
            );
            $this->m_transaksi->simpan_transaksi($data);
            
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_barang' => $items['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);

                // Kurangi stok barang di database
                $this->m_barang->kurangi_stok_barang($items['id'], $items['qty']);
            }

            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses !!!');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}