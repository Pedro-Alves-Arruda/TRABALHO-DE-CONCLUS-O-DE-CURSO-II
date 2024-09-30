$(document).ready(function() {
    $('#table_gsm_nota').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('listar') }}",
        columns: [
            { data: 'tiquete_balanca', name: 'Tiquete Balança' },
            { data: 'peso', name: 'Peso' },
            { data: 'valor_frete', name: 'Valor do Frete' },
            { data: 'comissao_motorista', name: 'Comissão do Motorista' },
            { data: 'nome_terminal', name: 'Nome Terminal' },
        ]
    });
});