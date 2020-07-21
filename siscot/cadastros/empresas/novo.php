<form id="formulario-empresa" data-url="crud.php">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="codigo" id="codigo" value="0"/>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_fantasia">Nome fantasia:</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="60"
                    autocomplete="off"
                    class="form-control" 
                    id="t_fantasia" 
                    name="t_fantasia"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_razao">Razão social:</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="60"
                    autocomplete="off"
                    class="form-control" 
                    id="t_razao" 
                    name="t_razao"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_cpfcnpj">CPF / CNPJ:</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="20"
                    autocomplete="off"
                    class="form-control" 
                    id="t_cpfcnpj" 
                    name="t_cpfcnpj"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_responsavel">Responsável:</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="60"
                    autocomplete="off"
                    class="form-control" 
                    id="t_responsavel" 
                    name="t_responsavel"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_email">E-mail principal:</label>
                <input 
                    type="email" 
                    required="required" 
                    maxlength="50"
                    autocomplete="off"
                    class="form-control" 
                    id="t_email" 
                    name="t_email"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_fone">Telefone principal:</label>
                <input 
                    type="tel" 
                    required="required" 
                    maxlength="13"
                    autocomplete="off"
                    class="form-control" 
                    id="t_fone" 
                    name="t_fone"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-8 col-md-6">
                <label for="t_endereco">Endereço:</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="60"
                    autocomplete="off"
                    class="form-control" 
                    id="t_endereco" 
                    name="t_endereco"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-6 col-sm-4 col-md-2">
                <label for="t_numero">Nº:</label>
                <input 
                    type="tel" 
                    required="required" 
                    maxlength="10"
                    autocomplete="off"
                    class="form-control" 
                    id="t_numero" 
                    name="t_numero"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_bairro">Bairro:</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="60"
                    autocomplete="off"
                    class="form-control" 
                    id="t_bairro" 
                    name="t_bairro"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="c_uf">UF:</label>
                <select id="c_uf" 
                        name="c_uf" 
                        data-placeholder="Selecione a UF" 
                        data-error="Selecione a UF" 
                        class="chosen-select form-control select-uf" 
                        required="required">
                </select>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="c_cidade">Cidade:</label>
                <select id="c_cidade" 
                        name="c_cidade" 
                        data-placeholder="Selecione a cidade" 
                        data-error="Selecione a cidade" 
                        class="chosen-select form-control select-cidade" 
                        required="required">
                </select>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12">
                <label for="t_obs">Observação:</label>
                <textarea id="t_obs" 
                        name="t_obs" 
                        rows="5"
                        data-placeholder="Observação da empresa..." 
                        data-error=" " 
                        class="form-control"></textarea>
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

