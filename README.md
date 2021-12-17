

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How To Install API

Untuk menginstall API ini kalian harus menggunakan laravel yang sudah terinstall di PC masing - masing, jika sudah terinstall silahkan ikuti guide menggunakan API ini :

- Silahkan taruh di dalam folder htdocs, setelah itu silahkan buat database di mysql dan beri nama recipes_api
- Buka cmd di folder project kalian dan ketikkan php artisan migrate, setelah sukses selanjutnya jalankan laravel dengan mengetikkan command php artisan serve
- silahkan gunakan aplikasi untuk membaca API nya, setelah masuk silahkan masukkan link 127.0.0.1:8000/api/register dengan perintah POST. untuk body silahkan pilih form data dan masukkan KEY : nama, email dan password dan untuk valuenya masukkan sesuai keinginan kalian. setelah itu klik send. jika sudah maka akan terbentuk akses tokennya.
- Silahkan masukkan link 127.0.0.1:8000/api/login dan masukkan tokennya dengan format bearer token dengan perintah POST lalu klik send.
- silahkan masukkan link 127.0.0.1:8000/api/profile untuk melihat profile user
- Silahkan masukkan link 127.0.0.1:8000/api/recipe untuk meng add recipe, tambahkan body dengan key : name, description dan author_id lalu isi valuenya sesuai keingin user
- Silahkan masukkan link 127.0.0.1:8000/api/Ingredient untuk meng add Ingredient, tambahkan body dengan key : name, color dan img lalu isi valuenya sesuai keingin user
- Silahkan masukkan link 127.0.0.1:8000/api/stepRecipe untuk meng add stepRecipe, tambahkan body dengan key : recipe_id, step_number, description, timer dan image lalu isi valuenya sesuai keingin user
