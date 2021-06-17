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
                        Olá {{ $user->name }}, clique aqui para validar seu registro 
                    </p>

                    <a href="{{ 'http://localhost:8080/email-verification/' . $user->id }}" style="text-decoration: none; color: #FFF; outline: none; border: 0; border-radius: 4px; cursor: pointer; background-color: #208fcf; padding: 0.8rem 2rem; font-family: sans-serif; font-size: 18px; font-weight: normal; text-align:center; margin: 0">
                        Verificar e-mail
                    </a>
                </th>
            </tr>
        </tbody>
    </table>
@endsection