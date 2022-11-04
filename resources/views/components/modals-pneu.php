<div class="modal fade" id="pneu" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mb-0 text-center">Custo Horário de pneus (Ph)</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmPneu">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="numeroPneusEquipamento">Número de pneus de equipamento (p)</label>
                                <input type="text" name="npe" id="npe" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="custoUnitarioPneu">Custo unitário do pneu (Cp)</label>
                                <input type="text" name="cp" id="cp" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="vidaUtilPneu">Vida útel do pneu (VUp)</label>
                                <input type="text" name="vup" id="vup" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="public/img/pneus.jpg" alt="">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-pneu" style="color: white;" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>