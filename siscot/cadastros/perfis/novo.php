<form id="formulario-perfil" data-url="crud.php">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="codigo" id="codigo" value="0"/>
            <div class="form-group col-xs-12">
                <label for="t_perfil">Nome do Perfil</label>
                <input 
                    type="text" 
                    required="required" 
                    autocomplete="off"
                    class="form-control" 
                    id="t_perfil" 
                    name="t_perfil"/>
                <div class="help-block with-errors"></div>
            </div>
            <?php 
                foreach ($_SESSION['menus'] as $menu) {
                    echo '<div class="widget-box transparent ui-sortable-handle col-xs-12" id="widget-box-12" style="opacity: 1;">
                            <div class="widget-header">
                                <h4 class="widget-title lighter">'.$menu['t_menu'].'</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main padding-6 no-padding-left no-padding-right">';
                                //LISTA OS PAIS
                                echo "<input type='checkbox' 
                                        class='hidden'
                                        name='c_menu_".$menu['c_menu']."' 
                                        id='c_menu_".$menu['c_menu']."'/
                                        data-menupai='".$menu['c_pai']."'
                                        data-codigo='".$menu['c_menu']."'>";

                        foreach ($menu['sub_menus'] as $sub) {
                            //LISTA OS FILHOS
                            echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                                    <div class='checkbox'>
                                        <label>
                                            <input 
                                                name='c_menu_".$sub['c_menu']."' 
                                                id='c_menu_".$sub['c_menu']."' 
                                                data-menupai='".$sub['c_pai']."'
                                                data-codigo='".$sub['c_menu']."'
                                                type='checkbox'
                                                onchange='ativaPai(this);' 
                                                class='ace'>
                                            <span class='lbl'>".$sub['t_menu']."</span>
                                        </label>
                                    </div>
                                </div>";
                        }
                        echo "</div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" id="modalformulario-cancelar" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
        <button type="submit" id="modalformulario-salvar" class="btn btn-primary"><span class="fa fa-save"></span> Salvar</button>
    </div>
</form>

