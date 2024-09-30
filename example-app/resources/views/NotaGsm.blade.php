@extends('layout')

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/display-block.scss') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="/../../resources/js/NotaGsm.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_gsm_nota').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('listarjson') }}",
                columns: [
                    { data: 'tiquete_balanca', name: 'Tiquete Balança' },
                    { data: 'peso', name: 'Peso' },
                    { data: 'valor_frete', name: 'Valor do Frete' },
                    { data: 'comissao_motorista', name: 'Comissão do Motorista' },
                    { data: 'nome_terminal', name: 'Nome Terminal' },
                ]
            });
        });

    </script>


</head>

    @section('Header')
        @section('titulo', 'TPA TRANSPORTES')
    @endsection

    @section('conteudo')
        <body id="app">

            <div class="container">
                    <h1 style="display:flex; 
                    justify-content: center;
                    align-items: center;
                    padding:0.5rem;">Lista de Notas</h1>

                <table id="table_gsm_nota" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tiquete Balanca</th>
                            <th>Peso</th>
                            <th>Valor Frete</th>
                            <th>Comissão Motorista</th>
                            <th>Terminal Destino</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
    @endsection
    
</html>
