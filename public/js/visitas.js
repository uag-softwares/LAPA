// Bloquear os campos ao recarregar pagina
$(document).ready(function() {
    $("#hora_inicial").attr("disabled", true);
    $("#hora_final").attr("disabled", true);
});

/*
/ @return array de horas indisponiveis dado uma data
*/
function encontrarVisitaNaData($visitas, $data) {
    var $horasDoDia = [];

    $visitas.forEach(($visita) => {
        if($visita.data === $data) {
            $horasDoDia.push([
                $visita.hora_inicial,
                $visita.hora_final
            ]);
        }
    });
    return $horasDoDia;
}

// Bloquear feriados
$(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    startDate: "+1d",
    language: "pt-BR",
    daysOfWeekDisabled: [0,6],
});

// Colocar horas da hora final ao selecionar a hora inicial
function horaFinalDisponivel() {
    var $horaInicial = $('#hora_inicial');
    var $horaInicialSelecionada = parseFloat($horaInicial.children("option:selected").val());
    var $horaFinal = $("#hora_final");
    $horaFinal.empty();

    $horas.forEach($hora => {
        if(parseFloat($hora[1]) > $horaInicialSelecionada) {
            $horaFinal.append("<option value=" + $hora[1] + ">" + $hora[0] + "</option>");
            $horaFinal.removeAttr("disabled");
        }
    });
    $horaFinal.append("<option value='22'>22:00</option>")

    var $horasIndisponiveis = encontrarVisitaNaData($visitas, $("#data").val());
    Array.prototype.forEach.call($horaFinal.children("option"), $option => {
        $horaDaOpcao = parseFloat($option.value);

        $horasIndisponiveis.forEach($hora => {
            if($horaInicialSelecionada < parseFloat($hora[0]) && parseFloat($hora[0]) < $horaDaOpcao) {
                $option.disabled = true;
            }
        });
    });
}

// Bloquear horas indisponiveis do hora inicial ao selecionar a data
$("#data").change( function() {
    var $dataSelecionada = $(this).val();
    var $horaInicial = $("#hora_inicial");
    $horaInicial.empty();

    $horas.forEach(($hora) => {
        $horaInicial.append("<option value=" + $hora[1] + ">" + $hora[0] + "</option>")
        $horaInicial.removeAttr("disabled");
    });

    var $horasIndisponiveis = encontrarVisitaNaData($visitas, $dataSelecionada);
    
    Array.prototype.forEach.call($horaInicial.children("option"), $option => {
        $horaDaOpcao = parseFloat($option.value);
        $horasIndisponiveis.forEach($hora => {
            if(parseFloat($hora[0]) <= $horaDaOpcao && parseFloat($hora[1]) > $horaDaOpcao) {
                $option.disabled = true;
            }
        });
    });
    horaFinalDisponivel();
});

$("#hora_inicial").change(horaFinalDisponivel);
