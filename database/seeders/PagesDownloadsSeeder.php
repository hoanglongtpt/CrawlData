<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagesDownloadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pages_downloads')->insert([
            [
                'link_login' => 'https://motionarray.com/',
                'name' => 'Motion Array',
                'image' => 'assets-theme/img/logo/MotionArray.png',
                'type' => 'motion-array',
                'amount' => 1000,
                'user_name_login' => 'conganvinhlong02@gmail.com',
                'password_login' => 'Quy0799008160',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_login' => 'https://elements.envato.com/',
                'name' => 'Envato',
                'image' => 'assets-theme/img/logo/evanto.ico',
                'type' => 'envato',
                'amount' => 1000,
                'user_name_login' => 'quyxp139@myduca.edu.vn',
                'password_login' => '^rR^jUi3aQEM2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_login' => 'https://www.freepik.com/',
                'name' => 'FreePik',
                'image' => 'assets-theme/img/logo/Freepik.png',
                'type' => 'freepik',
                'amount' => 1000,
                'user_name_login' => 'conganvinhlong02@gmail.com',
                'password_login' => 'Quy0799008160',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_login' => 'https://www.youtube.com/',
                'name' => 'Youtube',
                'image' => 'assets-theme/img/logo/youtube.png',
                'type' => 'youtube',
                'amount' => 0,
                'user_name_login' => '',
                'password_login' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_login' => 'https://artlist.io/',
                'name' => 'Artlist',
                'image' => 'assets-theme/img/logo/artlist.png',
                'type' => 'artlist',
                'amount' => 0,
                'user_name_login' => '',
                'password_login' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_login' => 'https://vn.pikbest.com/',
                'name' => 'Pikbest',
                'image' => 'assets-theme/img/logo/pikbest.png',
                'type' => 'pikbest',
                'amount' => 1000,
                'user_name_login' => '',
                'password_login' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_login' => 'https://tiktok.com/',
                'name' => 'Tiktok',
                'image' => 'assets-theme/img/logo/tiktok.png',
                'type' => 'tiktok',
                'amount' => 1000,
                'user_name_login' => '',
                'password_login' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
