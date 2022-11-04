<div class="modal fade overflow-y-auto" id="mao-de-obra" role="dialog" style="display: none;z-index:1056;">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Mão de Obra</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmMaoObra">
                    <input type="hidden" name="at_codigo" id="at-codigo">
                    <input type="hidden" name="dependentes" id="dependentes">
                    <input type="hidden" name="salario_liquido" id="salario-liquido">
                    <input type="hidden" name="at_unidade" id="at-unidade">
                    <table class="table table-hover" id="salaryTable">
                        <col>
                        <colgroup span="2"></colgroup>
                        <colgroup span="2"></colgroup>
                        <tr>
                            <td rowspan="2"></td>
                            <th colspan="4" scope="colgroup" class="text-center">Grupo</th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center">A</th>
                            <th scope="col" class="text-center">B</th>
                            <th scope="col" class="text-center">C</th>
                        </tr>
                        <tr>
                        <th class="inss" scope="row">INSS</th>
                            <td>
                                <input class="form-control" name="inss" id="inss" data-inss="0.07" placeholder="A" value="0.0700"/>
                            </td>
                            <td>
                                <input class="form-control" name="b1" id="b1" placeholder="B" disabled/>
                            </td>
                            <td>
                                <input class="form-control" name="c1" id="c1" placeholder="C" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">IRPS</th>
                                <td>
                                    <input class="form-control" name="irps2" id="irps2" data-irps="0.09" placeholder="A" value="0.0219"/>
                                </td>
                                <td>
                                    <input class="form-control" name="b2" id="b2" placeholder="B" disabled/>
                                </td>
                                <td>
                                    <input class="form-control" name="c2" id="c2" placeholder="C" disabled/>
                                </td>
                            </tr>
                        </tr>
                        <tr>
                            <th scope="row">Férias anuais</th>
                                <td>
                                    <input class="form-control" name="a3" id="a3" placeholder="A" disabled/>
                                </td>
                                <td>
                                    <input class="form-control" name="b3" id="ferias-anuais" placeholder="B" value="0"/>
                                </td>
                                <td>
                                    <input class="form-control" name="c3" id="c3" placeholder="C" disabled/>
                                </td>
                            </tr>
                        </tr>
                        <tr>
                            <th scope="row">Repousos semanais remunerado</th>
                            <td>
                                <input class="form-control" name="a4" id="a4" placeholder="A" disabled/>
                            </td>
                            <td>
                                <input class="form-control" name="b4" id="repousos" placeholder="B" value="0"/>
                            </td>
                            <td>
                                <input class="form-control" name="c4" id="c4" placeholder="C" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Faltas justificadas</th>
                            <td>
                                <input class="form-control" name="a5" id="a5" placeholder="A" disabled/>
                            </td>
                            <td>
                                <input class="form-control" name="b5" id="faltas-justificadas" placeholder="B" value="0"/>
                            </td>
                            <td>
                                <input class="form-control" name="c5" id="c5" placeholder="C" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Feriados</th>
                            <td>
                                <input class="form-control" name="a6" id="a6" placeholder="A" disabled/>
                            </td>
                            <td>
                                <input class="form-control" name="b6" id="feriados" placeholder="B" value="0"/>
                            </td>
                            <td>
                                <input class="form-control" name="c6" id="c6" placeholder="C" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Feriado por dias da cidade</th>
                            <td>
                                <input class="form-control" name="a7" id="a7" placeholder="A" disabled/>
                            </td>
                            <td>
                                <input class="form-control" name="b7" id="feriados-cidade" placeholder="B" value="0"/>
                            </td>
                            <td>
                                <input class="form-control" name="c7" id="c7" placeholder="C" disabled/>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">13a salário</th>
                            <td class="text-end"></td>
                            <td class="text-end">
                                <input type="hidden" name="dezimoTerceiroSalarioB" id="dezimoTerceiroSalarioB">
                                <span class="dezimoTerceiroSalarioB"></span>
                            </td>
                            <td class="text-end">
                                <input type="hidden" name="dezimoTerceiroSalarioC" id="dezimoTerceiroSalarioC">
                                <span class="dezimoTerceiroSalarioC"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Total Parcial</th>
                            <td class="text-end">
                                <input type="hidden" name="total_parcial_a" id="total_parcial_a">
                                <span id="total-parcial-a"></span>
                            </td>
                            <td class="text-end">
                                <input type="hidden" name="total_parcial_b" id="total_parcial_b">
                                <span id="total-parcial-b"></span>
                            </td>
                            <td class="text-end">
                                <input type="hidden" name="total_parcial_c" id="total_parcial_c">
                                <span id="total-parcial-c"></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Incidência Cumulativa (Grupo A sobre Grupo B)</th>
                            <td class="text-end"></td>
                            <td class="text-end">
                                <input type="hidden" name="incidencia_cumulativa" id="incidencia_cumulativa">
                                <span id="incidencia-cumulativa"></span>
                            </td>
                            <td class="text-end"></td>
                        </tr>
                        <tr>
                            <th scope="row">Total dos Encargos</th>
                            <td class="text-end"></td>
                            <td class="text-end">
                                <input type="hidden" name="total_encargos" id="total_encargos">
                                <span id="total-encargos"></span>
                            </td>
                            <td class="text-end"></td>
                        </tr>
                        <tr>
                            <th scope="row">Percentagem</th>
                            <td class="text-end"></td>
                            <td class="text-end">
                                <input type="hidden" name="percentagem_labor" id="percentagem_labor">
                                <span id="percentagem-labor"></span>
                            </td>
                            <td class="text-end"></td>
                        </tr>
                    </table>
                    
                    <div class="mt-2 mb-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Vencimento Mensal (VM)=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="vm" id="vm" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Total de horas/semana (NHTS)=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="nhts" id="nhts" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de Anos de Serviço=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="nas" id="nas" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de Dias Trabalhaveis/Anos=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="nd" id="nd" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de Dias/Anos de Serviço=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="ndt" id="ndt" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">      
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de dias de Ferias Anuais=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="nfa" id="nfa" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de Dias Repousos Semanais=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="ndrs" id="ndrs" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de Faltas Justificadas=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="nfj" id="nfj" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div id="lblDescricao" style="width: 321.59px; padding: 9px 15px;text-align: right;">
                                        <label for="">Número de Feriados=</label>
                                    </div>
                                    <div id="txtVencimento" style="padding: 2px 15px">
                                        <input class="form-control" name="ndf" id="ndf" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-secondary shadow-3-strong btn-rounded" id="gravar-labor">Gravar</button>
                        <button type="button" class="btn btn-md btn-secondary shadow-3-strong btn-rounded close-mao-obra" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>