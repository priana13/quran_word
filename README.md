
## Quran Word

Aplikasi untuk belajar menghafal Kosa Kata Al-Quran mulai dari yang termudah


## Install

`git clone https://github.com/priana13/quran_word.git`

cd quran_word

`composer install`

`cp .env-example .env`

// pastikan sudah buat database misal nya quran_word kemudian sesuaikan settingan di .env

`php artisan migrate --seed`

`php artisan serve`

// kemudian bisa diakses di url : http://127.0.0.1:8000


