
# User Activity Log for Laravel
![image](https://github.com/user-attachments/assets/94a61cdb-730f-4965-b723-5a8582486c23)


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

##

## 🗂 Struktur yang Dipublish

- `app/Events/` – Event untuk mencatat aktivitas
- `app/Http/Middleware/` – Middleware pencatat aktivitas
- `app/Listeners/` – Listener event
- `app/Models/` – Model yang digunakan
- `database/migrations/` – Tabel log aktivitas pengguna
  
## ⚙️ Konfigurasi Middleware
Jika kamu menggunakan Laravel berbasis bootstrap/app.php (seperti Lumen atau Laravel Zero), tambahkan middleware berikut:

```bash
$middleware->web(append: [
    \App\Http\Middleware\LogUserActivityMiddleware::class,
]);
```
Untuk Laravel standar (dengan Http/Kernel.php), tambahkan di $middlewareGroups['web'].

## 📝 Lisensi

MIT © 2024 Ken Dianto (@xiztkie)


