(function($) {
    'use strict';

    var tr = `<tr>
                <td class="py-1" scope="row"> - </td>
                <td class="py-1" style="white-space: break-spaces;"> - </td>
                <td class="py-1" style="padding: 0px 15px"> - </td>
                <td class="py-1" style="padding: 0px 15px">
                    <input class="form-control form-control-sm border-bottom py-2" placeholder="Qtd" type="text" id="quantidade"
                        name="quantidade">
                </td>
                <td id="0" class="py-1 px-2 Modalpreco preco bg-inverse-secondary bg-opacity-50" style="padding: 0px 15px">
                    <span class="preco" data-preco="0"> 0 </span>
                </td>
                <td class="py-1" style="padding: 0px 15px">
                    <span class="preco-total" data-total="0"> 0 </span>
                </td>
                <td class="py-1">
                    <button type="button" class="btn btn-danger px-1 py-1" style="font-size: 18px" id="eliminar">E</button>
                    <button type="button" class="btn btn-secondary px-1 py-1" style="font-size: 18px" id="btnCusto" data-preco-unitario="0" data-codigo="0">K</button>
                </td>
            </tr>`;

    $.sss = {
        ajax: function(url, type, data) {
            return $.ajax({
                url: url,
                type: type,
                dataType: "json",
                data: data,
                async: false,
                error: function(jqxhr) {
                    console.log(jqxhr.responseText);
                }
            })
        },
        row: function(id) {
            $(`#capitulo-${id}>tbody`).append(tr);
        },
        rowCap: function() {
            const soma = 1;
            const id = $(`.table-vcenter>tbody>tr:last`).attr('id');
            const valor = soma + parseInt(id);

            $(`.table-vcenter>tbody`).append(`<tr data-pin="${valor}" id="capitulo" class="item">
                                                    <th colspan="7" class="bg-black bg-opacity-10 py-0 text-center delete">Capitulo ${valor}</th>
                                                </tr>
                                                <tr id="${valor}" data-cap="capitulo-${valor}" class="capitulo-${valor}">
                                                    <td class="p-0" colspan="7">
                                                    <table id="capitulo-${valor}" data-id="${valor}">
                                                        ${tr}
                                                    </table>
                                                    </td>
                                                </tr>
                                                <tr id="${valor}" class="subtotal-${valor}">
                                                    <td colspan="5" class="font-monospace text-end"><b>Subtotal:</b></td>
                                                    <td colspan="2" id="subtotal-${valor}" data-subtotal="0">0</td>
                                                </tr>`);
            this.withRow(valor);
        },
        addRowModal: function() {
            $("#items").append(`
                <div class="row" style="display: flex;align-items: center;">
                    <input type="hidden" name="id[]" value="31657" multiple="">
                    <div class="col-sm-12 col-md-7 col-lg-7">
                        <div class="form-group">
                            <div class="nk-int-st">
                                <textarea class="form-control" name="descricao[]" id="descricao" rows="3" placeholder="Descrição"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-1 col-lg-1">
                        <div class="form-group">
                            <div class="nk-int-st">
                                <input type="text" class="form-control" name="unidade[]" id="unidade" placeholder="Kg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <div class="nk-int-st">
                                <input type="text" class="form-control" name="coeficiente[]" id="coeficiente" placeholder="0.00122">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="form-group">
                            <div class="nk-int-st">
                                <input type="text" class="form-control" name="preco[]" id="preco" placeholder="Preço" placeholder="20 000.00">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            `);
        },
        enableInputModal: function() {
            $("textarea[name='descricao[]']").removeAttr('disabled');
            $("input[name='coeficiente[]']").removeAttr('disabled');
            $("input[name='unidade[]']").removeAttr('disabled');
        },
        rowSubtotal: function(id) {
            let soma = 0;
            $(`#capitulo-${id}>tbody>`).each(function() {
                soma += parseFloat($(this).find('td').eq(5).find(".preco-total").attr('data-total'));
            });
            $(`#subtotal-${id}`).attr('data-subtotal', this.two_decimal(soma));
            $(`#subtotal-${id}`).text(this.formatNumber(soma));
        },
        rowTotal: function(tagSpin) {
            // Obter codigo como chave na 5a coluna para passar o codigo
            var codigo = tagSpin.parent().parent().find("td:nth-child(5)").attr('id');

            // Escrever na 6a coluna o preco total
            var calculo = tagSpin.val() * $(`#${codigo}>.preco`).attr('data-preco');
            tagSpin.parent().parent().find("td:nth-child(6)>.preco-total:first").attr('data-total', this.two_decimal(calculo))
            tagSpin.parent().parent().find("td:nth-child(6)>.preco-total:first").text(this.formatNumber(calculo));
        },
        total: function(valor) {
            let soma = 0;
            let total_geral = 0;
            let iva = 0;

            for (let index = 1; index <= valor; index++) {
                soma += parseFloat($(`#subtotal-${index}`).attr('data-subtotal'));
            }

            total_geral = soma * 1.17;
            iva = total_geral - soma;

            $(`.xtotal`).html(`${this.formatNumber(soma)} MTS`);
            $(`.iva`).html(`${this.formatNumber(iva)} MTS`);
            $(`.total-geral`).html(`${this.formatNumber(total_geral)} MTS`);
        },
        rowDelete: function(t) {
            var _t = $(t);
            let valor = this.basicParent(_t).parent().parent().attr('data-id');
            if ($(`#capitulo-${valor}>tbody`).find('tr').length > 1) {
                this.basicParent($(t)).remove();
            }
            this.withRow();
        },
        totalModal: function() {
            $('#items').each(function() {
                var totalPoints = 0;
                $(this).find('.row').each(function() {
                    // Pega o preço x o preço do coeficiente
                    var subtotal = $(this).find("input#preco").val() * $(this).find("input#coeficiente").val();
                    // Calcular total
                    totalPoints += subtotal;
                });

                $("#total").val(totalPoints.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0]);
                return totalPoints;
            });
        },
        maoDeObra: function() {
            let ndtAux = 267;
            let nd = $("#nd").val(); // Número de dias  ---
            let d = (nd === null || nd === "") ? ndtAux : nd;

            let nhts = ($("#nhts").val() === 0) ? 0 : $("#nhts").val();
            let nas = ($("#nas").val() === 0) ? 0 : $("#nas").val(); // Número de horas de serviço  ---
            let ndt = $("#ndt").val();  // Dias de trabalhaveis por ano ---
            let nfa = $("#nfa").val(); // Número de ferias anuais   ---
            let ndrs = $("#ndrs").val(); // Dias Repouso de semanais    ---
            let nfj = $("#nfj").val(); // Número de faltas justificadas ---
            let nf = $("#ndf").val(); // Número de ferias   ---

            // Resultado    ---
            let nfaResultado = nfa / d;
            let nfResultado = nf / d;
            let ndrsRsultado = ndrs / d; // Calculo de repouso semanais remunerado  ---
            let nfjResultado = nfj / d;
            let fcResultado = 1 / d;

            let dezimoTerceiroSalarioB = ndt / d // Calculo de dézimo terceiro salário da coluna B   ---
            let dezimoTerceiroSalarioC = (nas * ndt) / d; // Calculo de dézimo terceiro salário da coluna C   ---

            let vm = $("#vm").val($("#sal").val());
            let irps = ($("#irps2").val() === "") ? 0 : parseFloat($("#irps2").val());
            let inss = ($("#inss").val() === "") ? 0 : parseFloat($("#inss").val());
            let total_parcial_a = irps + inss; // Total parcial de da coluna A ---
            let total_parcial_b = nfaResultado + ndrsRsultado + nfjResultado + nfResultado + fcResultado + dezimoTerceiroSalarioB; // Total parcial de da coluna B  ---
            let incidencia_cumulativa = total_parcial_a * total_parcial_b; // Total de incidência cumulativa da coluna B
            let total_encargos = total_parcial_a + total_parcial_b + dezimoTerceiroSalarioC + incidencia_cumulativa // Total de encargos da coluna B
            let percentagem = total_encargos * 100;

            $("#ferias-anuais").val($.sss.four_decimal(nfaResultado));
            $("#repousos").val($.sss.four_decimal(ndrsRsultado));
            $("#faltas-justificadas").val($.sss.four_decimal(nfjResultado));
            $("#feriados").val($.sss.four_decimal(nfResultado));
            $("#feriados-cidade").val($.sss.four_decimal(fcResultado));

            // Atribuir valores da coluna A do total parcial    ---
            $("#total_parcial_a").val($.sss.four_decimal(total_parcial_a));
            $("#total-parcial-a").html($.sss.four_decimal(total_parcial_a));

            // Atribuir valores da coluna B do total parcial    ---
            $("#total_parcial_b").val($.sss.four_decimal(total_parcial_b));
            $("#total-parcial-b").html($.sss.four_decimal(total_parcial_b));

            // Atribuir valores da coluna C do total parcial    ---
            $("#total_parcial_c").val($.sss.four_decimal(dezimoTerceiroSalarioC));
            $("#total-parcial-c").html($.sss.four_decimal(dezimoTerceiroSalarioC));

            // Atribuir valores da coluna B de dezimo terceiro  ---
            $(".dezimoTerceiroSalarioB").html($.sss.four_decimal(dezimoTerceiroSalarioB));
            $("#dezimoTerceiroSalarioB").attr('data-dezimoTerceiroSalarioB', $.sss.four_decimal(dezimoTerceiroSalarioB));

            // Atribuir valores da coluna C de dezimo terceiro  ---
            $(".dezimoTerceiroSalarioC").html($.sss.four_decimal(dezimoTerceiroSalarioC));
            $("#dezimoTerceiroSalarioC").attr('data-dezimoTerceiroSalarioC', $.sss.four_decimal(dezimoTerceiroSalarioC));

            // Atribuir valores da coluna B do incidência cumulativa    ---
            $("#incidencia_cumulativa").val($.sss.four_decimal(incidencia_cumulativa));
            $("#incidencia-cumulativa").html($.sss.four_decimal(incidencia_cumulativa));

            // Atribuir valores da coluna B do total de encargos    ---
            $("#total_encargos").val($.sss.four_decimal(total_encargos));
            $("#total-encargos").html($.sss.four_decimal(total_encargos));
            
            // Atribuir valores da coluna B da percentagem    ---
            $("#percentagem_labor").val($.sss.four_decimal(percentagem));
            $("#percentagem-labor").html($.sss.four_decimal(percentagem) + " %");

            // Vencimento por hora ---
            let vencimento_hora = $.sss.four_decimal((vm.val() * 12) / ( nhts * ndrs));
            let vencimento = $.sss.four_decimal(vencimento_hora * (1 + total_encargos));
            $("#gravar-labor").attr('data-vencimento', vencimento);
            
            var type = $("#at-unidade").val();
            if(type === "H") {
                let codigo = $("#at-codigo").val();
                $(`.preco-${codigo}`).val($.sss.two_decimal(vencimento));
                $.sss.totalModal();
            } else if(type === "CHP" || type === "CHI") {
                $("#moh").val($.sss.two_decimal(vencimento));
            }
        },
        depreciacaoHoraria: function() {
            var vo = ($("#vo").val() === "") ? 0 : parseFloat($("#vo").val()),
                vr = ($("#vr").val() === "") ? 0 : parseFloat($("#vr").val()),
                n = ($("#n").val() === "") ? 0 : parseFloat($("#n").val()),
                a = ($("#a").val() === "") ? 0 : parseFloat($("#a").val());

            var dr = (vo - vr) / (n * a); // Formula de dr

            $("#dh").val($.sss.two_decimal(dr));
            $("#dh").attr('data-dh', $.sss.two_decimal(dr));
            $.sss.somaEquipamentoProprio();
        },
        juros: function() {
            var i = ($("#i").val() === "") ? 0 : parseInt($("#i").val()) / 100,
                a = ($("#a2").val() === "") ? 0 : parseFloat($("#a2").val()),
                vo = ($("#vo2").val() === "") ? 0 : parseFloat($("#vo2").val()),
                vr = ($("#vr2").val() === "") ? 0 : parseFloat($("#vr2").val()),
                n = ($("#n2").val() === "") ? 0 : parseFloat($("#n2").val());

            var im = (((vo - vr) * (n + 1)) / (n * 2)) + vr; // Formula de Im
            var jh = (im * i) / a; // Formula jh

            $("#jh").val($.sss.two_decimal(jh));
            $("#jh").attr('data-jh', $.sss.two_decimal(jh));
            $.sss.somaEquipamentoProprio();
        },
        seguros: function() {
            var vo = ($("#vac").val() === "") ? 0 : parseInt($("#vac").val()),
                pa = ($("#pase").val() === "") ? 0 : parseInt($("#pase").val()),
                h = ($("#ht").val() === "") ? 0 : parseInt($("#ht").val());
            
            var sh = (vo * pa) / h;
            $("#sh").val($.sss.two_decimal(sh));
            $("#sh").attr('data-sh', $.sss.two_decimal(sh));
            $.sss.somaEquipamentoProprio();
        },
        armazenamento: function() {
            var cma = ($("#cma").val() === "") ? 0 : parseInt($("#cma").val()),
                h = ($("#ha3").val() === "") ? 0 : parseInt($("#ha3").val());
            
            var ah = cma / h;
            $("#ah").val($.sss.two_decimal(ah));
            $("#ah").attr('data-ah', $.sss.two_decimal(ah));
            $.sss.somaEquipamentoProprio();
        },
        pneus: function() {
            var npe = ($("#npe").val() === "") ? 0 : parseFloat($("#npe").val()),
                cp = ($("#cp").val() === "") ? 0 : parseFloat($("#cp").val()),
                vup = ($("#vup").val() === "") ? 0 : parseFloat($("#vup").val());

            var ph = (npe * cp) / vup; // Formula de ph

            $("#ph").val($.sss.two_decimal(ph));
            $("#ph").attr('data-ph', $.sss.two_decimal(ph));
            $.sss.somaEquipamentoProprio();
        },
        energia: function() {
            var custo = ($("#custokw").val() === "") ? 0 : parseFloat($("#custokw").val());

            var e = 0.75 * custo;
            $("#eh").val($.sss.two_decimal(e));
            $("#eh").attr('data-eh', $.sss.two_decimal(e));
            $.sss.somaEquipamentoProprio();
        },
        combustivel: function() {
            var f = ($("#f").val() === "") ? 0 : parseInt($("#f").val()) / 100,
                hp = ($("#hp").val() === "") ? 0 : parseFloat($("#hp").val()),
                cc = ($("#cc").val() === "") ? 0 : parseFloat($("#cc").val()),
                consumo = 0;

            if($("#motor").val() === "diesel") {
                consumo = 0.15 * f * hp * cc; // Formula de gh
            } else {
                consumo = 0.23 * f * hp * cc; // Formula de gh
            }
            $("#gh").val($.sss.two_decimal(consumo));
            $("#gh").attr('data-gh', $.sss.two_decimal(consumo));
            $.sss.somaEquipamentoProprio();
        },
        lubrificantes: function() {
            var hp = ($("#hp2").val() === "") ? 0 : parseFloat($("#hp2").val()),
                c = ($("#c").val() === "") ? 0 : parseFloat($("#c").val()),
                t = ($("#t").val() === "") ? 0 : parseFloat($("#t").val());
            
            var q = ((hp * 0.6 * 0.0027) / 0.893) + (c / t); // Formula de lh
            $("#lh").val($.sss.two_decimal(q));
            $("#lh").attr('data-lh', $.sss.two_decimal(q));
            $.sss.somaEquipamentoProprio();
        },
        manutencao: function() {
            var k = ($("#coeficiente2").val() === "") ? 0 : parseFloat($("#coeficiente2").val()),
                vo = ($("#vo3").val() === "") ? 0 : parseFloat($("#vo3").val()),
                n = ($("#n3").val() === "") ? 0 : parseFloat($("#n3").val()),
                a = ($("#nhua").val() === "") ? 0 : parseFloat($("#nhua").val());
                
            var mn = ( k * vo ) / (n * a); // Formula de mh
            $("#mh").val($.sss.two_decimal(mn));
            $("#mh").attr('data-mh', $.sss.two_decimal(mn))
            $.sss.somaEquipamentoProprio();
        },
        coeficiente: function() {
            var tp = $("#tipo").val(),
                tt = $("#temperatura").val(),
                qo = $("#qualidade-operador").val(),
                qe = $("#qualidade-equipamento").val(),
                hu = $("#horas-uso").val(),
                ct = $("#condicoes-trabalho").val(),
                mn = $("#manutencao2").val(),
                va = $("#vida-util-anos").val(),
                rt = $("#ritmo-trabalho").val(),
                cs = $("#conhecimento-servico").val(),
                ts = $("#tipo-servico").val();
        
            var coeficiente = (tp * tt * qo * qe * hu * ct * mn * va * rt * cs * ts);
            return $.sss.two_decimal(coeficiente);
        },
        somaEquipamentoProprio: function() {
            var dh = ($("#dh").val() === "") ? 0 : parseFloat($("#dh").val()),
                jh = ($("#jh").val() === "") ? 0 : parseFloat($("#jh").val()),
                sh = ($("#sh").val() === "") ? 0 : parseFloat($("#sh").val()),
                ah = ($("#ah").val() === "") ? 0 : parseFloat($("#ah").val()),
                eh = ($("#eh").val() === "") ? 0 : parseFloat($("#eh").val()),
                ph = ($("#ph").val() === "") ? 0 : parseFloat($("#ph").val()),
                gh = ($("#gh").val() === "") ? 0 : parseFloat($("#gh").val()),
                lh = ($("#lh").val() === "") ? 0 : parseFloat($("#lh").val()),
                moh = ($("#moh").val() === "") ? 0 : parseFloat($("#moh").val()),
                mh = ($("#mh").val() === "") ? 0 : parseFloat($("#mh").val());

            var ctpce = dh +  jh + sh + ah + eh + ph + gh + lh + moh + mh;
            var cti = dh + jh;
            $("#ctpce").val($.sss.two_decimal(ctpce));
            $("#cti").val($.sss.two_decimal(cti));
            $("#custo-total-improdutivo").text($.sss.two_decimal(cti));
        },
        somaEquipamentoAlugado: function() {
            var dh = ($("#alh").val() === "") ? 0 : parseFloat($("#alh").val());

            $("#ctpce2").val(dh);
            $("#cti2").val(dh);
            $("#custo-total-improdutivo-2").text(dh);
        },
        custosIndirectos: function() {
            var iva = 0.17,
                al = 0,
                ac = 0,
                df = 0,
                dm = 0,
                r = 0,
                d = 0,
                l = 0,
                d1 = 0,
                d2 = 0,
                d3 = 0,
                ot1 = 0,
                ot2 = 0,
                ot3 = 0,
                ot4 = 0,
                ot5 = 0,
                pv = 0;
            let cd = $('#cd').val();

            d = $("#despesaInicial").val() / 100;
            al = $("#administracaoLocal").val() / 100;
            ac = $("#administracaoCentral").val() / 100;
            df = $("#despesaFinanceira").val() / 100;
            dm = $("#despesaManutencao").val() / 100;
            r = $("#risco").val() / 100;
            d1 = $("#despesa1").val() / 100;
            d2 = $("#despesa2").val() / 100;
            d3 = $("#despesa3").val() / 100;
            iva = $("#iva").val() / 100;
            ot1 = $("#outrosTributos1").val() / 100;
            ot2 = $("#outrosTributos2").val() / 100;
            ot3 = $("#outrosTributos3").val() / 100;
            ot4 = $("#outrosTributos4").val() / 100;
            ot5 = $("#outrosTributos5").val() / 100;
            l = $("#lucroBruto").val() / 100;

            let t = iva + ot1 + ot2 + ot3 + ot4 + ot5;

            let k = (1 + (d + al + ac + df + dm + r + d1 + d2 + d3)) / (((1 / (1 + l)) + (1 / (1 + t))) - 1)

            $("#indutorCusto").val(this.two_decimal(k));

            pv = k * cd;
            let vvsi = pv / 1.17; // Valor de venda sem iva
            $("#pv").val(vvsi);
        },
        print: function(_t) {
            var divToPrint = document.getElementById(_t);
            var newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        },
        excel: function(_t) {
            $(`.${_t}`).tblToExcel();
        },
        basicParent: function(t) {
            return t.parent().parent();
        },
        withRow: function(tag = null) {
            var id = (tag === null) ? 1 : tag;
            $(`#capitulo-${id}>tbody>tr>`).each(function(i, v) {
                $(`#capitulo-${id}>tbody>tr>`).eq(i).css('width', '0px');
                $(`#capitulo-${id}>tbody>tr>`).eq(i).css('width', $(".table-vcenter>thead>tr>").eq(i).innerWidth());
                // console.log($(".table-vcenter>thead>tr>").eq(0).innerWidth())
            })
        },
        two_decimal: function(number) {
            var num = number;
            return (isNaN(num) || num === "" || num === null || num === undefined) ? 0 : num.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        },
        four_decimal: function(number) {
            var num = number;
            return (isNaN(num) || num === "" || num === null || num === undefined) ? 0 : num.toString().match(/^-?\d+(?:\.\d{0,4})?/)[0];
        },
        formatNumber: function(number) {
            var with2Decimals = this.two_decimal(number);

            return $.number(with2Decimals, 2, '.', ' ');
        }
    }
})(jQuery);

