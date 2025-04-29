<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth; // Pastikan mengimpor Auth

class UserActivityLogged
{
    use Dispatchable, SerializesModels;

    public $user; 
    public $postdate;
    public $page;
    public $method;
    public $ip;
    public $requestBody;
    public $errors;

    public function __construct($postdate, $page, $method, $ip, $requestBody, $errors)
    {
        // Ambil username dari pengguna yang sedang login
        $this->user = Auth::user() ? Auth::user()->username : null;

        // Pastikan postdate sudah dalam format datetime yang benar
        $this->postdate = $postdate; // Biasanya, gunakan now() atau waktu yang sesuai

        $this->page = $page;
        $this->method = $method;
        $this->ip = $ip;
        $this->requestBody = $this->sanitizeRequestBody($requestBody);
        $this->errors = $errors;
    }


    // Fungsi untuk menghapus password dan token dari request body
    private function sanitizeRequestBody($requestBody)
    {
        if (is_array($requestBody)) {
            // Menghapus password dan token dari array
            unset($requestBody['password']);
            unset($requestBody['_token']);
        } elseif (is_object($requestBody)) {
            // Menghapus password dan token dari objek
            unset($requestBody->password);
            unset($requestBody->_token);
        }

        return json_encode($requestBody); // Kembalikan setelah disanitasi
    }
}
