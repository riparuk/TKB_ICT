# simple_mhsw

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini:

1. Clone repository ini ke lokal Anda:
    ```bash
    git clone https://github.com/riparuk/TKB_ICT.git
    ```
2. Navigasi ke direktori proyek aplikasi pendaftaran sederhana nya:
    ```bash
    cd TKB_ICT
    ```
3. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```
4. Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

5. Konfigurasi Database (MySQL):
    - Buka file `.env` dan sesuaikan pengaturan database:
      ```ini
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nama_database
      DB_USERNAME=root
      DB_PASSWORD=
      ```
6. Generate application key:
    ```bash
    php artisan key:generate
    ```
7. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
8. Jalankan server Laravel:
    ```bash
    php artisan serve
    ```
9. Buka browser dan akses `http://localhost:8000`.

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

[🔗 Lihat API Routes (api.php)](simple_mhsw/routes/api.php) atau [🔗 Lihat Web Routes (web.php)](simple_mhsw/routes/web.php) untuk melihat API route lebih lanjut.

[📂 Lihat Implementasi SiswaController](simple_mhsw/app/Http/Controllers/SiswaController.php) untuk melihat implementasi lebih lanjut.