$.sss.withRow();

$("#novo-projecto").click(function() {
    location.reload();
});

var cap = document.querySelectorAll("#capitulo");
// Guardar projecto
$("#guardar-projecto").click(function() {
    function getRowTd(get) {
        var bloco = [];
        $(get).each(function( index, value ) {
            bloco[index] = {
                'codigo': $(value).find('td:nth-child(1)').text(),
                'quantidade': $(value).find('td:nth-child(4)>input').val(),
                'preco_unitario': $(value).find('td:nth-child(5)>.preco').text(),
                'preco_total': $(value).find('td:nth-child(6)>.preco-total').text(),
            };
        });

        return bloco;
    }

    var teia = [];    
    for (let index = 1; index <= cap.length; index++) {
        var get = $(`#capitulo-${index}`).find('tbody>tr');
        teia[index] = getRowTd(get);
    }

    $.sss.ajax('guardarProjecto', 'POST', {teia, projecto:$("#projecto").val(), descricao:$("#descricaoProjecto1").val(), localizacao:$("#localizacao").val()}).done((response) => {
        console.log(response);
    });
});

// Buscar projecto
$("#abrir-projecto").on('click', function() {
    $.sss.ajax('openProject', 'POST', {codigo:'1'}).done((response) => {
        var div = "";
        if(response.length != '0') {
            $(response).each(function(i, v) {
                div += `<div class="row mb-2">
                            <div class="col-sm-1">
                                ${v.numero}
                            </div>
                            <div class="col-sm-4">
                                ${v.descricao}
                            </div>
                            <div class="col-sm-2">
                                ${v.contratante}
                            </div>
                            <div class="col-sm-2">
                                ${v.localizacao}
                            </div>
                            <div class="col-sm-2">
                                ${v.prazo}
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded abrir-projecto" data-cod="${v.id}" id="${v.id}">Abrir</button>
                            </div>
                        </div>`;
            });
            $("#item-projectos").html(div);
        }

        $("#modalProjecto").modal('show');
    });
});

