<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Dotenv\Validator;
use App\Models\CreditCard;
use Illuminate\Http\Request;
use App\Mail\RecoverPassword;
use App\Mail\RegisterValidation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function register(Request $request)
    {
        $user = $request->user;
        $card = $request->creditCard;

        if (User::where('email', $user['email'])->first()) { 
            return response()->json([
                'error' => 'Email já existe'
            ]);
        }

        // $cpf_valid = $card->validate(['cpf' => ['required', new FormatoCpf]]);

        // if (!$cpf_valid) { 
        //     return response()->json([
        //         'error' => 'CPF inválido'
        //     ]);
        // }

        if (CreditCard::where('number', $card['number'])->first()) { 
            return response()->json(['error' => 'Cartão já cadastrado']);
        }
        
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);

        $card['user_id'] = $user->id;
        CreditCard::create($card);

        Mail::to($user['email'])->send(new RegisterValidation($user));

        return response()->json([
            'success' => 'Usuário registrado com sucesso'
        ]);
    }

    public function validateEmail(Request $request)
    {   
        $id = $request->token;

        User::where('id', $id)->update(['email_verified_at' => now()]);
    }

    public function login(Request $request)
    {
        $allUsers = User::all();
        $user = $allUsers->where('email', $request->email)->first();

        if (!$user) { 
            return response()->json(['error' => 'Usuário não encontrado']);
        }

        if (!$user->email_verified_at) { 
            return response()->json(['error' => 'E-mail não verificado']);
        }

        if (password_verify($request->password, $user->password)) { 
            return response()->json(['success' => $user]);
        } else { 
            return response()->json(['error' => 'Senha incorreta']);
        }

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) { 
        //     return response()->json(['success' => Auth::user(), 200]);
        // } else { 
        //     return response()->json(['error' => 'Login recusado']);
        // }
    }

    public function recoverPassword(Request $request)
    {  
        $allUsers = User::all();
        $user = $allUsers->where('email', $request->email)->first();
        $email = $request;

        if (!$user) { 
            return response()->json(['error' => 'E-mail inválido']);
        }

        if (!$request) { 
            return response()->json(['error' => 'E-mail inválido']);
        }

        Mail::to($email)->send(new RecoverPassword($user));
        return response()->json(['success' => $user]);
    }

    public function createNewPassword(Request $request)
    { 
        $userId = $request->user;
        $newPassword = $request->password;
        $user = User::whereId($userId)->firstOrFail();

        if (!$user) { 
            return response()->json(['error' => 'E-mail inválido']);
        }

        $user->update([
            'password' => Hash::make($newPassword)
        ]);

        return response()->json(['success' => $user]);
    }

    public function logout()
    { 
        Auth::logout();
    }

    public function getUser(User $user) { 
        if (!$user) { 
            return response()->json(['error' => 'Usuário não encontrado']);
        }

        return response()->json([
            'success' => $user
        ]);
    }

    public function getCreditCard(User $user) { 
        $creditCards = CreditCard::all();

        return response()->json([
            'success' => $creditCards->where('user_id', $user->id)->first()
        ]);
    }

    public function changeCreditCard(Request $request, User $user) { 
        $creditCard = CreditCard::where('user_id', $user->id)->update($request->credit_card);

        return response()->json([
            'success' => $creditCard
        ]);
    }

    public function addFavoriteMovie(Request $request, User $user) { 
        if (!$user) { 
            return response()->json(['error' => 'Usuário não encontrado']);
        }

        $user->update([
            'is_favorite' => $request->movies
        ]);

        return response()->json([
            'success' => $user
        ]);
    }
}
