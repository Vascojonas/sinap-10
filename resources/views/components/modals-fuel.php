<div class="modal fade" id="combustivel" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mb-0 text-center">combustível (gh)</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmCombustivel">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="motor">Tipo de motor</label>
                                <select class="form-control" name="motor" id="motor">
                                    <option value="galosina">Motor a gasolina</option>
                                    <option value="diesel">Motor a diesel</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="factorPotencia">Factor de potência (f=%)</label>
                                <input type="text" name="f" id="f" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="potenciaMotor">Potência do motor (Hp)</label>
                                <input type="text" name="hp" id="hp" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="custoCombustivel">Custo do combustível (Mt)</label>
                                <input type="text" name="cc" id="cc" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="public/img/combustivel.jpg" alt="">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-combustivel" style="color: white;" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>