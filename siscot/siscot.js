var debugState = false;
$(document).ready(function(){
    $( document ).ajaxSend(function() {
        carregar();
    }).ajaxError(function(event, jqxhr, settings){
        pararCarregar();
        tratarErrosAjax(jqxhr);
    }).ajaxComplete(function(){
        pararCarregar();
    });
    $('.select-perfil').each(function(){
        let id = $("[id='" + $(this).attr('id') + "']");
        id.chosen();
        id.empty().append('<option value=""> </option>');  
		$.getJSON('/siscot/cadastros/perfis/crud.php?buscarLista=1', function(data){
            if(data != null){
                for (var i = 0; i < data.length; i++) {
                    id.append('<option value="'+ data[i].c_perfil +'">' + data[i].t_perfil + '</option>');							
                } 
            }					
            id.trigger("chosen:updated");
		});
    });
    $('.select-empresa').each(function(){
        let id = $("[id='" + $(this).attr('id') + "']");
        id.chosen();
        id.empty().append('<option value=""> </option>');  
		$.getJSON('/siscot/cadastros/empresas/crud.php?buscarLista=1', function(data){
            if(data != null){
                for (var i = 0; i < data.length; i++) {
                    id.append('<option value="'+ data[i].c_empresa +'">' + data[i].t_fantasia + '</option>');							
                } 
            }					
            id.trigger("chosen:updated");
		});
    });
    $('.select-uf').each(function(){
        let id = $("[id='" + $(this).attr('id') + "']");
        id.chosen();
        id.empty().append('<option value=""> </option>');  
		$.getJSON('/siscot/cadastros/cidades/crud.php?buscarEstados=1', function(data){
            if(data != null){
                for (var i = 0; i < data.length; i++) {
                    id.append('<option value="'+ data[i].c_uf +'">' + data[i].t_uf + '</option>');							
                } 
                id.trigger("chosen:updated");
            }					
        });
        id.on('change', function(){
            let idCidade = $($(".select-cidade")[0]);
            idCidade.empty().append('<option value=""> </option>'); 
            if(id.val()){
                $.getJSON('/siscot/cadastros/cidades/crud.php?buscarListaPorEstado='+id.val(), function(data){
                    if(data != null){
                        for (var i = 0; i < data.length; i++) {
                            idCidade.append('<option value="'+ data[i].c_cidade +'">' + data[i].t_cidade + '</option>');							
                        } 
                        idCidade.val( idCidade.attr("data-valorserver")	).trigger("chosen:updated");
                    }				
                });
            }
        });
    });
    $('.select-cidade').each(function(){
        let id = $("[id='" + $(this).attr('id') + "']");
        id.chosen();
        id.empty().append('<option value=""> </option>');
    });
    $('.select-grupo-empresas').each(function(){
        let id = $("[id='" + $(this).attr('id') + "']");
        id.chosen();
        id.empty().append('<option value=""> </option>');  
		$.getJSON('/siscot/cadastros/grupos/crud.php?buscarLista=1', function(data){
            if(data != null){
                for (var i = 0; i < data.length; i++) {
                    id.append('<option value="'+ data[i].c_empresa +'">' + data[i].t_fantasia + '</option>');							
                } 
            }					
            id.trigger("chosen:updated");
		});
    });
});
function recolherMenu(){
    setTimeout(function(){
        if($('#sidebar-collapse').find('i').hasClass('fa-angle-double-left')){
            $('#sidebar-collapse').trigger('click');
        }
    }, 500);
}
function salvarModalPadrao(formulario){
    $('#'+formulario).validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
          return;
        } else {
            $('button[type="submit"]').button('loading');
            setTimeout(() => {
                $('button[type="submit"]').button('reset');
            }, 5000);
            e.preventDefault();
            var dados = $(this).serializeArray();
            dados.forEach(element => {
                if(element.value == 'on'){
                    element.value = true;
                }
            });
            log(dados);
            ajaxFormularios($(this), dados, 'POST');
        }
    })
};
function pararCarregar(){
    $.unblockUI();
}
function carregar(){	
    $.blockUI({ 
        css: { 
            border: 'none', 
            padding: '15px',
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        },
        message: '<h3>Carregando...</h3>', 
     }); 
}
function log(e){
    if(debugState){
        console.log(e);
    }
}
function apenasNumeros(string) {
    var numsStr = string.replace(/[^0-9]/g,'');
    return parseInt(numsStr);
}
function messageError(message=null){
    Swal.fire({
        title: 'Algo errado aconteceu:',
        text: message,
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}
function tratarErrosAjax(e){
    log(e);
    switch (e.status) {
        case 500:
            messageError(e.responseText);
            break;
        case 415:
            messageError(e.responseText);
            break;
        case 404:
            messageError("Não encontrado: "+e.responseText);
            break;
        default:
            messageError(e);
            break;
    }
}
function buscarLista(){
    $.ajax({
        method: "GET",
        url: "crud.php?buscarLista=true",
    }).done(function( data ) {
        if(data){
            data = JSON.parse(data);
            montarGrid(data);
        }else{
            tratarErrosAjax(data);
        }
    });
}
function  tratarSucessoAjax(ret){
    log(ret);
    Swal.fire({
        icon: 'success',
        title: ret,
        showConfirmButton: true,
        timer: 3000
    });
    $('.modal').modal('hide');
    buscarLista();
}
function ajaxFormularios(form, dados, metodo){
    $.ajax({
        url: form.data('url'),
        data: dados,
        method: metodo,
    }).done(function(ret) {
       tratarSucessoAjax(ret);
    }).error(function(e){
       tratarErrosAjax(e);
    });
}
function setarValoresNosCampos(campo, valor){
    if(campo.attr('type') == 'text'){
        campo.val(valor).trigger('change');
    }else if(campo.attr('type') == 'checkbox'){
        valor == "true" ? valor = true : valor = false;
        campo.attr('checked', valor).trigger('change');
        campo.prop('checked', valor).trigger('change');
    }else if(campo.attr('type') == undefined ){
        if(campo.hasClass('select-cidade')){
            campo.attr("data-valorserver", valor).val(valor).trigger("chosen:updated");
        }else{
            if(campo.hasClass('multiple-select')){
                $.each(valor.split(","), function(i,e){
                    campo.find("option[value='" + $.trim(e) + "']").prop("selected", true);
                });
                campo.trigger('change').trigger("chosen:updated");
            }else{
                campo.val(valor).trigger('change').trigger("chosen:updated");
            }
        }
    }else{
        campo.val(valor).trigger('change');
    }
}
function montarForm(data, form){
    for(x in data){
        (Object.entries(data[x])).forEach(element => {
            var obj = $("[id='" + form.attr('id') + "'] [name='" + element[0] + "']");
            setarValoresNosCampos(obj, element[1]);
        });
    }
    $(form).validator();
}
function ajaxBuscarEntidade(codigo, form){
    $.ajax({
        url: "crud.php?codigo="+codigo,
        method: "GET",
    }).done(function(data) {
        if(data){
            data = JSON.parse(data);
            log(data);
            montarForm(data, form);
        }else{
            tratarErrosAjax(data);
        }
    });
}
function resetarCheckBoxes(){
    $('#modalformulario').find('form').find(':input:checkbox').each(function(){
        $(this).prop('checked', false);
        $(this).attr('checked', false);
    });
}
function resetarChosen(){
    $('#modalformulario').find('form').find(':input.chosen-select').each(function(){
        $(this).trigger("chosen:updated");
        $(this).attr("data-valorserver", "");
    });
}
function abrirmodalnovo(){
    var htmlmodal =  $('#modalformulario');
    htmlmodal.find('form')[0].reset();
    htmlmodal.find('form').validator("reset");
    resetarCheckBoxes();
    resetarChosen();
    $('#modalformulario-label').text('Cadastrar novo');
    htmlmodal.find('#codigo').val(0);
    htmlmodal.modal('show');
}
function abrirmodalEditar(codigo){
    var htmlmodal =  $('#modalformulario');
    htmlmodal.find('form')[0].reset();
    htmlmodal.find('form').validator("reset");
    resetarCheckBoxes();
    resetarChosen();
    $('#modalformulario-label').text('Editar registro');
    ajaxBuscarEntidade(codigo, htmlmodal.find('form'));
    htmlmodal.find('#codigo').val(codigo);
    htmlmodal.modal('show');
}
function toDataTableGrid(){
    $.fn.dataTable.ext.classes.sFilterInput = 'success';
    $.fn.dataTable.ext.classes.sStripeOdd = 'trPar';
    $.fn.dataTable.ext.classes.sStripeEven = 'trImpar';
    var table = $('#lista_padrao_table').DataTable({
        "oLanguage": {
            "sProcessing":   "Processando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords":  "Nenhum resultado encontrado...",
            "sInfo":         "Mostrando de _START_ - _END_ de _TOTAL_ registros",
            "sInfoEmpty":    "Mostrando de 0 - 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix":  "",
            "sSearch":       "<div class='hidden'></div>",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Proximo",
                "sLast":     "Último"
            }
        },
        "lengthChange": false,
        "pageLength": 7,
        "paging": true,
        "bSort": true,
        "processing" : true,
        "bPaginate": false,
        "destroy": true,
        "searching": true,
        "bInfo": true,
        "select": false,
    });
    $('.tableTools-container').empty();
    $('#tabelaGrid-table_filter').addClass('hidden');
    $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
    new $.fn.dataTable.Buttons( table, {
        buttons: [
        {
            extend: "colvis",
            text: "<i class='fa fa-eye-slash bigger-110 red'></i><span> Ocultar colunas</span>",
            className : "btn btn-white btn-danger btn-bold hidden",
            columns : ":not(:first)"
        },
        {
            extend: 'colvisGroup',
            text: "<i class='fa fa-eye bigger-110 blue'></i><span> Mostrar todas</span>",
            className : "btn btn-white btn-primary btn-bold hidden",
            show: ':hidden'
        }, 
        {
            extend : "excelHtml5",
            text : "<i class='fa fa-file-excel-o bigger-110 green'></i><span> Excel</span>",
            className : "btn btn-white btn-primary btn-bold",
            exportOptions: {
                "columns": ':visible',
            },
            title: 'Relatório do Sistema - '+document.title,
            message: 'Impressão filtrada - Data: '+(new Date()).toLocaleString()   
        },
        {
            extend: "pdfHtml5",
            text: "<i class='fa fa-file-pdf-o bigger-110 red'></i><span> PDF</span>",
            className: "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
            pageSize: 'A3',
            exportOptions: {
                "columns": ':visible',
            },
            title: 'Relatório do Sistema - '+document.title,
            message: 'Impressão filtrada - Data: '+(new Date()).toLocaleString()   
        },
        {
            extend: "print",
            text: "<i class='fa fa-print bigger-110 grey'></i><span> Imprimir</span>",
            className: "btn btn-white btn-primary btn-bold",
            orientation: 'landscape',
            pageSize: 'A3',
            exportOptions: {
                "columns": ':visible',
            },
            autoPrint: true,
            title: 'Relatório do Sistema - '+document.title,
            message: 'Impressão filtrada - Data: '+(new Date()).toLocaleString()   
        }		  
        ]
    } );
    table.buttons().container().appendTo( $('.tableTools-container') );
    var defaultCopyAction = table.button(1).action();
    table.button(1).action(function (e, dt, button, config) {
        defaultCopyAction(e, dt, button, config);
        $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
    });
    var defaultColvisAction = table.button(0).action();
    table.button(0).action(function (e, dt, button, config) {
        defaultColvisAction(e, dt, button, config);
        if($('.dt-button-collection > .dropdown-menu').length == 0) {
            $('.dt-button-collection')
            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
            .find('a').attr('href', '#').wrap("<li />")
        }
        $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
    });
    $('#tabelaGrid-table tbody').on( 'click', 'tr', function () {
        selecionouLinha($(this).data());
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
    $('input[type="search"].success').toggleClass('hidden');
    $('#pesquisarGrid').on('keyup click', function () {
        table.search($('#pesquisarGrid').val()).draw();
    });
    $('#lista_padrao_table').parent().addClass('col-xs-12').removeClass('col-sm-12').css('padding', '0px');
}
jQuery(function($) {				
    $(window).on('resize.chosen', function() {
        $('.chosen-select').siblings('.chosen-container').css({'width':'100%'});
    }).triggerHandler('resize.chosen');

    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        let modal = $(this);
        modal.css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            modal.find('.modal-body').height(parseInt($(window).innerHeight()- (($(window).innerHeight()/100)*30))); 
        }, 0);
    });
});