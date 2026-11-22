# Lab8Web.
Tugas Post Test Praktikum 8


# Lab8Web – Praktikum 8: PHP dan Database MySQL

| | |
|---|---|
| **Nama** | Siti Faiqoh Almarufi |
| **NIM** | 312510168 |
| **Program Studi** | Teknik Informatika |
| **Mata Kuliah** | Pemrograman Web OBE |

## Tujuan Praktikum
1. Memahami konsep dasar database.
2. Memahami konsep dasar CRUD menggunakan PHP.
3. Membuat program CRUD sederhana menggunakan PHP dan MySQL.

## Struktur Proyek
```
Lab8Web/
├── latihan1.sql                 # script database, tabel, dan data contoh
├── README.md
├── screenshots/                 # taruh screenshot di sini
└── lab8_php_database/
    ├── koneksi.php              # koneksi ke database
    ├── index.php                # Read   – menampilkan data
    ├── tambah.php               # Create – menambah data
    ├── ubah.php                 # Update – mengubah data
    ├── hapus.php                # Delete – menghapus data
    ├── style.css                # tampilan halaman
    └── gambar/                  # folder penyimpanan gambar upload
```

## Langkah-langkah Praktikum

### 1. Menjalankan MySQL Server
Buka **XAMPP Control Panel**, lalu klik **Start** pada modul **Apache** dan **MySQL**.


### 2. Mengakses phpMyAdmin
Buka `http://localhost/phpmyadmin/` di browser. phpMyAdmin dipakai sebagai MySQL client untuk membuat database dan tabel.


### 3. Membuat Database
Pada tab **SQL**, jalankan:
```sql
CREATE DATABASE latihan1;
```


### 4. Membuat Tabel `data_barang`
Pilih database `latihan1`, lalu jalankan:
```sql
CREATE TABLE data_barang (
  id_barang int(10) auto_increment Primary Key,
  kategori varchar(30),
  nama varchar(50),
  gambar varchar(100),
  harga_beli decimal(10,0),
  harga_jual decimal(10,0),
  stok int(4)
);
```


### 5. Menambahkan Data Contoh
```sql
INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
VALUES ('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);
```


### 6. Membuat Folder Proyek
Buat folder `lab8_php_database` di dalam `htdocs` (contoh: `C:\xampp\htdocs\lab8_php_database`). Folder `gambar` dibuat di dalamnya untuk menyimpan gambar barang. Proyek diakses lewat `http://localhost/lab8_php_database/`.


### 7. Membuat File Koneksi (`koneksi.php`)
File ini menghubungkan PHP dengan database `latihan1` menggunakan `mysqli_connect()` (host `localhost`, user `root`, password kosong). Jika koneksi gagal, ditampilkan pesan "Koneksi ke server gagal.". Untuk menguji koneksi, hapus tanda `#` pada baris `else echo "Koneksi berhasil";`, lalu buka `koneksi.php` di browser.


### 8. Menampilkan Data – Read (`index.php`)
File ini meng-*include* `koneksi.php`, menjalankan `SELECT * FROM data_barang`, lalu menampilkan hasilnya dalam tabel menggunakan `mysqli_fetch_array()`. Di setiap baris tersedia link **Ubah** dan **Hapus**, dan di atas tabel ada link **Tambah Barang**.


### 9. Menambah Data – Create (`tambah.php`)
Form berisi nama, kategori, harga jual, harga beli, stok, dan file gambar (`enctype="multipart/form-data"`). Saat tombol **Simpan** ditekan, gambar dipindahkan ke folder `gambar/` dengan `move_uploaded_file()`, data disimpan dengan query `INSERT INTO`, lalu halaman diarahkan kembali ke `index.php`.


### 10. Mengubah Data – Update (`ubah.php`)
Data lama diambil berdasarkan `id` dari URL (`ubah.php?id=...`) dan ditampilkan di form. Setelah disimpan, query `UPDATE` dijalankan. Gambar hanya diganti jika pengguna memilih file baru.


### 11. Menghapus Data – Delete (`hapus.php`)
Data dihapus dengan query `DELETE FROM data_barang WHERE id_barang = ...` berdasarkan `id` dari URL, lalu diarahkan kembali ke `index.php`. Di `index.php` ada konfirmasi sebelum data dihapus.


## Perbaikan dari Kode Modul
Beberapa bagian pada kode modul disesuaikan agar program berjalan benar:

- `index.php`: ditambah link **Tambah Barang**, link **Ubah** dan **Hapus** di kolom Aksi, serta urutan header Harga Beli dan Harga Jual disesuaikan dengan datanya.
- `ubah.php`: `enctype="multipart/formdata"` diperbaiki menjadi `multipart/form-data`, dan opsi kategori memakai nilai pembanding yang benar (sebelumnya semua memakai `'Komputer'`).
- Penyimpanan gambar: yang disimpan di database hanya nama file, sehingga cocok dengan data contoh dan path `gambar/` di `index.php`.
- Input dari form di-*escape* (`mysqli_real_escape_string` dan konversi `(int)`) untuk mengurangi risiko SQL Injection.
- `style.css` ditambahkan karena dipanggil semua halaman tetapi tidak disertakan di modul.

## Cara Menjalankan
1. Jalankan Apache dan MySQL di XAMPP.
2. Import `latihan1.sql` lewat phpMyAdmin (tab **Import**), atau jalankan langkah 3 sampai 5 secara manual.
3. Salin folder `lab8_php_database` ke `htdocs`.
4. Buka `http://localhost/lab8_php_database/`.
5. Taruh gambar `hp_samsung.jpg`, `hp_xiaomi.jpg`, dan `hp_oppo.jpg` di folder `gambar/` agar gambar data contoh tampil.
