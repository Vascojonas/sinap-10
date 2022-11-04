<div class="modal fade overflow-y-auto" id="coef" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Custo de manutenção - coeficiente</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmCoeficiente">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="tipo">Tipo</label>
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="0.5">Guindaste</option>
                                    <option value="0.8">Caminhão comum</option>
                                    <option value="1">Fora-de-estrada</option>
                                    <option value="1">Carregadeira</option>
                                    <option value="1.4">Escavadeira</option>
                                    <option value="1.1">Motoescrêiper</option>
                                    <option value="1.2">Trator de esteira</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="temperatura">Temperatura</label>
                                <select class="form-control" name="temperatura" id="temperatura">
                                    <option value="1.3">Muito quente (> 40o C)</option>
                                    <option value="1.1">Quente (30 a 40o C)</option>
                                    <option value="1">Médio (10 a 30o C)</option>
                                    <option value="1.2">Frio (< 10o C)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="qualidadeOperador">Qualidade do Operador</label>
                                <select class="form-control" name="qualidade_operador" id="qualidade-operador">
                                    <option value="0.8">Excelente</option>
                                    <option value="0.9">Boa</option>
                                    <option value="1">Médio</option>
                                    <option value="1.2">Ruim</option>
                                    <option value="2">Péssimo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="qualidadeEquipamento">Qualidade do Equipamento</label>
                                <select class="form-control" name="qualidade_equipamento" id="qualidade-equipamento">
                                    <option value="0.8">De primeira</option>
                                    <option value="1">Média</option>
                                    <option value="1.5">Ruim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="horasUso">Horas de Uso</label>
                                <select class="form-control" name="horas_uso" id="horas-uso">
                                    <option value="0.5">1000</option>
                                    <option value="0.5">2000</option>
                                    <option value="0.6">3000</option>
                                    <option value="0.7">4000</option>
                                    <option value="0.9">5000</option>
                                    <option value="1">6000</option>
                                    <option value="1.3">8000</option>
                                    <option value="1.6">10000</option>
                                    <option value="1.9">12000</option>
                                    <option value="2.3">15000</option>
                                    <option value="3">20000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="condicoesTrabalho">Condições de Trabalho</label>
                                <select class="form-control" name="condicoes_trabalho" id="condicoes-trabalho">
                                    <option value="0.4">Em espera</option>
                                    <option value="0.8">Leves</option>
                                    <option value="1">Médias</option>
                                    <option value="1.4">Pesadas</option>
                                    <option value="2">Severas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="manutencao2">Manutenção</label>
                                <select class="form-control" name="manutencao2" id="manutencao2">
                                    <option value="0.6">Excelente</option>
                                    <option value="0.8">Boa</option>
                                    <option value="1">Médias</option>
                                    <option value="1.5">Ruim</option>
                                    <option value="3">Inexistente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="vidaUtilAnos">Vida Útil em Anos</label>
                                <select class="form-control" name="vida_util_anos" id="vida-util-anos">
                                    <option value="0.6">1</option>
                                    <option value="0.7">2</option>
                                    <option value="0.8">3</option>
                                    <option value="0.9">4</option>
                                    <option value="1">5</option>
                                    <option value="1">6</option>
                                    <option value="1.1">7</option>
                                    <option value="1.2">8</option>
                                    <option value="1.3">9</option>
                                    <option value="1.4">10</option>
                                    <option value="2">15</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="ritmoTrabalho">Ritmo de Trabalho</label>
                                <select class="form-control" name="ritmo_trabalho" id="ritmo-trabalho">
                                    <option value="0.9">Folgado</option>
                                    <option value="1">Médio</option>
                                    <option value="1.5">Com pressa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="conhecimentoServico">Conhecimento do Serviço</label>
                                <select class="form-control" name="conhecimento_servico" id="conhecimento-servico">
                                    <option value="0.8">Grande</option>
                                    <option value="0.9">Médio</option>
                                    <option value="1">Pouco</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="tipoServico">Tipo de Serviço</label>
                                <select class="form-control" name="tipo_servico" id="tipo-servico">
                                    <option value="0.8">Mina ou pedreira</option>
                                    <option value="1">Construção geral</option>
                                    <option value="1.4">Aluguel a terceiros</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-coeficiente" style="color: white;" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>