// Abrir projecto
$(document).on('click', ".abrir-projecto", function() {
    let codigo = $(this).attr("data-cod");
    $.sss.ajax('openServices', 'POST', {codigo:codigo}).done((response) => {
        var tr = "";
        $(response.servicos).each(function(i, v) {
            tr += `
                <tr>
                    <td class="py-1" scope="row"> ${v.codigo} </td>
                    <td class="py-1" style="white-space: break-spaces;">${v.designacao}</td>
                    <td class="py-1" style="padding: 0px 15px">${v.unidade}</td>
                    <td class="py-1" style="padding: 0px 15px">
                        <input class="form-control form-control-sm border-bottom py-2" placeholder="Qtd" type="text" id="quantidade"
                            name="quantidade" value="${v.quantidade}">
                    </td>
                    <td id="${v.codigo}" class="py-1 px-2 Modalpreco preco bg-inverse-secondary bg-opacity-50" style="padding: 0px 15px">
                        <span class="preco" data-preco="${v.preco_unitario}"> ${v.preco_unitario} </span>
                    </td>
                    <td class="py-1" style="padding: 0px 15px">
                        <span class="preco-total" data-total="${v.preco_total}"> ${v.preco_total} </span>
                    </td>
                    <td class="py-1">
                        <button type="button" class="btn btn-danger px-1 py-1" style="font-size: 18px" id="eliminar">E</button>
                        <button type="button" class="btn btn-secondary px-1 py-1" style="font-size: 18px" id="btnCusto" data-preco-unitario="${v.preco_unitario}" data-codigo="${v.codigo}">K</button>
                    </td>
                </tr>`;
            for (let index = 1; index <= cap.length; index++) {
                $(`#capitulo-${v.capitulo}`).find('tbody').html(tr);
            }
        });

        $(response.descricao).each(function(i, v) {
            $("#projecto").val(v.numero);
            $("#descricaoProjecto1").val(v.descricao);
            $("#localizacao").val(v.localizacao);
        });

        $("#modalProjecto").modal('hide');
    });
});
// Fechar janela
$("#fechar-janela-projecto").on('click', function() {
    $("#modalProjecto").modal('hide');
})

