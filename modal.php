<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" method="post" name="formulario" id="formulario">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="nombre" class="control-label"
                                    style="position: relative; top:7px;">Nombres:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="apellidos" class="control-label"
                                    style="position: relative; top:7px;">Apellidos:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="apellidos" id="apellido">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="telefono" class="control-label"
                                    style="position: relative; top:7px;">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="carrera" class="control-label"
                                    style="position: relative; top:7px;">carrera:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="carrera" id="carrera">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="pais" class="control-label"
                                    style="position: relative; top:7px;">pais:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pais" id="pais">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="logo" class="control-lable" style="position: relative; top:7px;">Logo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="imagen" id="imagen" class="form-control">
                                <input type="hidden" name="imagenactual" id="imagenactual">
                                <img src="" alt="" id="imagenmuestra" name="imagenmuestra" width="150px" height="120px">
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span>Cancelar</button>
                    <button type="submit" name="agregar" id="agregar" class="btn btn-primary" data-dismiss="modal" onclick="grabar()"><span
                            class="glyphicon glyphicon-floppy-disk"></span>Guardar</button>
                </div>
            </div>
        </div>

    </div>

</div>