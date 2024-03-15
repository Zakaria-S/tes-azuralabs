# Software Engineer Intern in Azuralabs by Muhamad Zakaria Saputra 
<p>Ini adalah hasil pengerjaan tes Software Engineer Intern di Azuralabs oleh Muhamad Zakaria Saputra.</p>
<p>Tes ini dikerjakan menggunakan Framework Laravel dengan dependency sebagai berikut:</p>

### Dependency
<p></p>PHP >= 8</p>
<p>MariaDB >= 10</p>
<p>Composer</p>

## Cara menjalankan projek ini
<p>Pastikan semua dependency telah terinstall dan pastikan MariaDB mu menyala</p>
<p>Jika sudah, maka jalankan perintah</p>

```bash
git clone https://github.com/Zakaria-S/tes-azuralabs.git
cd tes-azuralabs
```
lalu jalankan perintah di bawah ini<br>

```bash
copy .env.example .env
composer install
```
<p>setelah itu jalankan perintah di bawah ini dengan berurutan</p>

```bash
php artisan storage:link
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=BookSeeder
```
Setelah itu jalankan projek ini dengan perintah:

```bash
php artisan serve
```
<p>Secara default projek ini akan berjalan di</p>
<p>http://localhost:8000</p>
<p>Anda akan disuguhkan dengan formulir login</p>
<p>Isi email dan passwordnya dengan data sebagai berikut:</p>
<p>Email: admin@example.com</p>
<p>Password: 1234567890</p>

<p>Setelah login, anda akan disuguhkan dengan data buku</p>
