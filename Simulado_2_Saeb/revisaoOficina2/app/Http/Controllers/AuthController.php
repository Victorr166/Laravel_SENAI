<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! $this->passwordIsValid($user->senha, $credentials['password'])) {
            return back()->withErrors(['email' => 'E-mail ou senha inválidos.'])->onlyInput('email');
        }

        $storedPassword = $user->getRawOriginal('senha');
        $passwordInfo = password_get_info($storedPassword);
        $isLegacyHash = $passwordInfo['algoName'] === 'unknown';
        $needsRehash = $isLegacyHash || $passwordInfo['algoName'] !== 'bcrypt'
            || Hash::needsRehash($storedPassword);

        if ($needsRehash) {
            $user->forceFill([
                'senha' => Hash::make($credentials['password']),
            ])->save();
        }

        Auth::login($user);
        $request->session()->regenerate();
        $request->session()->put('last_activity_at', now()->timestamp);

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function passwordIsValid(string $storedPassword, string $submittedPassword): bool
    {
        if (password_get_info($storedPassword)['algoName'] !== 'unknown') {
            return password_verify($submittedPassword, $storedPassword);
        }

        if (! preg_match('/\A[a-f0-9]{64}\z/i', $storedPassword)) {
            return false;
        }

        return hash_equals(
            strtolower($storedPassword),
            hash('sha256', $submittedPassword),
        );
    }
}