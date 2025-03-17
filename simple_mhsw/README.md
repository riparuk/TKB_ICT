# simple_mhsw

## Grafik Batang
- Hasil grafik batang yang dibuat dapat dilihat di [grafik_batang.png](../grafik_batang.png).
- Proses pembuatan grafik menggunakan python dapat dilihat di file jupyter [grafik_batang.ipynb](../grafik_batang.ipynb).

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini:

1. Clone repository ini ke lokal Anda:
    ```bash
    git clone https://github.com/riparuk/TKB_ICT.git
    ```
2. Navigasi ke folder repository:
    ```bash
    cd TKB_ICT
    ```
3. Navigasi ke direktori proyek laravel aplikasi pendaftaran sederhana nya (folder simple_mhsw):
    ```bash
    cd simple_mhsw
    ```
4. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```
5. Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

6. Konfigurasi Database (MySQL):
    - Buka file `.env` dan sesuaikan pengaturan database anda:
      ```ini
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nama_database
      DB_USERNAME=root
      DB_PASSWORD=
      ```
7. Generate application key:
    ```bash
    php artisan key:generate
    ```
8. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
9. Jalankan server Laravel:
    ```bash
    php artisan serve
    ```
10. Buka browser dan akses `http://localhost:8000`.

### **📌 Route Web**
| Method | Endpoint | Deskripsi |
|--------|---------|-----------|
| GET | `/` | (redirect to /siswas) |
| GET | `/siswas` | Daftar siswa |
| GET | `/siswas/create` | Form tambah siswa |
| POST | `/siswas` | Simpan data siswa baru |
| GET | `/siswas/{id}/edit` | Form edit siswa |
| PUT | `/siswas/{id}` | Update data siswa |
| DELETE | `/siswas/{id}` | Hapus siswa |

### **📌 Route API**
| Method | Endpoint | Deskripsi |
|--------|---------|-----------|
| GET | `/api/siswas` | Ambil semua siswa |
| POST | `/api/siswas` | Tambah siswa baru |
| GET | `/api/siswas/{id}` | Ambil detail siswa berdasarkan ID |
| PUT | `/api/siswas/{id}` | Update data siswa |
| DELETE | `/api/siswas/{id}` | Hapus siswa |

[🔗 Lihat API Routes (api.php)](routes/api.php) atau [🔗 Lihat Web Routes (web.php)](routes/web.php) untuk melihat API route lebih lanjut.

[📂 Lihat Implementasi SiswaController](app/Http/Controllers/SiswaController.php) untuk melihat implementasi lebih lanjut.