$(document).on("keydown.autocomplete", "#codigo", function(e) {
    // Sugestão de código para preenchimento do código
    var $this = $(this);
    var id = $('.table-vcenter').find('.item:last').attr('data-pin');
    $this.autocomplete({
        source: function(request, response) {
            $.sss.ajax('fetch', 'GET', { search: request.term }).done((result) => {
                response(result);
            });
        },
        select: function(event, ui) {
            // Definir seleção
            $('#autocomplete').val(ui.item.label); // Exibir o texto selecionado
            $('#selectuser_id').val(ui.item.value); // Salvar id selecionado para entrada
            $(`#capitulo-${id}`).find("td:nth-child(1):last").html(ui.item.value); // Atribuir a descrição na 1a coluna
            $(`#capitulo-${id}`).find("td:nth-child(2):last").html(ui.item.descricao); // Atribuir a descrição na 2a coluna
            $(`#capitulo-${id}`).find("td:nth-child(3):last").html(ui.item.unidade); // Atribuir a descrição na 3a coluna
            $(`#capitulo-${id}`).find("td:nth-child(5):last").attr('id', ui.item.value); // Atribuir o preço na 5a coluna
            $(`#capitulo-${id}`).find("td:nth-child(5):last>.preco").html($.sss.formatNumber(ui.item.preco)); // Atribuir o preço caso exista na 5a coluna
            $(`#capitulo-${id}`).find("td:nth-child(5):last>.preco").attr('data-preco', ui.item.preco); // Atribuir o preço caso exista na 5a coluna
            $(`#capitulo-${id}`).find("td:nth-child(7)>#btnCusto").attr("data-preco-unitario", ui.item.preco); // Atribuir o preço
            $(`#capitulo-${id}`).find("td:nth-child(7)>#btnCusto").attr("data-codigo", ui.item.value); // Atribuir o codigo
            $("#frmCodigo").val(ui.item.value); // Atribuir valor a caixa de entrada (input) do Modal
            $.sss.withRow(id);
        },
        minLength: 2
    });
});

