<div class="modal fade overflow-y-auto" id="depreciacao-horaria" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mb-0 text-center">Depreciação horária (dh)</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmDepreciacao">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="vo" style="margin-bottom: 0px;">Valor inicial (Vo)</label>
                                <input type="text" name="vo" id="vo" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="vr" style="margin-bottom: 0px;">Valor residual (Vr)</label>
                                <input type="text" name="vr" id="vr" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="n" style="margin-bottom: 0px;">Vida util (em anos) (n)</label>
                                <input type="text" name="n" id="n" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="a" style="margin-bottom: 0px;">Número de horas de utilização por ano (a)</label>
                                <input type="text" name="a" id="a" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <img src="public/img/depreciacao.jpg" alt="">
                            <img src="public/img/depreciacao2.jpg" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-depreciacao" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>