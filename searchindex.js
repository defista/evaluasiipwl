// search index for WYSIWYG Web Builder
var database_length = 0;

function SearchPage(url, title, keywords, description)
{
   this.url = url;
   this.title = title;
   this.keywords = keywords;
   this.description = description;
   return this;
}

function SearchDatabase()
{
   database_length = 0;
   this[database_length++] = new SearchPage("index.php", "e-Evaluasi IPWL Login", " ", "");
   this[database_length++] = new SearchPage("admin.php", "e-Evaluasi IPWL Admin", " ", "");
   this[database_length++] = new SearchPage("Login-Error.html", "e-Evaluasi IPWL Login Error", "Tidak Dapat Login, Silahkan Cek ID dan Password Yang Anda Masukan   ", "");
   this[database_length++] = new SearchPage("akses-ditolak.html", "e-Evaluasi IPWL Login Error", "Anda Tidak Memiliki Izin Untuk Mengakses Halaman Ini   ", "");
   this[database_length++] = new SearchPage("Home-Page.php", "e-Evaluasi IPWL Beranda", " ", "");
   this[database_length++] = new SearchPage("Search-Profile.php", "Cari Profile IPWL", "PILIH NAMA IPWL  PROFIL IPWL   ", "");
   this[database_length++] = new SearchPage("Profile-View.php", "Profil IPWL", "PROFIL IPWL  Nama IPWL  Alamat IPWL   Jumlah SDM  - Staff  - Konselor  - Pekerja Sosial  - SDM Lainnya   Akta Notaris yang menyebutkan adanya pelayanan RSKPN  Nomor Rekening Bank Atas Nama Lembaga  Akta Legalitas Kementerian Hukum dan Hak Asasi Manusia  Rekomendasi Dinsos Provinsi untuk menjadi IPWL Kementerian Sosial  Izin dari Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  PMTSP  / Izin Operasional dari Dinsos Kab/Kota  Hasil Akreditasi dari BALK Pusbangprof   ", "");
   this[database_length++] = new SearchPage("Profile-Input.php", "Input Profile IPWL", "PROFIL INPUT  Akta Notaris yang menyebutkan adanya pelayanan RSKPN  Nomor Rekening Bank Atas Nama Lembaga  Akta Legalitas Kementerian Hukum dan Hak Asasi Manusia  Izin dari Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu  PMTSP  / Izin Operasional dari Dinsos Kab/Kota  Hasil Akreditasi dari BALK Pusbangprof  Rekomendasi Dinsos Provinsi untuk menjadi IPWL Kementerian Sosial   ", "");
   this[database_length++] = new SearchPage("Konselor-Input.php", "SDM Input", "EDIT PROFIL SDM   ", "");
   this[database_length++] = new SearchPage("SDM-view.php", "SDM View", "Profil SDM  PILIH NAMA IPWL  PILIH STATUS SDM  PILIH NAMA SDM   ", "");
   this[database_length++] = new SearchPage("Akreditasi-IPWL.php", "View Akreditasi IPWL", "PILIH NAMA IPWL  Akreditasi IPWL   ", "");
   this[database_length++] = new SearchPage("Input-Kegiatan.php", "Kegiatan Input", "Input Kegiatan Rehabilitasi   ", "");
   this[database_length++] = new SearchPage("View-Kegiatan.php", "Kegiatan View", "VIEW KEGIATAN REHABILITASI   ", "");
   this[database_length++] = new SearchPage("Input-Alur.php", "Input Alur", "INPUT & UPDATE ALUR PELAYANAN   ", "");
   this[database_length++] = new SearchPage("Search-Alur.php", "View Alur", "SEARCH ALUR PELAYANAN  PILIH NAMA IPWL   ", "");
   this[database_length++] = new SearchPage("View-Inap.php", "View Inap", "VIEW LAPORAN RAWAT INAP   ", "");
   this[database_length++] = new SearchPage("View-Jalan.php", "View Jalan", "VIEW LAPORAN RAWAT JALAN   ", "");
   this[database_length++] = new SearchPage("view-after.php", "View After", "VIEW LAPORAN AFTER CARE   ", "");
   this[database_length++] = new SearchPage("input-inap.php", "Rawat Inap Input", "INPUT LAPORAN KEUANGAN RAWAT INAP   ", "");
   this[database_length++] = new SearchPage("input-jalan.php", "Rawat Jalan Input", "INPUT LAPORAN KEUANGAN RAWAT JALAN   ", "");
   this[database_length++] = new SearchPage("input-after.php", "After Care Input", "INPUT LAPORAN KEUANGAN AFTERCARE   ", "");
   this[database_length++] = new SearchPage("view-bnba.php", "View Data BNBA", "VIEW BNBA PPKS KPN DI IPWL  Provinsi  Metode Yang Digunakan  Nama Lembaga   BRSKPN GALIH PAKUAN Bogor  Jawa Barat  Therapeutic Community  Tahun                   2020   NO               NAMA PPKS KPN               ", "");
   this[database_length++] = new SearchPage("input-bnba.php", "Input Data BNBA", "INPUT BNBA PPKS KPN DI IPWL  Tahun   ", "");
   this[database_length++] = new SearchPage("rekap-evaluasi.php", "Rekapitulasi Data Evaluasi IPWL", "REKAPITULASI DATA HASIL EVALUASI IPWL  Nama IPWL  Alamat IPWL   Nomor Telepon  Ketua IPWL  Program Manager IPWL  Kapasitas Rawat Inap  Aspek Peniliaian  1 2 3 4 5 6 7 8 9 10 dst  PILIH NAMA IPWL  Nilai Kredit  1 3 1 3 1 1 2 2 1 2 dst  TOTAL NILAI   AKREDITASI  Nama IPWL  Alamat IPWL   Nomor Telepon  Ketua IPWL  Program Manager IPWL  Kapasitas Rawat Inap  Aspek Peniliaian  1 2 3 4 5 6 7 8 9 10 dst  Nilai Kredit  1 3 1 3 1 1 2 2 1 2 dst  TOTAL NILAI   AKREDITASI  Nama IPWL  Alamat IPWL   Nomor Telepon  Ketua IPWL  Program Manager IPWL  Kapasitas Rawat Inap  Aspek Peniliaian  1 2 3 4 5 6 7 8 9 10 dst  Nilai Kredit  1 3 1 3 1 1 2 2 1 2 dst  TOTAL NILAI      37   AKREDITASI      A  BRSKPN Galih Pakuan Bogor  Jl.H Miing No.71, Desa Putat Nutug,Kecamataan  Ciseeng, Kabupaten Bogor   0251  - xxxxxxx  Wahidin  Yoyok Dwi Hertanto  150 PPKS   ", "");
   this[database_length++] = new SearchPage("Input-SDM-lain.php", "SDM Input", "Edit Profil SDM Lainnya   ", "");
   this[database_length++] = new SearchPage("kegiatan-rajal.php", "e-Evaluasi IPWL Beranda", "Input Kegiatan Rehabilitasi Jalan   ", "");
   this[database_length++] = new SearchPage("kegiatan-ranap.php", "e-Evaluasi IPWL Beranda", "Input Pelaksanaan Kegiatan Rehabilitasi Inap   ", "");
   this[database_length++] = new SearchPage("kegiatan-aftercare.php", "e-Evaluasi IPWL Beranda", "Input Kegiatan Aftercare   ", "");
   this[database_length++] = new SearchPage("Laporan-Kegiatan.php", "e-Evaluasi IPWL Beranda", " ", "");
   this[database_length++] = new SearchPage("Kegiatan-Search.php", "Cari Profile IPWL", "PILIH NAMA IPWL  Cari Kegiatan IPWL   ", "");
   this[database_length++] = new SearchPage("Alur-Rajal.php", "e-Evaluasi IPWL Beranda", "Input Alur Pelayanan   ", "");
   this[database_length++] = new SearchPage("view-alur.php", "View Alur", "ALUR PELAYANAN IPWL    Nama IPWL    ", "");
   this[database_length++] = new SearchPage("search-bnba.php", "View Alur", "SEARCH BNBA PPKS KPN  PILIH NAMA IPWL  TAHUN   ", "");
   this[database_length++] = new SearchPage("bnba-content.php", "View Alur", "DATA PERSONAL PPKS KPN   ", "");
   this[database_length++] = new SearchPage("search-jalan.php", "View Alur", "SEARCH LAPORAN KEUANGAN RAWAT JALAN  PILIH NAMA IPWL  TAHUN  PERIODE   ", "");
   this[database_length++] = new SearchPage("search-inap.php", "View Alur", "PILIH NAMA IPWL  TAHUN  PERIODE  SEARCH LAPORAN KEUANGAN RAWAT INAP   ", "");
   this[database_length++] = new SearchPage("search-aftercare.php", "View Alur", "PILIH NAMA IPWL  SEARCH LAPORAN KEUANGAN AFTERCARE   ", "");
   this[database_length++] = new SearchPage("peringkat.php", "View Alur", "Peringkat IPWL Berdasarkan Nilai Evaluasi   Peringkat                                                            Nama IPWL                                                            Total Point                                                            Nilai Akrerditasi Kelayakan                                                            ", "");
   return this;
}
