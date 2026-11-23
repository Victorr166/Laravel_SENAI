<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // ABRIR TELA DE LOGIN
    public function login()
    {
        return view('login');
    }

    // AUTENTICAR USUÁRIO
    public function autenticar(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
        ]);

        $email = $request->email;
        $senha = $request->senha;

        $usuario = User::where('email', $email)->first();

        if ($usuario) {

            $senhaValida = false;

            // Verifica senha criptografada com SHA-256
            if (hash('sha256', $senha) === $usuario->senha) {
                $senhaValida = true;

                // Atualiza para bcrypt após login válido
                $usuario->senha = Hash::make($senha);
                $usuario->save();
            }

            // Verifica senha no formato bcrypt
            elseif (Hash::check($senha, $usuario->senha)) {
                $senhaValida = true;
            }

            if ($senhaValida) {

                $request->session()->regenerate();

                $request->session()->put(
                    'usuario_nome',
                    $usuario->nome
                );

                $request->session()->put(
                    'usuario_id',
                    $usuario->id_usuario
                );

                return redirect('/principal');
            }
        }

        return back()
            ->with('erro', 'E-mail ou senha inválidos.')
            ->withInput($request->only('email'));
    }

    // ENCERRAR SESSÃO
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
