$(document).ready(function(){
    buscarLista();
    salvarModalPadrao('formulario-empresa');
});
function montarGrid(dados){
    var txt = "<table id='lista_padrao_table' style='padding:0px!important;font-size:11px;width:100%' class='display responsive nowrap table table-striped table-hover table-xs'>";
    txt+=`<thead>
            <tr>
                <th>Fantasia: </th>
                <th>Razão: </th>
                <th>CPF/CNPJ: </th>
                <th>Endereço: </th>
                <th>Telefone: </th>
                <th>Responsável: </th>
                <th>Ações: </th>
            </tr>
        </thead>`;
    txt += "<tbody>";
    for(x in dados){
        txt += "<tr data-codigo='"+dados[x].c_empresa+"'>";
            txt+="<td>";
                txt+= dados[x].t_fantasia;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_razao;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_cpfcnpj;
            txt+="</td>";
            txt+="<td>";
                txt+= (dados[x].t_endereco ? dados[x].t_endereco : "");
            txt+="</td>";
            txt+="<td>";
                txt+= (dados[x].t_fone ? dados[x].t_fone : "");
            txt+="</td>";
            txt+="<td>";
                txt+= (dados[x].t_responsavel ? dados[x].t_responsavel : "");
            txt+="</td>";
            txt+="<td>";
                txt+= `<button class='btn btn-xs btn-primary' onclick='abrirmodalEditar(${dados[x].c_empresa});'>
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