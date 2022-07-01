<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use function PHPUnit\Framework\isNull;

class Beranda extends BaseController
{
  public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
      // return view('auth/login');
      return view('beranda');
    }
    public function coba(){
      $files    =glob(FCPATH.'\foto\foto_verdi sasmeka2.png');
foreach ($files as $file) {
    if (is_file($file))
    unlink($file); // hapus file
}
    }
    public function coba2(){
      return view('auth/reset');
    }
    public function ubahprofil()
    {
      $id = $this->request->getPost("id");
      $fullname = $this->request->getPost("fullname");
      $username = $this->request->getPost("username");
      $email = $this->request->getPost("email");
      $jabatan = $this->request->getPost("jabatan");

      $ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['foto']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];	
 
      if(is_null($nama)){
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, FCPATH.'\foto\foto_'.$nama);
					$query = $this->db->query("UPDATE users SET jabatan=$jabatan,username='$username', fullname='$fullname', email='$email', image='foto_$nama' where id=$id");
					if($query){
						session()->setFlashdata("pesan", "Informasi Profil Berhasil Diperbarui");
					}else{
						session()->setFlashdata("pesan-danger", "Gagal Upload Foto");
					}
				}else{
					session()->setFlashdata("pesan-danger", "Ukuran File Terlalu Besar");
				}
			}else{
				session()->setFlashdata("pesan-danger", "Extensi File Tidak Diperbolehkan");
			}
    }else{
      $this->db->query("UPDATE users SET jabatan='$jabatan',username='$username', fullname='$fullname', email='$email' where id=$id");
      session()->setFlashdata("pesan", "Informasi Profil Berhasil Diperbarui");
    }
      return redirect()->to('/');
    }
    public function ubahsosmed()
    {
      $id = $this->request->getPost("id");
      $instagram = $this->request->getPost("instagram");
      $twitter = $this->request->getPost("twitter");
      $github = $this->request->getPost("github");
      $linkedin = $this->request->getPost("linkedin");
      $portofolio = $this->request->getPost("portofolio");
      $this->db->query("UPDATE users SET instagram='$instagram',twitter='$twitter',github='$github',linkedin='$linkedin',portofolio='$portofolio' WHERE id=$id");
      session()->setFlashdata("pesan", "Data Sosial Media Berhasil Diubah.");
      return redirect()->to('/');
    }

}