// Evento da quantidade, ao escrever calula o total da linha, subtotal e o total geral
$(document).on('keyup', '#quantidade', function() {
    var _this = $(this);
    const nr = $.sss.basicParent(_this).parent().parent().attr('data-id'); // Obter o número do capitulo
    $.sss.rowTotal(_this); // Chamada para calcular total da linha
    $.sss.rowSubtotal(nr); // Chamada para calcular actualizar o total do capitulo
    $.sss.total(nr); // Chamada para calular total geral
})

//  Modal dinamico por cada preço
$(document).on('click', '.Modalpreco', function() {
    var _codigo = $(this).attr('id'); // Obter código o preço
    // Validar o código
    if (_codigo !== 0 || _codigo != null) {
        // Obter os elementos do serviço
        $.sss.ajax('items', 'GET', { codigo: _codigo }).done(function(response) {
            var op = "";
            $.each(response.items, function($index, $values) {
                op += $values.item;
            });
            $("#total").val($.sss.two_decimal(response.total)); // Atribuir total caso exista
            $("#frmCodigo").val(_codigo); // Atribuir valor a caixa de entrada (input) do Modal
            $("#items").html(op); // Carregar dados dos atributos do serviço
            $('#descricao').modal('show'); // Chamar Modal
        })
    } else {
        console.log("Código não existe!")
    }
});

$(document).ready(function() {
    $("#print").on("click",function(){
        $.sss.print('tablePcc');
    });

    // Exportar a tabela para excel ---
    $('#excel').on('click', function() {
        $.sss.excel('table-vcenter');
    });

    $('#pdf').on('click', function () {
        html2canvas($('#tablePcc')[0], {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("pcc.pdf");
            }
        });
    });

    // Submeter os preços e actualizar
    $("#frmPreco").submit(function(e) {
        e.preventDefault();
        var id = $("#frmCodigo").val();
        var t = $.sss.two_decimal($("#total").val());
        $.sss.ajax('actualizar', 'POST', $(this).serialize() + "&total=" + t).done(function(response) {
            if (response === true) {
                $('#descricao').modal('hide'); // Chamar Modal
                $(`#${id}>.preco`).html($.sss.formatNumber(t));
                $(`#${id}>.preco`).attr('data-preco', t);
            }
        });
    })

    // Submeter os preços e actualizar
    $("#frmPrecoDespesas").submit(function(e) {
        e.preventDefault();
        var id = $("#frmcdg").val();
        let _preco = $.sss.two_decimal($("#pv").val());
        $.sss.ajax('actualizarPreco', 'POST', $(this).serialize() + "&preco=" + _preco + "&codigo=" + id).done(function(response) {
            if (response === true) {
                $('#custos').modal('hide'); // Chamar Modal
                $(`#${id}>.preco`).attr('data-preco', _preco);
                $(`#${id}>.preco`).parent().parent().find("td:nth-child(7)>#btnCusto").attr("data-preco-unitario", _preco);
                $(`#${id}>.preco`).html($.sss.formatNumber(_preco));
            }
        });
    })
});

$("#editar").on('click', function() {
    $.sss.enableInputModal();
});

$(document).on('click', '#adicionar', function() {
    $.sss.enableInputModal();
    $.sss.addRowModal();
});

// Preço dos coeficientes com os preços do mercado ou os preços procurados
$(document).on('keyup', '#preco', function() {
    $.sss.totalModal(); // Chamada de total
})

// Eliminar linhas da mesa (table)
$(document).on('click', '#eliminar', function() {
    $.sss.rowDelete(this);
});

// Botão para adicionar servicos
$(document).on('click', '#btnSev', function() {
    var id = $('.table-vcenter>tbody').find("tr#capitulo:last").attr('data-pin');
    $.sss.row(id); // Chamada para adicionar nova linha no capitulo ccorrente
});

// Botão para adicionar capitulo
$(document).on('click', '#btnCap', function() {
    $.sss.rowCap(); // Chamada para adicionar capitulos
});

// Botão de custos
$(document).on('click', '#btnCusto', function() {
    let unitario = $(this).attr('data-preco-unitario'); // Preço unitário do serviço
    let codigo = $(this).attr('data-codigo'); // Código do serviço
    $("#cd").val(unitario); // Atribuir o preço unitário no custo directo
    $("#frmcdg").val(codigo); // Atribuir o código para a caixa de entrada oculta #frmcdg
    $.sss.ajax('custosIndirectos', 'GET', { servico: codigo }).done((result) => {
        $("#frmPrecoDespesas")[0].reset(); // Reeniciar a escrita dos valores na modal da #frmPrecoDespesas
        if (result.estado === true && result.custos.length !== 0) {
            $.each(result.custos, function(i, v) {
                $('#despesaInicial').val(v.despesa_inicial);
                $('#administracaoLocal').val(v.adminitracao_local);
                $('#administracaoCentral').val(v.adminitracao_central);
                $('#despesaFinanceira').val(v.despesa_financeira);
                $('#despesaManutencao').val(v.despesa_manutencao);
                $('#risco').val(v.risco);
                $('#iva').val(v.iva);
                $('#despesa1').val(v.despesa_1);
                $('#despesa2').val(v.despesa_2);
                $('#despesa3').val(v.despesa_3);
                $('#outrosTributos1').val(v.outros_tributos_1);
                $('#outrosTributos2').val(v.outros_tributos_2);
                $('#outrosTributos3').val(v.outros_tributos_3);
                $('#outrosTributos4').val(v.outros_tributos_4);
                $('#outrosTributos5').val(v.outros_tributos_5);
                $('#lucroBruto').val(v.lucro_bruto);
                $('#indutorK').val(v.indutor_custo_k);
                $('#indutorCusto').val(v.indutor_custo_k);
            });
        }
        $("#custos").modal('show'); // Chamar Modal
    });
});

$('#despesaInicial, #administracaoLocal, #administracaoCentral, #despesaFincanceira, #despesaManutencao, #risco, #iva, #despesa1, #despesa2, #despesa3, #outrosTributos1, #outrosTributos2, #outrosTributos3, #outrosTributos4, #outrosTributos5, #lucroBruto').on('keyup', function() {
    $.sss.custosIndirectos(); // Chamar sempre que introduzir qualquer valor em uma das caixas de entrada
});

