$(function() {
    // Quando o modal de confirmação for aberto
    $('#confirmDeleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que acionou o modal
        var clientId = button.data('id'); // Extrai o ID do cliente
        var actionUrl = '/clientes/' + clientId; // Define a rota de exclusão

        // Atualiza o formulário com a ação correta
        var form = $(this).find('form'); // Encontra o formulário dentro do modal
        form.attr('action', actionUrl); // Atualiza a ação do formulário
    });

    // Submissão do formulário de exclusão com AJAX
    $('#deleteForm').on('submit', function(event) {
        event.preventDefault(); // Evita o comportamento padrão do form

        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            success: function(response) {
                // Fecha o modal de confirmação
                $('#confirmDeleteModal').modal('hide');

                // Após fechar o modal de confirmação, abre o modal de sucesso
                $('#confirmDeleteModal').on('hidden.bs.modal', function () {
                    $('#successModal').modal('show');
                });
            },
            error: function(error) {
                console.log('Erro na exclusão do cliente');
            }
        });
    });
  });



// Mascara CPF
$(document).ready(function() {
    // Função para aplicar a máscara de CPF
    $('#cpf').on('input', function() {
        var input = $(this);
        var value = input.val();
        
        // Remove qualquer caractere que não seja número
        value = value.replace(/\D/g, '');
        
        // Aplica a máscara de CPF
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        
        // Atualiza o campo com a máscara
        input.val(value);
    });
});