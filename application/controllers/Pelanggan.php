<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }
    

    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', array('required' => '%s Harus Diisi !!!', 'is_unique' => '%s Email Sudah Terdaftar !!!'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[password]', array('required' => '%s Harus Diisi !!!', 'matches' => '%s Password Tidak Sama !!!'));
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',
            );
            $this->load->view('layout/v_wrapper_frontend_auth', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Login !!!');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => '%s Harus Diisi!!!'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi!!!'));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }

        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend_auth', $data, FALSE);
    }

    public function lupa_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[password]', array('required' => '%s Harus Diisi !!!', 'matches' => '%s Password Tidak Sama !!!'));
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Update Password',
                'isi' => 'v_lupa_pass',
            );
            $this->load->view('layout/v_wrapper_frontend_auth', $data, FALSE);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "db_olshop");

            // Periksa apakah email ada di database
            $query = "SELECT * FROM tbl_pelanggan WHERE email = '$email'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    // Update password baru di database
                    $updateQuery = "UPDATE tbl_pelanggan SET password = '$password' WHERE email = '$email'";
                    mysqli_query($koneksi, $updateQuery);

                    // Tampilkan pesan sukses
                    $this->session->set_flashdata('pesan', 'Password berhasil diubah.');
                    redirect('pelanggan/login');
                } else {
                    $this->session->set_flashdata('error', 'Email tidak ditemukan.');
                    redirect('pelanggan/lupa_pass');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan dalam menjalankan query.');
                redirect('pelanggan/lupa_pass');
            }
        }
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function profile()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'My Profile',
            'isi' => 'v_my_profile',
        );
        $this->load->view('layout/v_wrapper_frontend_auth', $data, FALSE);
    }
}