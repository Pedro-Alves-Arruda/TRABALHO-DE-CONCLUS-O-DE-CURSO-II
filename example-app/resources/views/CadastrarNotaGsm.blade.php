@extends('layout')


<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Usuários</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        {{-- <link rel="stylesheet" href="{{ asset('css/display-block.scss') }}"> --}}
        
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

        <script src="{{ asset('js/app.js') }}"></script>

    </head>

    @section('Header')
    @section('titulo', 'CADASTRAR NOTA GSM')
    @endsection

    @section('conteudo')
        <body id="app">
            <div class="form-group">
                <form action=" {{ route('Cadastrar') }} " method="post">
                    {{ csrf_field() }}


                    @foreach ($NomesInputs as $NomeInput)
                        @component('components/input_component', ['nome'=>"$NomeInput"])
                        @endcomponent
                    @endforeach

                    <div class="form-group" style="margin-bottom:1rem;">
                        <label for="terminal_destino">Terminal de Destino</label>
                        <select name="terminal_destino" id="terminal_destino" class="form-control form-control-user" value="{{ old('terminal_destino') }}" >
                                @foreach($terminais_destino as $terminal)
                                    <option value="{{ $terminal->id_terminal }}">{{ $terminal->nome_terminal}}</option>
                                @endforeach
                        </select>


                        @component('components/erro-component', ['nome'=>"nome_terminal"])
                        @endcomponent

                    </div>

                    <div class="btn">
                        <button class="btn btn-primary btn-user btn-block" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </body>
    @endsection
    
</html>