// --------------------------------- Mão de Obra --------------------------------- //
// Botão para Mão de Obra   ---
$(document).on('click', '#mao-obra', function() {
    $("#descricao").modal('hide');
    var codigo = $(this).attr('data-at-codigo');
    var unidade = $(this).attr('data-at-un');
    $.sss.ajax('obterMaoObra', 'GET', {codigo: codigo}).done((response) => {
        if(response !== false || response !== 'false') {
            $.each(response, function(i, v){
                $("#nr-dependentes").val($.sss.four_decimal(v.dependentes));
                $("#sal").val($.sss.four_decimal(v.salario));
                $("#vm").val($.sss.four_decimal(v.salario));
                // --------
                $("#id-codigo").val(v.id);
                $("#ferias-anuais").val($.sss.four_decimal(v.ferias_anuais));
                $("#repousos").val($.sss.four_decimal(v.repouso_semanais));
                $("#faltas-justificadas").val($.sss.four_decimal(v.faltas_justificadas));
                $("#feriados").val($.sss.four_decimal(v.feriados));
                $("#feriados-cidade").val($.sss.four_decimal(v.feriado_por_cidade));

                // Atribuir valores da coluna A do total parcial    ---
                $("#total_parcial_a").val($.sss.four_decimal(v.total_parcial_a));
                $("#total-parcial-a").html($.sss.four_decimal(v.total_parcial_a));

                // Atribuir valores da coluna B do total parcial    ---
                $("#total_parcial_b").val($.sss.four_decimal(v.total_parcial_b));
                $("#total-parcial-b").html($.sss.four_decimal(v.total_parcial_b));

                // Atribuir valores da coluna C do total parcial    ---
                $("#total_parcial_c").val($.sss.four_decimal(v.total_parcial_c));
                $("#total-parcial-c").html($.sss.four_decimal(v.total_parcial_c));

                // Atribuir valores da coluna B de dezimo terceiro  ---
                $(".dezimoTerceiroSalarioB").html($.sss.four_decimal(v.dezimo_terceiro_b));
                $("#dezimoTerceiroSalarioB").attr('data-dezimoTerceiroSalarioB', $.sss.four_decimal(v.dezimo_terceiro_b));
                $("#dezimoTerceiroSalarioB").val($.sss.four_decimal(v.dezimo_terceiro_b));

                // Atribuir valores da coluna C de dezimo terceiro  ---
                $(".dezimoTerceiroSalarioC").html($.sss.four_decimal(v.dezimo_terceiro_c));
                $("#dezimoTerceiroSalarioC").attr('data-dezimoTerceiroSalarioC', $.sss.four_decimal(v.dezimo_terceiro_c));
                $("#dezimoTerceiroSalarioC").val($.sss.four_decimal(v.dezimo_terceiro_c));

                // Atribuir valores da coluna B do incidência cumulativa    ---
                $("#incidencia_cumulativa").val($.sss.four_decimal(v.incidencia_cumulativa));
                $("#incidencia-cumulativa").html($.sss.four_decimal(v.incidencia_cumulativa));

                // Atribuir valores da coluna B do total de encargos    ---
                $("#total_encargos").val($.sss.four_decimal(v.total_encargos));
                $("#total-encargos").html($.sss.four_decimal(v.total_encargos));
                
                // Atribuir valores da coluna B da percentagem    ---
                $("#percentagem_labor").val($.sss.four_decimal(v.total_encargos_percentagem));
                $("#percentagem-labor").html($.sss.four_decimal(v.total_encargos_percentagem) + " %");
            });
        }
    });
    $("#mao-de-obra").modal('show');
    $("#at-codigo").val(codigo);
    $("#at-unidade").val(unidade);
});

$(document).ready(function() {
    // Actualizar o preço do atributos    ---
    $("#frmMaoObra").submit(function(e) {
        e.preventDefault();
        $.sss.totalModal();
        $("#frmMaoObra")[0].reset();
        $("#frmSalario")[0].reset();
        $("#descricao").modal('show');
        $("#mao-de-obra").modal('hide');
    });
})

