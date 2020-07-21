<form id="formulario-empresa" data-url="crud.php">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="codigo" id="codigo" value="0"/>
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <label for="t_fantasia">Nome do Produto:</label>
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
                <label for="t_fantasia">Marca:</label>
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
                <label for="t_fantasia">Unidade Medida:</label>
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

