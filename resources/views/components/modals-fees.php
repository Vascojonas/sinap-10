<div class="modal fade overflow-y-auto" id="juros" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mb-0 text-center">Juros Horários (jh)</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmJuros">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="numeroHorasUtilizacaoAno">Taxa anual de juros (i) (%)</label>
                                <input type="text" name="i" id="i" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="numeroHorasUtilizacaoAno">Número de horas de utilização por ano (a) (%)</label>
                                <input type="text" name="a2" id="a2" class="form-control">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="valorInicial">Valor inicial (Vo) (%)</label>
                                <input type="text" name="vo2" id="vo2" class="form-control">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="valorResidual">Valor residual (Vr) (%)</label>
                                <input type="text" name="vr2" id="vr2" class="form-control">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="vidaUtil">Vida util (em anos) (n) (%)</label>
                                <input type="text" name="n2" id="n2" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="public/img/juros.jpg" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-juros" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>