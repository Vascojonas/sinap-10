<div class="modal fade overflow-y-auto" id="manutencao" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mb-0 text-center">Manutenção Horária(mh)</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmManutencao">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="coeficiente">Coeficiente (K)</label>
                                <input type="text" name="coeficiente2" id="coeficiente2" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="valorAquisicao">Valor de aquisição (Vo)</label>
                                <input type="text" name="vo3" id="vo3" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="vidaUtilAno">Vida útil em anos (n)</label>
                                <input type="text" name="n3" id="n3" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="numeroHorasUtilizacaoAno">Número de horas de utilização por ano (a)</label>
                                <input type="text" name="nhua" id="nhua" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="public/img/manutencao.jpg" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-manutencao" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>