@extends('layout')


<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Usuários</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/display-block.scss') }}">
        
        <style>
                body .form-group{
                    width : 35rem;
                    margin-left:2rem;
                    margin-top:4rem;
                    margin: 0 auto;
                }

                body .form-group input, body .form-group select{
                    border-radius:3rem;
                }

                body .header{
                    background-color:#2969e0;
                    height: 6rem;
                    margin-bottom:2rem;
                    display:flex;
                    color:white;
                    font-family:'Roboto', sans-serif;
                }

                body .header .title{
                    display:flex;
                    justify-content:center;
                    align-items: center;
                    margin: 0 auto;
                }

                body .btn{
                    width: 6rem;
                    margin-top: 0.2rem;
                    font-family:'Roboto', sans-serif;
                }

                body .btn button{
                    background-color:#eb3c3c;
                    border: 2px solid #eb3c3c;
                }

                body .btn button:hover{
                    background-color:#a30505;
                    border: 2px solid #a30505;
                }
        </style>

    </head>

    @section('Header')
    @section('titulo', 'TPA Transportes - Login')
    @endsection

    @section('conteudo')
        <body>
            <div class="form-group">
                <form action=" {{ route('login') }} " method="post">
                    {{ csrf_field() }}

                    <div class="form-group" style="margin-bottom:1rem;">

                        <label for="email" class="email" value=" old('email')">Email</label>
                        <input class="form-control form-control-user" type="email" name="email" class="email"/>

                        @component('components/erro-component', ['nome'=>"email"])
                        @endcomponent
                    </div>

                    <div class="form-group" style="margin-bottom:1rem;">

                        <label for="senha" class="senha" value=" old('senha')">Senha</label>
                        <input class="form-control form-control-user" type="password" name="senha" class="senha"/>

                        @component('components/erro-component', ['nome'=>"senha"])
                        @endcomponent
                    </div>

                    <div class="btn">
                        <button class="btn btn-primary btn-user btn-block" type="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </body>
    @endsection
</html>
