<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\UserModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): (\Illuminate\Translation\PotentiallyTranslatedString)  $fail
     */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = $this->request->input('email');
        $password = $this->request->input('password');

        // Validasi input kosong
        if (empty($email) || empty($password)) {
            $fail('Email dan password harus diisi.');
            return;
        }
        // Periksa apakah pengguna ditemukan dan password cocok
        $user = UserModels::where('email', $email)->first();

        // Periksa apakah pengguna ditemukan dan password cocok
        if ($user && Hash::check($password, $user->password)) {
            // Jika login berhasil, simpan data pengguna ke sesi
            Session::put('loginStatus', true);
            Session::put('ambilUser', $user); // Simpan seluruh data pengguna ke sesi
        } else {
            // Jika login gagal, kirim pesan error
            $fail('Email atau password salah.');
        }
    }
}