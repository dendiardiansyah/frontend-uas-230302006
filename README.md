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
composer create-project laravel/laravel nama-project "10.*"
```

### 2. Install Controller
* buat controller mahasiswa melalui terminal dengan prompt :
```
php artisan make:controller MahasiswaController --resource
```
* buat controller matkul melalui Terminal dengan prompt :
```
php artisan make:controller MatkulController --resource
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
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('index');
});

Route::get('matkul', [matkulController::class, 'index'])->name('matkul.index');
Route::post('matkul', [matkulController::class, 'store']);
Route::get('matkul/edit/{id}', [matkulController::class, 'edit'])->name('matkul.edit');
Route::put('matkul/update/{id}', [matkulController::class, 'update'])->name('matkul.update');
Route::delete('matkul/delete/{id}', [matkulController::class, 'destroy'])->name('matkul.destroy');


Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

```

### 6. Buat tampilan
* buat tampilan di mahasiswa `index` dan matkul `index` di `resources.views.<Folder Mahasiswa atau Dosen>`

### 7. Jalankan Server Development

```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`


Gunakan Postman untuk mengetes endpoint berikut:

#### Matkul

* `GET` → `http://localhost:8080/matkul`
* `POST` → `http://localhost:8080/matkul`
* `PUT` → `http://localhost:8080/matkul/{id}`
* `DELETE` → `http://localhost:8080/matkul/{id}`

#### Mahasiswa

* `GET` → `http://localhost:8080/mahasiswa`
* `POST` → `http://localhost:8080/mahasiswa`
* `PUT` → `http://localhost:8080/mahasiswa/{id}`
* `DELETE` → `http://localhost:8080/mahasiswa/{id}`


