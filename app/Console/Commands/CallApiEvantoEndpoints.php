<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CallApiEvantoEndpoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:call-api-evanto-endpoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gọi login lần lượt envato!';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Danh sách các API cần gọi
        $endpoints = [
            'http://14.225.255.75:5000/login-envato/1',
            'http://14.225.255.75:5000/login-envato/2',
            'http://14.225.255.75:5000/login-envato/3',
        ];

        // Gọi từng endpoint và kiểm tra kết quả
        foreach ($endpoints as $endpoint) {
            $response = Http::get($endpoint);

            if ($response->successful() && $response->json('code') === 200) {
                $this->info("Đăng nhập thành công tại: {$endpoint}");
            } else {
                $errorCode = $response->json('code', 'Không xác định');
                $this->error("Đăng nhập thất bại tại {$endpoint} với mã lỗi: {$errorCode}");
            }
        }

        return Command::SUCCESS;
    }
}
