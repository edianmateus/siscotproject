$(document).ready(function(){
    buscarLista();
    salvarModalPadrao('formulario-usuario');
});
function montarGrid(dados){
    console.log(dados)
    var txt = "<table id='lista_padrao_table' style='padding:0px!important;font-size:11px;width:100%' class='display responsive nowrap table table-striped table-hover table-xs'>";
    txt+=`<thead>
            <tr>
                <th>Nome do Usuário: </th>
                <th>CPF: </th>
                <th>E-mail: </th>
                <th>Telefone: </th>
                <th>Perfil: </th>
                <th>Ativo: </th>
                <th>Data cadastro: </th>
                <th>Usuário que cadastrou: </th>
                <th>Ações: </th>
            </tr>
        </thead>`;
    txt += "<tbody>";
    for(x in dados){
        txt += "<tr data-codigo='"+dados[x].c_usuario+"'>";
            txt+="<td>";
                txt+= dados[x].t_nome;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_cpf;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_email;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_fone;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_perfil;
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].c_ativo;
            txt+="</td>";
            txt+="<td>";
                txt+= (new Date(dados[x].data_cad)).toLocaleString();
            txt+="</td>";
            txt+="<td>";
                txt+= dados[x].t_nome;
            txt+="</td>";
            txt+="<td>";
                txt+= `<button class='btn btn-xs btn-primary' onclick='abrirmodalEditar(${dados[x].c_usuario});'>
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