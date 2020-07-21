<form id="formulario-grupo" data-url="crud.php">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="codigo" id="codigo" value="0"/>
            <div class="form-group col-xs-12">
                <label for="t_grupo">Nome do Grupo</label>
                <input 
                    type="text" 
                    required="required" 
                    maxlength="50"
                    autocomplete="off"
                    class="form-control" 
                    id="t_grupo" 
                    name="t_grupo"/>
                <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group col-xs-12">
                <label for="t_empresas_grupo[]">Empresas do Grupo</label>
                <select id="t_empresas_grupo[]" 
                        name="t_empresas_grupo[]" 
                        data-placeholder="Selecione as empresas" 
                        multiple="multiple"
                        data-error="Selecione as empresas" 
                        class="chosen-select form-control select-empresa multiple-select" 
                        required="required">
                </select>
                <div class="help-block with-errors">&nbsp;</div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="modalformulario-cancelar" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
        <button type="submit" id="modalformulario-salvar" class="btn btn-primary"><span class="fa fa-save"></span> Salvar</button>
    </div>
</form>

