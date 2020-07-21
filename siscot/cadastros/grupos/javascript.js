$(document).ready(function(){
    buscarLista();
    salvarModalPadrao('formulario-grupo');
});
function montarGrid(dados){
    var txt = "<table id='lista_padrao_table' style='padding:0px!important;font-size:11px;width:100%' class='display responsive nowrap table table-striped table-hover table-xs'>";
    txt+=`<thead>
            <tr>
                <th>Grupo: </th>
                <th>Ações: </th>
            </tr>
        </thead>`;
    txt += "<tbody>";
    for(x in dados){
        txt += "<tr data-codigo='"+dados[x].c_grupo+"'>";
            txt+="<td>";
                txt+= dados[x].t_grupo;
            txt+="</td>";
            txt+="<td>";
                txt+= `<button class='btn btn-xs btn-primary' onclick='abrirmodalEditar(${dados[x].c_grupo});'>
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