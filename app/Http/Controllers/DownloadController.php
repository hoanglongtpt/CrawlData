<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Cookie\CookieJar;

class DownloadController extends Controller
{
    private $username = 'your_email@example.com'; // Thay bằng email của bạn
    private $password = 'your_password'; // Thay bằng mật khẩu của bạn

    public function get_download()
    {
        return view('dowlaod');
    }

    public function downloadFile(Request $request)
    {
        $url = $request->input('url'); // Nhận link từ input

        // Khởi tạo GuzzleClient với cookies được bật
        $cookieJar = new CookieJar();
        $guzzleClient = new GuzzleClient([
            'cookies' => $cookieJar,
            'allow_redirects' => true,
        ]);

        // Tạo một phiên bản Goutte Client với Guzzle Client
        $client = new Client();

        // Đăng nhập
        $crawler = $client->request('GET', 'https://elements.envato.com/sign-in');
        dd( $crawler->html());
        // dd($crawler->selectButton('Sign in'));
        $button = $crawler->filter('#sso-forms__submit');
        if ($button->count()) {
            $form = $button->form();
        } else {
            return response()->json(['error' => 'Nút đăng nhập không tìm thấy.']);
        }
        $crawler = $client->submit($form, [
            'email' => $this->username,
            'password' => $this->password,
        ]);

        // Truy cập trang tải xuống
        $crawler = $client->request('GET', $url);

        // Tìm và lấy link tải xuống
        try {
            $downloadLink = $crawler->filter('a.download-button')->attr('href'); // Điều chỉnh selector theo nút download
        } catch (\Exception $e) {
            return response()->json(['error' => 'Không tìm thấy nút tải xuống.']);
        }

        // Kiểm tra và tải xuống file
        if ($downloadLink) {
            $fileContent = $guzzleClient->get($downloadLink)->getBody()->getContents();
            $fileName = basename(parse_url($downloadLink, PHP_URL_PATH));

            file_put_contents(public_path("downloads/{$fileName}"), $fileContent);

            return response()->download(public_path("downloads/{$fileName}"));
        }

        return response()->json(['error' => 'Không tìm thấy link tải xuống.']);
    }
}
