<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manajemen_Detail_Data_Project extends BaseController
{
  public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $id = $this->request->getPost("id_proyek");
        if($id==""){
            $id2 = session()->get('id_proyek');
            $data = [
              'data' => $this->db->query("SELECT a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
              'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
              'menu' => 'manajemen_detail__data_project'
            ];
        }else{
          if($id!=session()->get('id_proyek')){
            session()->set('id_proyek', $id);
            $id2 = session()->get('id_proyek');
            $data = [
              'data' => $this->db->query("SELECT a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
              'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
              'menu' => 'manajemen_detail__data_project'
            ];
          }else{
            $id2 = session()->get('id_proyek');
            $data = [
              'data' => $this->db->query("SELECT a.`judul`,a.`id`,a.`nama_file`,a.`pesan`,c.`fullname`,b.`nama`,b.`tahun`,a.`create_at` FROM detail_data_project a LEFT JOIN data_project b ON a.`id_project`=b.`id` LEFT JOIN users c ON a.`id_pembuat`=c.`id` WHERE a.`id_project`=$id2")->getResult(),
              'data_project' => $this->db->query("SELECT * FROM data_project WHERE id=$id2")->getResult(),
              'menu' => 'manajemen_detail__data_project'
            ];
          }
        }
      return view('manajemen_detail_data_project',$data);
    }
    public function tambah()
    {
      $id_pembuat = user()->id; 
      $id_project = session()->get('id_proyek');
      $judul = $this->request->getPost("judul");
      $pesan = $this->request->getPost("pesan");

      $nama_ori = $_FILES['file_project']['name'];
      $x = explode('.', $nama_ori);
			$ekstensi = strtolower(end($x));
      $nama = strval($id_project.'-'.$id_pembuat.'-'.$judul.' ('.date("Y-m-d H.i.s").').');
			$ukuran	= $_FILES['file_project']['size'];
			$file_tmp = $_FILES['file_project']['tmp_name'];	

      // echo $nama;
      if($nama_ori!=''){	
            $path = FCPATH.'file\file-';
				    move_uploaded_file($file_tmp, $path.$nama.$ekstensi);
					  $query=$this->db->query("INSERT INTO detail_data_project (nama_file,judul,create_at,id_pembuat,pesan,id_project) VALUES ('".$nama.$ekstensi."','$judul',now(),$id_pembuat,'$pesan',$id_project)");
					    if($query){
						    session()->setFlashdata("pesan", "Berhasil menambah file");
					    }else{
						    session()->setFlashdata("pesan-danger", "Gagal menambah file");
					    }
      }else{
        session()->setFlashdata("pesan-danger", "Harus menyertakan file");
      }
      return redirect()->to('/detail_data_project');

    }
    public function hapus()
    {
      $id = user()->id; 
      $id_file = $this->request->getPost("id_file");
      $data = $this->db->query("SELECT * FROM detail_data_project where id=$id_file")->getResult();
      unlink(FCPATH.'file\file-'.$data[0]->nama_file);
      $this->db->query("DELETE FROM detail_data_project where id=$id_file");
      session()->setFlashdata("pesan-danger", "File proyek berhasil dihapus");
      return redirect()->to('/detail_data_project');
    }
    public function download(){
      $id_file = $this->request->getPost("id_file");
      $data = $this->db->query("SELECT * FROM detail_data_project where id=$id_file")->getResult();
      return $this->response->download(FCPATH.'file\file-' . $data[0]->nama_file, null);
    }
}
