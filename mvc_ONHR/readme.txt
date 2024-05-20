
Penjelasan Proyek: Online Nurse Hiring System dengan PHP
Pendahuluan
Proyek "Online Nurse Hiring System" adalah sebuah aplikasi berbasis web yang dirancang untuk memfasilitasi proses perekrutan perawat secara online. Aplikasi ini dibangun menggunakan bahasa pemrograman PHP dan mengimplementasikan pola desain Model-View-Controller (MVC) untuk meningkatkan keteraturan dan skalabilitas kode.

Tujuan Proyek
Mempermudah Proses Perekrutan: Menyediakan platform yang memudahkan rumah sakit atau klinik untuk menemukan dan merekrut perawat.
Aksesibilitas: Memberikan kemudahan bagi perawat untuk melamar pekerjaan secara online.
Efisiensi: Mengurangi waktu dan biaya yang diperlukan dalam proses perekrutan manual.
Arsitektur MVC
Pola desain MVC membagi aplikasi menjadi tiga komponen utama:

Model: Bertanggung jawab atas logika bisnis dan interaksi dengan basis data. Model mengelola data dan aturan yang diperlukan untuk berinteraksi dengan sistem.
View: Mengatur antarmuka pengguna dan presentasi data. View menerima data dari Controller dan menampilkan informasi kepada pengguna.
Controller: Berfungsi sebagai penghubung antara Model dan View. Controller menerima input dari pengguna melalui View, memprosesnya melalui Model, dan kemudian mengirimkan hasilnya kembali ke View.


untuk Menjalankan Proyek Online-Nurse-Hiring-System-PHP (ONHS)
-Unduh file zip
-Ekstrak file tersebut dan salin folder onhs
-Tempelkan ke dalam direktori root (untuk XAMPP: xampp/htdocs, untuk WAMP: wamp/www, untuk LAMP: var/www/HTML)
-Buka PHPMyAdmin (http://localhost/phpmyadmin)
-Buat database dengan nama onhsdb
-Impor file rtbsdb.sql (terletak di dalam paket zip di folder SQL file)
-Jalankan skrip http://localhost/onhs