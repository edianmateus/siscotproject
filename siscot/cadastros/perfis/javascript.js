function submeterFormularioPerfil(formulario){
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
                if(element.name.indexOf('c_menu_')> -1){
                    element.name = apenasNumeros(element.name);
                }
            });
            log(dados);
            ajaxFormularios($(this), dados, 'POST');
        }
    })
};
$(document).ready(function(){
    buscarLista();
    submeterFormularioPerfil('formulario-perfil');
});
function ativaPai(obj){
    let pai = $(obj).data('menupai');
    $("input[id='c_menu_"+pai+"']").prop('checked', false);
    $("input[data-menupai='"+pai+"']").each(function(){
        if($(this).prop('checked')){
            $("input[id='c_menu_"+pai+"']").prop('checked', true);
            return;
        }
    });
}
function montarGrid(dados){
    var txt = "<table id='lista_padrao_table' style='padding:0px!important;font-size:11px;width:100%' class='display responsive nowrap table table-striped table-hover table-xs'>";
    txt+=`<thead>
            <tr>
                <th>Nome do Perfil: </th>
                <th>Nome Fantasia Empresa: </th>
                <th>Data do cadastro: </th>
                <th>Usuário que cadastrou: </th>
                <th>Ações: </th>
            </tr>
        </thead>`;
    txt += "<tbody>";
    for(x in dados){
        txt += "<tr data-codigo='"+dados[x].c_perfil+"'>";
            txt+="<td>";
                txt+= dados[x].t_perfil;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_fantasia;
            txt+="</td>";
            txt+="<td>";
                txt+= (new Date(dados[x].data_cad)).toLocaleString();
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_nome;
            txt+="</td>";
            txt+="<td>";
                txt+= `<button class='btn btn-xs btn-primary' onclick='abrirmodalEditar(${dados[x].c_perfil});'>
                            <em class='fa fa-pencil'/> 
                            Editar
                        </button>`;
            txt+="</td>";
        txt += "</tr>";
    }
    txt += "</tbody></table>";
    $('#lista_padrao').html(txt);
    toDataTableGrid();
}