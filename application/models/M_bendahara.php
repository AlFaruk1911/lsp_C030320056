<?php
class M_bendahara extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    //=============================== SANTRI ===============================
    public function dt_santri()
    {
        $this->db->select('s.id_santri, s.nama_santri, k.nama_kelas, s.nama_alias, g.nama_guru');
        $this->db->from('santri s');
        $this->db->join('guru g', 's.id_guru = g.id_guru', 'left');
        $this->db->join('kelas k', 'k.id_kelas = s.id_kelas', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_santri_detil($id)
    {
        $this->db->select('s.id_santri, s.nama_santri, k.nama_kelas, s.nama_alias, g.nama_guru');
        $this->db->from('santri s');
        $this->db->join('guru g', 's.id_guru = g.id_guru', 'left');
        $this->db->join('kelas k', 'k.id_kelas = s.id_kelas', 'left');
        $this->db->where('id_santri', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    //=============================== GURU ===============================

    public function dt_guru($id = FALSE)
    {
        $this->db->select('s.id_guru, s.nama_guru');
        $this->db->from('guru s');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function dropdown_guru()
    {
        $query = $this->db->get('guru');
        $result = $query->result();

        $id_guru = array('-Pilih-');
        $nama_guru = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_guru, $result[$i]->id_guru);
            array_push($nama_guru, $result[$i]->nama_guru);
        }
        return array_combine($id_guru, $nama_guru);
    }

    //=============================== KELAS ===============================


    public function dt_kelas($id = FALSE)
    {
        $this->db->select('s.id_kelas, s.nama_kelas');
        $this->db->from('kelas s');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function dropdown_kelas()
    {
        $query = $this->db->get('kelas');
        $result = $query->result();

        $id_kelas = array('-Pilih-');
        $nama_kelas = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_kelas, $result[$i]->id_kelas);
            array_push($nama_kelas, $result[$i]->nama_kelas);
        }
        return array_combine($id_kelas, $nama_kelas);
    }

    //=============================== DATA SANTRI PER KELAS===============================
    public function dt_santri_per_kelas($id)
    {
        $this->db->select('s.id_santri, s.nama_santri, s.nama_alias, g.nama_guru');
        $this->db->from('santri s');
        $this->db->join('guru g', 's.id_guru = g.id_guru', 'left');
        $this->db->where('s.id_kelas', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //=============================== SETORAN ===============================

    public function dt_setoran()
    {
        $this->db->select('*');
        $this->db->from('setoran set');
        $this->db->join('santri s', 's.id_santri = set.id_santri');
        $this->db->order_by('tgl_setoran', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function dt_setoran_detail($id)
    {
        $this->db->select('*');
        $this->db->from('setoran set');
        $this->db->join('santri s', 's.id_santri = set.id_santri', 'left');
        $this->db->where('id_setoran', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function dt_setoran_tambah()
    {
        $data = array(
            'id_santri' => $this->input->post('id_santri'),
            'tgl_setoran' => $this->input->post('tgl_setoran'),
            'jumlah_setoran' => $this->input->post('jumlah_setoran'),
        );
        return $this->db->insert('setoran', $data);
    }
    public function dropdown_santri()
    {
        $query = $this->db->get('santri');
        $result = $query->result();

        $id_santri = array('-Pilih-');
        $nama_santri = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_santri, $result[$i]->id_santri);
            array_push($nama_santri, $result[$i]->nama_santri);
        }
        return array_combine($id_santri, $nama_santri);
    }
    public function dt_setoran_edit($id)
    {
        $data = array(
            'id_santri' => $this->input->post('id_santri'),
            'tgl_setoran' => $this->input->post('tgl_setoran'),
            'jumlah_setoran' => $this->input->post('jumlah_setoran'),
        );
        $this->db->where('id_setoran', $id);
        return $this->db->update('setoran', $data);
    }
}
