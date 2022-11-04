<div class="modal fade" id="custos" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="mb-0 text-center">Custos Indirectos (K)</h4>
            </div>
            <div class="modal-body">
                <form method="POST" name="frmPrecoDespesas" id="frmPrecoDespesas">
                    <input type="hidden" name="cd" id="cd" value="">
                    <input type="hidden" name="pv" id="pv" value="">
                    <input type="hidden" name="frmcdg" id="frmcdg" value="">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 px-5">
                            <div class="bg-inverse-secondary mb-3 py-1">
                                <p class="text-center mb-0">DESPESAS</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="despesaInicial">Despesa Inicial (D) (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="despesaInicial" id="despesaInicial" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="administracaoLocal" class="my-auto">Administração Local (AL) (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="administracaoLocal" id="administracaoLocal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="administracaoCentral" class="my-auto">Administração Central (AC) (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="administracaoCentral" id="administracaoCentral" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="despesaFincanceira" class="my-auto">Despesa Financeira (DF) (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="despesaFinanceira" id="despesaFinanceira" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="despesaManutencao" class="my-auto">Despesa de Manutenção (DM) (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="despesaManutencao" id="despesaManutencao" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-8 col-md-7 my-auto">
                                    <label for="risco" class="col-sm-5 my-auto">Risco (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="risco" id="risco" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-8 col-md-7 my-auto">
                                    <label for="despesa1" class="col-sm-5 my-auto">Emolumento (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="despesa1" id="emolumento" onclick=" startup()" readonly class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="despesa2" class="my-auto">Despesa 2 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="despesa2" id="despesa2" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-7 my-auto">
                                    <label for="despesa3" class="my-auto">Despesa 3 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5 my-auto">
                                    <input type="text" name="despesa3" id="despesa3" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 px-5">
                            <div class="bg-inverse-secondary mb-3 py-1">
                                <p class="text-center mb-0">TRIBUTOS E LUCRO</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="iva" class="my-auto">IVA (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="iva" id="iva" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="outrosTributos1" class="my-auto">Outros Tributos 1 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="outrosTributos1" id="outrosTributos1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="outrosTributos2" class="my-auto">Outros Tributos 2 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="outrosTributos2" id="outrosTributos2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="outrosTributos3" class="my-auto">Outros Tributos 3 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="outrosTributos3" id="outrosTributos3" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="outrosTributos4" class="my-auto">Outros Tributos 4 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="outrosTributos4" id="outrosTributos4" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="outrosTributos5" class="my-auto">Outros Tributos 5 (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="outrosTributos5" id="outrosTributos5" class="form-control">
                                </div>
                            </div>
                            <div class="bg-inverse-secondary my-3 py-1">
                                <p class="text-center mb-0">LUCRO</p>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="lucroBruto" class="my-auto">Lucro Bruto (L) (%)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="text" name="lucroBruto" id="lucroBruto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-7 my-auto">
                                    <label for="indutorCusto" class="my-auto">Indutor de Custo (K)</label>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <input type="hidden" name="indutorK" id="indutorK" class="form-control">
                                    <input type="text" name="indutorCusto" id="indutorCusto" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded me-2" style="color: white;" id="editar-custo">Editar</button>
                        <button type="submit" class="btn btn-md btn-secondary shadow-3-strong btn-rounded me-2" style="color: white;" id="gravar">gravar</button>
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-custos-indirectos" style="color: white;">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <button class="d-none" id="btn"  data-toggle="modal" data-target=".bd-example-modal-sm"></button>

            <div class="modal fade bd-example-modal-sm col-6" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h4" id="mySmallModalLabel">Emolumento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="floating-label" for="Email">Digita o valor do trabalho</label>
                                        <input type="number" class="form-control" id="valor_emolumento">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Percetual por usar <span id="percentual"><span></label>
                                        <input type="text" class="form-control" id="emolumento_percentual">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    
    
    </div>

    </div>    
    
