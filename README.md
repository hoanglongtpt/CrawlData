<!-- setup source -->
tải php cải ở locall
tải composer về và cài locall
setup môi trường PHP (laragon) -> cài laragon
Truy cập thư mục laragon/www và clone dự án ở thư mục này
setup database php myadmin ở laragon có sẵn và cấu hình trong env của source

vào dự án mở teminal và chạy lệnh:

composer install (lệnh này cài package source)
php artisan migrate
php artisan db:seed
php artisan sweetalert:publish
php artisan ser (chạy dự án)