// ----------------------------- Salario e descontos ----------------------------- //
// Botão do modal salário e dependentes  ---
$(document).on('click', '#irps2', function() {
    $("#salario").modal('show');
});
// Fechar o modal de salário e dependentes  ---
$(".close-salario").on('click', function() {
    $("#salario").modal('hide');
});
// Calcular o valores de mao de obra    ---
$('#vm, #nhts, #nas, #nd, #ndt, #nfa,  #ndrs, #nfj, #ndf').on('keyup', function(){
    $.sss.maoDeObra();
});
// Calcular o valor de irps da mão de obra do atributo de cada serviço  ---
$("#sal").on('keyup', function(){
    var ss = $(this).val();
    var limite = 0,
        coe = 0,
        imposto = 0,
        percentagem = 0,
        dep = 0;

    var dependentes = $("#nr-dependentes").val();
    if(dependentes === "" || dependentes === null || isNaN(dependentes)) {
        alert("O campo de Dependentes esta vazia, preencha por favor");
    } else {
        if(ss <= 20249.99) {
            limite = ss;
            coe = limite;
            imposto = coe + 0;
            percentagem = 0;
        } else if(ss >= 20250 && ss <= 20749.99) {
            limite = ss - 20250;
            coe = limite * 0.10;
            imposto = coe + 0;
            percentagem = imposto / ss;
        } else if(ss >= 20750 && ss <= 20999.99) {
            var dep = {'0':'50', '1':'0', '2':'0', '3':'0', '4':'0'};
            limite = ss - 20750;
            coe = limite * 0.10;
            imposto = coe + parseFloat((dependentes > 4) ? 0 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 21000 && ss <= 21249.99) {
            var dep = {'0':'75', '1':'25', '2':'0', '3':'0', '4':'0'};
            limite = ss - 21000;
            coe = limite * 0.10;
            imposto = coe + parseFloat((dependentes > 4) ? 0 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 21500 && ss <= 21749.99) {
            var dep = {'0':'100', '1':'50', '2':'25', '3':'0', '4':'0'};
            limite = ss - 21500;
            coe = limite * 0.10;
            imposto = coe + parseFloat((dependentes > 4) ? 0 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 21750 && ss <= 22249.99) {
            var dep = {'0':'150', '1':'100', '2':'75', '3':'50', '4':'0'};
            limite = ss - 21750;
            coe = limite * 0.10;
            imposto = coe + parseFloat((dependentes > 4) ? 0 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 22250 && ss <= 32749.99) {
            var dep = {'0':'200', '1':'150', '2':'125', '3':'100', '4':'50'};
            limite = ss - 22250;
            coe = limite * 0.15;
            imposto = coe + parseFloat((dependentes > 4) ? 50 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 32750 && ss <= 60749.99) {
            var dep = {'0':'1775', '1':'1725', '2':'1700', '3':'1675', '4':'1625'};
            limite = ss - 32750;
            coe = limite * 0.20;
            imposto = coe + parseFloat((dependentes > 4) ? 1625 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 60750 && ss <= 144749.99) {
            var dep = {'0':'7375', '1':'7325', '2':'7300', '3':'7275', '4':'7225'};
            limite = ss - 60750;
            coe = limite * 0.25;
            imposto = coe + parseFloat((dependentes > 4) ? 7225 : dep[dependentes]);
            percentagem = imposto / ss;
        } else if(ss >= 144750) {
            var dep = {'0':'28375', '1':'28325', '2':'28300', '3':'28275', '4':'28225'};
            limite = ss - 144740;
            coe = limite * 0.32;
            imposto = coe + parseFloat((dependentes > 4) ? 1625 : dep[dependentes]);
            percentagem = imposto / ss;
        }

        $("#irps2").val($.sss.four_decimal(percentagem));
        $("#dependentes").val(dependentes);
        $("#dependentes").attr('data-dep', dependentes);
        $.sss.maoDeObra();
    }
});

// Gravar salário da pessoa ---
$("#gravar-salario").on('click', function(){
    var salario = $("#salario").val();
    var dependentes = $("#nr-dependentes").val();
    if(salario === null && dependentes === null) {
        alert("Campos vazios")
    } else {
        $("#salario-liquido").val(salario);
    }
});

// ---------------- Equipamentos Proprios ---------------- //
$(document).on('click','#equipamento', function() {
    var codigo = $(this).attr('data-at-codigo');
    var unidade = $(this).attr('data-at-un');

    $("#modal-proprio").attr("data-p-codigo", codigo);
    $("#modal-proprio").attr("data-p-un", unidade);

    $("#modal-alugado").attr("data-a-codigo", codigo);
    $("#modal-alugado").attr("data-a-un", unidade);

    $("#descricao").modal('hide');
    $("#escolha").modal('show');
});

$(document).on('click', '#modal-proprio', function() {
    $("#frmEquipamentosProprio")[0].reset();
    var codigo = $(this).attr('data-p-codigo');
    var unidade = $(this).attr('data-p-un');
    $.sss.ajax('obterEquipamentoProprio', 'GET', {codigo: codigo}).done((response) => {
        if(response === false || response === 'false') {
            $("#id-codigo-equipamento-proprio").val("");
            $("#custo-total-improdutivo").html('0');
        } else {
            $.each(response, function(i, v){
                $("#id-codigo-equipamento-proprio").val(v.id)
                $("#dh").val(v.depreciacao_horaria);
                $("#jh").val(v.juros);
                $("#sh").val(v.seguros);
                $("#ah").val(v.armazenamento);
                $("#ph").val(v.energia);
                $("#eh").val(v.energia);
                $("#gh").val(v.combustivel);
                $("#lh").val(v.lubrificantes);
                $("#moh").val(v.operador);
                $("#mh").val(v.manutencao);
                $("#ctpce").val(v.custo_total_produtivo);
                $("#cti").val(v.custo_total_improdutivo);
                $("#custo-total-improdutivo").html(v.custo_total_improdutivo);
            });
        }
    });
    $("#at-codigo-equipamento-proprio").val(codigo);
    $("#at-unidade").val(unidade);
    $("#escolha").modal('hide');
    $("#equipamento-proprio").modal('show');
});

// Chamar janela de Depreciacao de Horario    ---
$("#dh").on('click', function() {
    $("#depreciacao-horaria").modal('show');
});

// Calcular o valores de Depreciacao    ---
$('#vo, #vr, #n, #a').on('keyup', function(){
    $.sss.depreciacaoHoraria();
});

// Chamar janela de Juros    ---
$("#jh").on('click', function() {
    $("#juros").modal('show');
});

// Calcular o valores de Juros    ---
$('#i, #a2, #vo2, #vr2, #n2').on('keyup', function(){
    $.sss.juros();
});

// Chamar janela de Seguros    ---
$("#sh").on('click', function() {
    $("#seguro").modal('show');
});

// Calcular o valores de Seguros    ---
$('#vac, #pase, #ht').on('keyup', function(){
    $.sss.seguros();
});

// Chamar janela de Juros    ---
$("#ah").on('click', function() {
    $("#armazenamento").modal('show');
});

// Calcular o valores de Juros    ---
$('#cma, #ha3').on('keyup', function(){
    $.sss.armazenamento();
});

// Chamar janela de Combustivel    ---
$("#gh").on('click', function() {
    $("#combustivel").modal('show');
});

// Calcular o valores de Combustivel    ---
$('#motor, #f, #hp, #cc').on('keyup', function(){
    $.sss.combustivel();
});

// Chamar janela de lubrificantes    ---
$("#lh").on('click', function() {
    $("#lubrificantes").modal('show');
});

// Calcular o valores de lubrificantes    ---
$('#hp2, #c, #t').on('keyup', function(){
    $.sss.lubrificantes();
});

// Chamar janela de Pneu
$("#ph").on('click', function() {
    $("#pneu").modal('show');
});

// Calcular o valores de Pneu    ---
$('#npe, #cp, #vup').on('keyup', function(){
    $.sss.pneus();
});

// Chamar janela de Energia
$("#eh").on('click', function() {
    $("#energia").modal('show');
});

// Calcular o valores de Energia    ---
$('#custokw').on('keyup', function(){
    $.sss.energia();
});

// Chamar janela de Mao de Obra (Operador)   ---
$("#moh").on('click', function() {
    var codigo = $("#at-codigo-equipamento-proprio").val();
    var unidade = $("#at-unidade").val();
    $.sss.ajax('obterMaoObra', 'GET', {codigo: codigo}).done((response) => {
        $.each(response, function(i, v){
            $("#nr-dependentes").val($.sss.four_decimal(v.dependentes));
            $("#sal").val($.sss.four_decimal(v.salario));
            $("#vm").val($.sss.four_decimal(v.salario));
            // --------
            $("#id-codigo").val(v.id);
            $("#ferias-anuais").val($.sss.four_decimal(v.ferias_anuais));
            $("#repousos").val($.sss.four_decimal(v.repouso_semanais));
            $("#faltas-justificadas").val($.sss.four_decimal(v.faltas_justificadas));
            $("#feriados").val($.sss.four_decimal(v.feriados));
            $("#feriados-cidade").val($.sss.four_decimal(v.feriado_por_cidade));

            // Atribuir valores da coluna A do total parcial    ---
            $("#total_parcial_a").val($.sss.four_decimal(v.total_parcial_a));
            $("#total-parcial-a").html($.sss.four_decimal(v.total_parcial_a));

            // Atribuir valores da coluna B do total parcial    ---
            $("#total_parcial_b").val($.sss.four_decimal(v.total_parcial_b));
            $("#total-parcial-b").html($.sss.four_decimal(v.total_parcial_b));

            // Atribuir valores da coluna C do total parcial    ---
            $("#total_parcial_c").val($.sss.four_decimal(v.total_parcial_c));
            $("#total-parcial-c").html($.sss.four_decimal(v.total_parcial_c));

            // Atribuir valores da coluna B de dezimo terceiro  ---
            $(".dezimoTerceiroSalarioB").html($.sss.four_decimal(v.dezimo_terceiro_b));
            $("#dezimoTerceiroSalarioB").attr('data-dezimoTerceiroSalarioB', $.sss.four_decimal(v.dezimo_terceiro_b));
            $("#dezimoTerceiroSalarioB").val($.sss.four_decimal(v.dezimo_terceiro_b));

            // Atribuir valores da coluna C de dezimo terceiro  ---
            $(".dezimoTerceiroSalarioC").html($.sss.four_decimal(v.dezimo_terceiro_c));
            $("#dezimoTerceiroSalarioC").attr('data-dezimoTerceiroSalarioC', $.sss.four_decimal(v.dezimo_terceiro_c));
            $("#dezimoTerceiroSalarioC").val($.sss.four_decimal(v.dezimo_terceiro_c));

            // Atribuir valores da coluna B do incidência cumulativa    ---
            $("#incidencia_cumulativa").val($.sss.four_decimal(v.incidencia_cumulativa));
            $("#incidencia-cumulativa").html($.sss.four_decimal(v.incidencia_cumulativa));

            // Atribuir valores da coluna B do total de encargos    ---
            $("#total_encargos").val($.sss.four_decimal(v.total_encargos));
            $("#total-encargos").html($.sss.four_decimal(v.total_encargos));
            
            // Atribuir valores da coluna B da percentagem    ---
            $("#percentagem_labor").val($.sss.four_decimal(v.total_encargos_percentagem));
            $("#percentagem-labor").html($.sss.four_decimal(v.total_encargos_percentagem) + " %");
        });
    });
    $("#mao-de-obra").modal('show');
    $("#at-codigo").val(codigo);
    $("#unidade-codigo").val(unidade);
});

// Chamar janela de Manutencao    ---
$("#mh").on('click', function() {
    $("#manutencao").modal('show');
});

// Calcular o valores de Manutencao    ---
$('#vo3, #n3, #nhua').on('keyup', function(){
    $.sss.manutencao();
});

// Janela de Coeficiente    ---
$('#coeficiente2').on('click', function(){
    $("#coef").modal('show');
});

// Calculo de Custo de manutenção coeficiente    ---
$("#tipo, #temperatura, #qualidade-operador, #qualidade-equipamento, #horas-uso, #condicoes-trabalho, #manutencao2, #vida-util-anos, #ritmo-trabalho, #conhecimento-servico, #tipo-servico").on("change", function(){
    $("#coeficiente2").val($.sss.coeficiente());
    $("#coeficiente2").attr('data-coefi', $.sss.coeficiente());
});

// Gravar Equipamentos Proprios
$("#frmEquipamentosProprio").submit(function(e) {
    e.preventDefault();
    var codigo = $("#at-codigo-equipamento-proprio").val();
    var preco = parseFloat($("#ctpce").val());
    var preco2 = parseFloat($("#cti").val())
    var type = $("#at-unidade").val();
    if(type === "CHI") {
        $(`.preco-${codigo}`).val(preco2);
    } else if(type === "CHP") {
        $(`.preco-${codigo}`).val(preco);
    }
    $.sss.ajax('equipamentoProprio', 'POST', $(this).serialize()).done((response) => {
        $("#descricao").modal('show');
        $("#equipamento-proprio").modal('hide');
    });
})

// ---------------- Equipamentos Alugados ---------------- //
$(document).on('click', '#modal-alugado', function() {
    $("#frmEquipamentosAlugado")[0].reset();
    var codigo = $(this).attr('data-a-codigo');
    var unidade = $(this).attr('data-a-un');
    $.sss.ajax('obterEquipamentoAlugado', 'GET', {codigo: codigo}).done((response) => {
        if(response == false || response === 'false') {
            $("#id-codigo-equipamento-alugado").val("");
            $("#custo-total-improdutivo-2").html(0);
        } else {
            $.each(response, function(i, v){
                $("#id-codigo-equipamento-alugado").val(v.id);
                $("#alh").val(v.aluguer);
                $("#ctpce2").val(v.custo_total_produtivo);
                $("#cti2").val(v.custo_total_improdutivo);
                $("#custo-total-improdutivo-2").html(v.custo_total_improdutivo);
            });
        }
    });
    $("#at-codigo-equipamento-alugado").val(codigo);
    $("#at-unidade").val(unidade);
    $("#escolha").modal('hide');
    $("#equipamento-alugado").modal('show');
});

$("#alh").on('keyup', function() {
    $.sss.somaEquipamentoAlugado();
});

// Gravar Equipamentos Alugado
$("#frmEquipamentosAlugado").submit(function(e) {
    e.preventDefault();
    var codigo = $("#at-codigo-equipamento-alugado").val();
    var preco = parseFloat($("#ctpce2").val())
    $(`.preco-${codigo}`).val(preco);
    $.sss.ajax('equipamentoAlugado', 'POST', $(this).serialize()).done((response) => {
        $("#descricao").modal('show');
        $("#equipamento-alugado").modal('hide');
    });
})

$(".close").on('click', function() {
    $("#descricao").modal('hide');
})

$(".close-mao-obra").on('click', function() {
    $("#descricao").modal('show');
    $("#mao-de-obra").modal('hide');
})

$(".close-equipamento-proprio").on('click', function() {
    $("#equipamento-proprio").modal("hide");
    $("#descricao").modal("show");
});

$(".close-equipamento-alugado").on('click', function() {
    $("#equipamento-alugado").modal('hide');
    $("#descricao").modal("show");
});

$(".close-depreciacao").on('click', function() {
    $("#depreciacao-horaria").modal('hide');
})

$(".close-juros").on('click', function() {
    $("#juros").modal('hide');
})

$(".close-seguro").on('click', function() {
    $("#seguro").modal('hide');
})

$(".close-armazenamento").on('click', function() {
    $("#armazenamento").modal('hide');
})

$(".close-pneu").on('click', function() {
    $("#pneu").modal('hide');
})

$(".close-energia").on('click', function() {
    $("#energia").modal('hide');
})

$(".close-combustivel").on('click', function() {
    $("#combustivel").modal('hide');
})

$(".close-lubrificantes").on('click', function() {
    $("#lubrificantes").modal('hide');
})

$(".close-manutencao").on('click', function() {
    $("#manutencao").modal('hide');
})

$(".close-coeficiente").on('click', function() {
    $("#coef").modal('hide');
})

$(".close-custo-directo").on('click', function() {
    $("#decricao").modal('hide');
})