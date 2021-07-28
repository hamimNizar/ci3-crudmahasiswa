<?php

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            // $this->load->database();
            $this->load->library('form_validation');
    }

    public function index()
	{
        $datamhs ['mhs'] = $this->db->get('mahasiswa')->result();
                    // var_dump($datamhs);
		$this->load->view('mhs/index', $datamhs);
        
	}

    public function create()
    {
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $config['upload_path']          = './assets/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2000;
        $this->load->library('upload', $config);


        if (empty($_FILES['foto_mahasiswa']['name'])){
            $this->form_validation->set_rules('foto_mahasiswa', 'Foto Mahasiswa', 'required');
        }else{
            $this->upload->do_upload('foto_mahasiswa');
            $fotomhs = $this->upload->data();
            $filemhs = $fotomhs['file_name'];
        }

        if (empty($_FILES['foto_ktp']['name'])){
            $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'required');
        }else{
            $this->upload->do_upload('foto_ktp');
            $fotoktp = $this->upload->data();
            $filektp = $fotoktp['file_name'];
        }

        if( $this->form_validation->run() == FALSE){
            //menampilkan view create
            $this->load->view('mhs/create');

        }else{

            $data = array(
                "nim" => $this->input->post('nim', true),
                "nama" => $this->input->post('nama', true),
                "foto_mahasiswa" => $filemhs,
                "foto_ktp" => $filektp
                );

            $query = $this->db->insert('mahasiswa',$data);
            if($query){
                $this->session->set_flashdata('flash','Berhasil Ditambah');
                redirect('mahasiswa');
            }else{
                echo 'gagal upload';
            }

        }

        // if( $this->form_validation->run() == FALSE){

        //     $this->load->view('mhs/create');
        // }else{
        //     //insert into db here
        //     //then redirect to homepage / mahasiswa
        //     //fotomhs
        //     // $config['upload_path']          = './assets/';
        //     // $config['allowed_types']        = 'jpeg|jpg|png';
        //     // $config['max_size']             = 2000;
        //     // $this->load->library('upload', $config);

        //     if (!$this->upload->do_upload('foto_mahasiswa') && !$this->upload->do_upload('foto_ktp')){
        //         $error = array('error' => $this->upload->display_errors());
        //         $this->load->view('mhs/create', $error);
        //     }else{
        //         $_data = array('upload_fotomhs' => $this->upload->data());
        //         $_data1 = array('upload_fotoktp' => $this->upload->data());

        //         $data = array(
        //             "nim" => $this->input->post('nim', true),
        //             "nama" => $this->input->post('nama', true),
        //             "foto_mahasiswa" => $_data['upload_fotomhs']['file_name'],
        //             "foto_ktp" => $_data1['upload_fotoktp']['file_name']
        //             );

        //         $query = $this->db->insert('mahasiswa',$data);
        //         if($query){
        //             echo 'berhasil di upload '.$_FILES['foto_mahasiswa']['name'];
        //             redirect('mahasiswa');
        //         }else{
        //             echo 'gagal upload';
        //         }
        //     }

        // }
    }

    public function delete($id)
    {
        $id_del = $this->db->get_where('mahasiswa',['id' => $id])->row();
        $query = $this->db->delete('mahasiswa',['id'=>$id]);
        if($query){
            unlink("assets/".$id_del->foto_mahasiswa);
            unlink("assets/".$id_del->foto_ktp);
        }
        $this->session->set_flashdata('flash', 'Berhasil Dihapus');
        redirect('mahasiswa');
        // var_dump($id_del->foto_mahasiswa);

    }

    public function edit($id)
    {
        $data_old['mhs'] = $this->db->get_where('mahasiswa', array('id' => $id))->row_array();

        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        
        $config['upload_path']          = './assets/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2000;
        $this->load->library('upload', $config);

        $data_fotomhs = $data_old['mhs']['foto_mahasiswa'];
        $data_fotoktp = $data_old['mhs']['foto_ktp'];

        // if($_FILES['fotosdas']['name'] != ''){

        // }
        if (!empty($_FILES['foto_mahasiswa']['name'])){
            // $this->form_validation->set_rules('foto_mahasiswa', 'Foto Mahasiswa', 'required');
            $this->upload->do_upload('foto_mahasiswa');
            
            $fotomhs = $this->upload->data();

            unlink("assets/".$data_fotomhs);

            $filemhs = $fotomhs['file_name'];
            $data_fotomhs = $filemhs;

        }
        if (!empty($_FILES['foto_ktp']['name'])){
            // $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'required');
            $this->upload->do_upload('foto_ktp');
            $fotoktp = $this->upload->data();

            unlink("assets/".$data_fotoktp);

            $filektp = $fotoktp['file_name'];
            $data_fotoktp = $filektp;
        }


        if( $this->form_validation->run() == FALSE){

            $this->load->view('mhs/edit', $data_old);
            // var_dump($data_old['mhs']['foto_mahasiswa']);
            // var_dump($data_fotomhs);
        }else{
            //insert into db here
            //then redirect / mahasiswa

            $data = array(
                "nim" => $this->input->post('nim', true),
                "nama" => $this->input->post('nama', true),
                "foto_mahasiswa" => $data_fotomhs,
                "foto_ktp" => $data_fotoktp
                );

            $this->db->where('id', $this->input->post('id'));
            $query_update = $this->db->update('mahasiswa', $data);
            if($query_update){
                $this->session->set_flashdata('flash','Berhasil Diedit');
                redirect('mahasiswa');
            }else{
                echo 'gagal edit';
            }

        }
    }



}
?>