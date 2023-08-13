<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bendahara extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bendahara');
        $this->login_kah();    //Memastikan hanya yang sudah login dapat akses fungsi ini
    }


    public function login_kah()
    {
        if ($this->session->has_userdata('username') && $this->session->userdata('id_level') == 2)
            return TRUE;
        else
            redirect(base_url('logout'));
    }


    public function index()
    {
        $data['judul']    = 'Selamat Datang di TPA Aisyiah Attaqwa';
        $data['page']    = 'home';
        $data['jml_santri']    = $this->m_umum->jumlah_record_tabel('santri');
        $data['jml_setoran']    = $this->m_umum->total_setoran('setoran');
        $this->tampil($data);
    }

    //============================== SANTRI ==============================
    public function santri()
    {
        $data['judul'] = 'Data Santri TPA Aisyiah';
        $data['page'] = 'santri';
        $data['santri'] = $this->m_bendahara->dt_santri();
        $this->tampil($data);
    }
    public function santri_detil($id)
    {
        $data['judul'] = 'Detil Data Santri TPA Aisyiah';
        $data['page'] = 'santri_detil';
        $data['d'] = $this->m_bendahara->dt_santri_detil($id);
        $this->tampil($data);
    }

    

    //============================== GURU ==============================
    public function guru()
    {
        $data['judul'] = 'Data Guru TPA Aisyiah';
        $data['page'] = 'guru';
        $data['guru'] = $this->m_bendahara->dt_guru();
        $this->tampil($data);
    }

    
    //============================== kelas ==============================
    public function kelas()
    {
        $data['judul'] = 'Data kelas TPA Aisyiah';
        $data['page'] = 'kelas';
        $data['kelas'] = $this->m_bendahara->dt_kelas();
        $this->tampil($data);
    }


    //============================== SETORAN ==============================
    public function setoran()
    {
        $data['judul'] = 'Data Setoran TPA Aisyiah';
        $data['page'] = 'setoran';
        $data['setoran'] = $this->m_bendahara->dt_setoran();
        $this->tampil($data);
    }
    public function setoran_detail($id)
    {
        $data['judul'] = 'Detail Data Setoran Santri TPA Aisyiah';
        $data['page'] = 'setoran_detail';
        $data['set'] = $this->m_bendahara->dt_setoran_detail($id);
        $this->tampil($data);
    }

    public function setoran_tambah()
    {
        $data['judul'] = 'Tambah Data Setoran';
        $data['page'] = 'setoran_tambah';

        $this->form_validation->set_rules(
            'id_santri',
            'Nama Santri',
            'callback_dd_cek',
            'required'
        );

        $this->form_validation->set_rules('tgl_setoran', 'Masukkan Tanggal Setoran', 'required');
        $this->form_validation->set_rules('jumlah_setoran', 'Masukkan Jumlah Setoran', 'required');

        $data['ddsantri'] = $this->m_bendahara->dropdown_santri();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_bendahara->dt_setoran_tambah();
            redirect(base_url('bendahara/setoran'));
        }
    }

    public function setoran_edit($id = FALSE)
    {
        $data['judul'] = 'Edit Data Setoran TPA Aisyiah Attaqwa';
        $data['page'] = 'setoran_edit';

        $this->form_validation->set_rules(
            'id_santri',
            'Nama Santri',
            'callback_dd_cek',
            'required',
        );
        $this->form_validation->set_rules('tgl_setoran', 'Masukkan Tanggal Setoran', 'required');
        $this->form_validation->set_rules('jumlah_setoran', 'Masukkan Jumlah Setoran', 'required');
        $data['set'] = $this->m_umum->cari_data('setoran', 'id_setoran', $id);
        $data['ddsantri'] = $this->m_bendahara->dropdown_santri();

        if ($this->form_validation->run() === FALSE) {
            $this->tampil($data);
        } else {
            $this->m_bendahara->dt_setoran_edit($id);
            redirect(base_url('bendahara/setoran'));
        }
    }

    public function setoran_hapus($id)
    {
        $this->m_umum->hapus_data('setoran', 'id_setoran', $id);
        redirect(base_url('bendahara/setoran'));
    }


    //============================== LIST Santri per kelas ==============================
    public function list_santri_per_kelas($id = NULL)
    {
        $data['judul'] = 'Data Santri Tiap kelas di TPA Aisyiah';
        $data['page'] = 'list_santri_per_kelas';
        $data['ddkelas'] = $this->m_bendahara->dropdown_kelas();
        $data['santri'] = $this->m_bendahara->dt_santri_per_kelas($id);
        $data['kelas'] = $this->m_bendahara->dt_kelas();
        $this->tampil($data);
    }



    //============ Tools ===============
    function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
    {
        if ($str == '-Pilih-') {
            $this->form_validation->set_message('dd_cek', 'Harus dipilih');
            return FALSE;
        } else
            return TRUE;
    }

    function tampil($data)
    {
        $this->load->view('bendahara/header', $data);
        $this->load->view('bendahara/isi');
        $this->load->view('bendahara/footer');
    }
}
