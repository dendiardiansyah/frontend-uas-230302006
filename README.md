# Laravel Frontend - AdminLTE + API CodeIgniter 4

Proyek ini adalah frontend berbasis Laravel yang menggunakan AdminLTE dan mengonsumsi data dari REST API yang dibuat dengan CodeIgniter 4. Proyek ini dibuat untuk memenuhi tugas mata kuliah [nama mata kuliah].

---

## 📦 Teknologi yang Digunakan

- Laravel 10
- AdminLTE 3 (UI Template)
- REST API (CodeIgniter 4 - Backend)

### 1. Install LAravel via Composer

Install Laravel versi 10

```bash
composer create-project laravel/laravel Eval-Laravel10 "10.*"
```

### 2. Install Controller
* buat controller mahasiswa melalui terminal dengan prompt :
```
php artisan make:controller MahasiswaController --resource
```
* buat controller Dosen melalui Terminal dengan prompt :
```
php artisan make:controller DosenController --resource
```

### 3. Konfigurasi Environment

Ubah code `APP_URL=http://localhost` menjadi `APP_URL=http://localhost:8080` 

Edit file `config.services.php` dan tambahkan code :

```
'api' => [
        'base_url' => env('APP_URL'),
    ],
```

### 4. Consume API di Masing Masing-Controller

* consume api di controller, misalnya: `function index` di MahasiswaController : 
    ```
    $response = Http::get(config('services.api.base_url') . '/mahasiswa', [
            'sort_by' => 'id',
            'order' => 'asc'
        ]);
    ```


### 5. Buat Routes untuk masing masing controller dan tampilan
* buka `routes.web.php` lalu buat :

```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('index');
});

Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::post('dosen', [DosenController::class, 'store']);
Route::get('dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('dosen/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');


Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

```

### 6. Buat tampilan
* buat tampilan di mahasiswa `index` dan dosen `index` di `resources.views.<Folder Mahasiswa atau Dosen>`

### 7. Jalankan Server Development

```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`


Gunakan Postman untuk mengetes endpoint berikut:

#### Dosen

* `GET` → `http://localhost:8080/dosen`
* `POST` → `http://localhost:8080/dosen`
* `PUT` → `http://localhost:8080/dosen/{id}`
* `DELETE` → `http://localhost:8080/dosen/{id}`

#### Mahasiswa

* `GET` → `http://localhost:8080/mahasiswa`
* `POST` → `http://localhost:8080/mahasiswa`
* `PUT` → `http://localhost:8080/mahasiswa/{id}`
* `DELETE` → `http://localhost:8080/mahasiswa/{id}`


