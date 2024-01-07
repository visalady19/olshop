<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model 
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->order_by('id_barang', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function detail_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function gambar_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function get_all_data_barang($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->where('tbl_barang.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }

    // Add these methods in your m_home model
    public function get_reviews($id_barang) {
        return $this->db->get_where('tbl_reviews', array('id_barang' => $id_barang))->result();
    }

    // Add this method in your m_home model
    public function get_average_rating($id_barang) {
        $this->db->select_avg('rating', 'average_rating');
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('tbl_reviews');
        return $query->row()->average_rating;
    }

    public function add_review($data) {
        $this->db->insert('tbl_reviews', $data);
    }

    public function search_items($searchTerm) {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori', 'left');
        $this->db->like('tbl_barang.nama_barang', $searchTerm);
        $this->db->or_like('tbl_kategori.nama_kategori', $searchTerm);
        return $this->db->get()->result();
    }    
}