$(document).ready(function() {
    // Selecionar o campo de entrada
    var input = $('#meu-campo-de-entrada');
    
    // Configurar o evento keyup para o campo de entrada
    input.keyup(function() {
      // Obter o valor atual do campo de entrada
      var valor = input.val();
      
      // Transformar todas as letras em maiúsculas
      valor = valor.toUpperCase();
      
      // Limitar o número de caracteres a 10
      valor = valor.substr(0, 100);
      
      // Atualizar o valor do campo de entrada com o valor transformado
      input.val(valor);
    });
  });
  