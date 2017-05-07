var sexoArray = [];
var faixaEtaria = [];
var renda = [];

$('input[name="sexo[]"]').click(function() {
  sexoArray.push($(this).val());
  fn();
});

$('input[name="idade[]"]').click(function() {
  faixaEtaria.push($(this).val());
  fn();
});

$('input[name="renda[]"]').click(function() {
  renda.push($(this).val());
  fn();
});

var fn = function() {
  $.ajax({
    method: "GET",
    url: "http://popsell.com.br/api/cliente.php",
    data: {
      renda: renda,
      sexo: sexoArray,
      faixaEtaria: faixaEtaria
    },
    dataType: 'json'
  })
  .done(function(data) {
    //var dados = JSON.stringify(data);
    $(".numero_pessoas").html(data.total_cleintes);
  })
  .error(function(err) {
    console.log(err);
  });

};
