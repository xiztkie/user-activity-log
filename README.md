Berikut contoh `README.md` untuk package **User Activity Log** buatanmu:

---

```md
# User Activity Log for Laravel

![License](https://img.shields.io/badge/license-MIT-blue.svg)

**User Activity Log** adalah package Laravel untuk mencatat aktivitas pengguna secara otomatis, seperti login, logout, akses halaman, dan lainnya.

## 🔧 Instalasi

```bash
composer require epenthink/user-activity-log
```

## 📦 Publish Resource

Jalankan perintah berikut untuk mem-publish file konfigurasi, migration, dan resource lainnya:

```bash
php artisan vendor:publish --provider="epenthink\UserActivityLog\Providers\ActivityLogServiceProvider" --tag=app
php artisan vendor:publish --provider="epenthink\UserActivityLog\Providers\ActivityLogServiceProvider" --tag=migrations
```

## 🗂 Struktur yang Dipublish

- `app/Events/` – Event untuk mencatat aktivitas
- `app/Http/Middleware/` – Middleware pencatat aktivitas
- `app/Listeners/` – Listener event
- `app/Models/` – Model yang digunakan
- `database/migrations/` – Tabel log aktivitas pengguna

## 🧪 Contoh Penggunaan

```php
activity()->log('User melakukan aksi tertentu');
```

> Tambahkan logging secara manual jika dibutuhkan atau biarkan sistem otomatis mendeteksi aktivitas.

## 🧠 Konfigurasi

Jika disediakan file konfigurasi, kamu bisa menyesuaikannya di `config/activitylog.php` setelah dipublish.

## 🧼 Uninstall

Untuk menghapus, cukup hapus folder `vendor/epenthink/user-activity-log` dan file yang telah dipublish (tidak otomatis terhapus).

## 🧑‍💻 Kontribusi

Pull request dan issue sangat diterima! Silakan fork project ini dan kirim kontribusimu.

## 📝 Lisensi

MIT © 2024 Ken Dianto (@xiztkie)
```

---

Ingin ditambahkan contoh event atau middleware lebih lanjut juga?
