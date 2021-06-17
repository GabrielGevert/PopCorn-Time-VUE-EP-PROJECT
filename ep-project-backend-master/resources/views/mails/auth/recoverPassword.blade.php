@extends('mails.template.email-default')

@section('preheader')
    Código de acesso
@stop

@section('content')
    <table>
        <tbody>
            <tr>
                <th>
                    <p style="font-family: sans-serif; font-size: 18px; font-weight: normal; text-align:center; margin: 0; Margin-bottom: 20px; color:#354e64;">
                        Olá {{ $user->name }}, clique aqui para criar uma nova senha
                    </p>

                    <a href="{{ 'http://localhost:8080/create-new-password/' . $user->id }}" style="text-decoration: none; color: #FFF; outline: none; border: 0; border-radius: 4px; cursor: pointer; background-color: #208fcf; padding: 0.8rem 2rem; font-family: sans-serif; font-size: 18px; font-weight: normal; text-align:center; margin: 0">
                        Criar nova senha
                    </a>
                </th>
            </tr>
        </tbody>
    </table>
@endsection