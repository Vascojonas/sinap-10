<div class="modal fade" id="descricao" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Custos directos</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmPreco">
                    <input type="hidden" name="frmCodigo" id="frmCodigo" />
                    <div id="items"></div>
                    <div class="col-sm-12 mg-b-15">
                        <div class="form-group row">
                            <div class="col-sm-8 col-form-label">
                                <b class="float-end">Total: </b>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <input name="total" id="total" id="Modaltotal" class="form-control float-end" value="0.00 MZN" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary shadow-3-strong btn-rounded me-2" id="adicionar">+</button>
                        <button type="button" class="btn btn-secondary shadow-3-strong btn-rounded me-2" id="editar">Editar</button>
                        <button type="submit" class="btn btn-secondary shadow-3-strong btn-rounded me-2" id="gravar">Gravar</button>
                        <button type="button" class="btn btn-secondary shadow-3-strong btn-rounded close">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>