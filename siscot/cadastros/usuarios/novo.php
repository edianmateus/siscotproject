<form id="formulario-usuario" data-url="crud.php">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="codigo" id="codigo" value="0"/>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_nome">Nome do Usuário</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="100"
                    autocomplete="off"
                    class="form-control" 
                    id="t_nome" 
                    name="t_nome"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_cpf">CPF</label>
                <input 
                    type="text" 
                    maxlength="11"
                    required="required" 
                    autocomplete="off"
                    class="form-control" 
                    id="t_cpf" 
                    name="t_cpf"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="c_empresa">Empresa</label>
                <select id="c_empresa" 
                        name="c_empresa" 
                        data-placeholder="Selecione a empresa" 
                        data-error="Selecione a empresa" 
                        class="chosen-select form-control select-empresa" 
                        required="required">
                </select>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="c_grupos">Grupo</label>
                <select id="c_grupos" 
                        name="c_grupos" 
                        data-placeholder="Selecione o grupo de empresas" 
                        data-error="Selecione o grupo de empresas" 
                        class="chosen-select form-control select-grupo-empresas">
                        <option value=""> </option>
                </select>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_email">E-mail</label>
                <input 
                    type="email" 
                    required="required" 
                    autocomplete="off"
                    maxlength="50"
                    class="form-control" 
                    id="t_email" 
                    name="t_email"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_senha">Senha</label>
                <input 
                    type="text"  
                    maxlength="50"
                    autocomplete="off"
                    class="form-control" 
                    id="t_senha" 
                    name="t_senha"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_fone">Telefone</label>
                <input 
                    type="tel" 
                    required="required" 
                    autocomplete="off"
                    maxlength="15"
                    class="form-control" 
                    id="t_fone" 
                    name="t_fone"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="c_perfil">Perfil</label>
                <select id="c_perfil" 
                        name="c_perfil" 
                        data-placeholder="Selecione o perfil" 
                        data-error="Selecione o perfil" 
                        class="chosen-select form-control select-perfil" 
                        required="required">
                </select>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="c_ativo">Ativo:
                    <input 
                        name="c_ativo"
                        id="c_ativo" 
                        class="ace ace-switch ace-switch-5" 
                        type="checkbox">
                        <span class="lbl"></span>
                </label>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="modalformulario-cancelar" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
        <button type="submit" id="modalformulario-salvar" class="btn btn-primary"><span class="fa fa-save"></span> Salvar</button>
    </div>
</form>

