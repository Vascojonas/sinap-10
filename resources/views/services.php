<?php require_once('resources/views/components/head.php'); ?>

<body class="bg-inverse-secondary">
  <div class="container-scroller">
    <?php require_once('resources/views/components/navbar.php'); ?>
    <!-- partial -->
    <div class="main-panel">
      <div id="intro" class="bg-cover content-wrapper">
        <div class="row">
          <div class="col-lg-10 offset-lg-1 stretch-card">
            <div class="my-3 card">
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      <label class="form-label text-end col-form-label py-2 font-weight-bold">Projecto N.</label>
                      <input type="text" name="projecto" id="projecto" class="form-control py-2">
                    </div>
                    <div class="col-sm">
                      <label class="form-label text-end col-form-label py-2 font-weight-bold">Descrição</label>
                      <input type="text" name="descricaoProjecto1" id="descricaoProjecto1" class="form-control py-2">
                    </div>
                    <div class="col-sm">
                      <label class="form-label text-end col-form-label py-2 font-weight-bold">Localização</label>
                      <input type="text" name="localizacao" id="localizacao" class="form-control py-2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-10 offset-lg-1 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="my-3">
                  <div class="group-button">
                    <button class="btn btn-md btn-secondary shadow-3-strong btn-rounded" id="print">Imprimir</button>
                    <button class="btn btn-md btn-secondary shadow-3-strong btn-rounded" id="excel">Excel</button>
                    <button class="btn btn-md btn-secondary shadow-3-strong btn-rounded" id="pdf">PDF</button>
                  </div>
                </div>

                <div class="table-print">
                  <div class="table-responsive">
                    <table class="table table-vcenter" id="tablePcc">
                      <thead>
                        <tr>
                          <th width="8%">Código</th>
                          <th width="85%">Designação</th>
                          <th>Unidade</th>
                          <th>Quantidade</th>
                          <th>Preço Unitário (MTS)</th>
                          <th>Preço Total (MTS)</th>
                          <th id="hide">Acção</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr data-pin="1" id="capitulo" class="item">
                          <th colspan="7" class="bg-black bg-opacity-10 py-0 text-center delete">Capitulo 1</th>
                        </tr>
                        <tr id="1" data-cap="capitulo-1" class="capitulo-1">
                          <td class="p-0" colspan="7">
                            <table id="capitulo-1" data-id="1">
                              <tr>
                                <td class="py-1" scope="row"> - </td>
                                <td class="py-1 text-sm" style="white-space: break-spaces;"> - </td>
                                <td class="py-1" style="padding: 0px 15px"> - </td>
                                <td class="py-1" style="padding: 0px 15px">
                                  <input type="text" class="form-control form-control-sm py-2" placeholder="Qtd" type="text" id="quantidade" name="quantidade">
                                </td>
                                <td id="0" class="py-1 px-2 Modalpreco bg-inverse-secondary bg-opacity-50" style="padding: 0px 15px">
                                  <span class="preco" data-preco="0"> 0 </span>
                                </td>
                                <td class="py-1" style="padding: 0px 15px">
                                  <span class="preco-total" data-total="0"> 0 </span>
                                </td>
                                <td class="py-1" id="hide">
                                  <button type="button" class="btn btn-danger px-1 py-1" style="font-size: 18px" id="eliminar">E</button>
                                  <button type="button" class="btn btn-secondary px-1 py-1" style="font-size: 18px" id="btnCusto" data-preco-unitario="0" data-codigo="0">K</button>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr id="1" class="subtotal-1">
                          <td colspan="5" class="font-monospace text-end"><b>Subtotal:</b></td>
                          <td colspan="2" id="subtotal-1" data-subtotal="0">0</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="my-3">
                  <div class="form-group mb-1">
                    <div class="row">
                      <div class="col-lg-10 col-md-3 col-sm-3 col-xs-12 text-end px-1 my-auto">
                        <label class="font-10 col-3 col-form-label py-0 mb-0 font-weight-bold" style="font-size: 13px">Total: </label>
                      </div>
                      <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12 px-1">
                        <span class="xtotal" style="font-size: 13px">0 MTS</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-1">
                    <div class="row">
                      <div class="col-lg-10 col-md-3 col-sm-3 col-xs-12 text-end px-1 my-auto">
                        <label class="font-10 col-3 col-form-label py-0 mb-0 font-weight-bold" style="font-size: 13px">IVA: </label>
                      </div>
                      <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12 px-1">
                        <span class="iva" style="font-size: 13px">0 MTS</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-1">
                    <div class="row">
                      <div class="col-lg-10 col-md-3 col-sm-3 col-xs-12 text-end px-1 my-auto">
                        <label class="font-10 col-3 col-form-label py-0 mb-0 font-weight-bold" style="font-size: 13px">Contigencia: </label>
                      </div>
                      <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12 px-1">
                        <span class="contigencia" style="font-size: 13px">0</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-1">
                    <div class="row">
                      <div class="col-lg-10 col-md-3 col-sm-3 col-xs-12 text-end px-1 my-auto">
                        <label class="font-10 col-10 col-form-label py-0 mb-0 font-weight-bold" style="font-size: 13px">Total geral: </label>
                      </div>
                      <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12 px-1">
                        <span class="total-geral" style="font-size: 13px">0 MTS</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    <input type="text" name="codigo" id="codigo" class="form-control form-control-sm p-2" placeholder="Pesquisar por código ou descrição">
                  </div>
                  <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-secondary shadow-3-strong btn-rounded" id="btnSev">+</button>
                    <button class="btn btn-sm btn-secondary shadow-3-strong btn-rounded ms-1" id="btnCap">Adicionar capitulo</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php require_once('resources/views/components/modals-project.php') ?>
  <?php require_once('resources/views/components/modals.php') ?>
  <?php require_once('resources/views/components/modals-costs.php') ?>
  <?php require_once('resources/views/components/modals-labor.php') ?>
  <?php require_once('resources/views/components/modals-salary.php') ?>

  <?php require_once('resources/views/components/modals-choose-equipament.php') ?>
  <!-- Equipamento Proprio -->
  <div class="modal fade overflow-y-auto" id="equipamento-proprio" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="mb-0 text-center">Equipamentos Próprio (Eq)</h4>
        </div>
        <div class="modal-body">
          <form method="POST" id="frmEquipamentosProprio">
            <input type="hidden" name="id_codigo_equipamento_proprio" id="id-codigo-equipamento-proprio">
            <input type="hidden" name="at_codigo_equipamento_proprio" id="at-codigo-equipamento-proprio">
            <input type="hidden" name="at_unidade" id="at-unidade">
            <table class="table table-hover" id="rentTable">
              <col>
              <colgroup span="2"></colgroup>
              <tr>
                <td rowspan="2"></td>
                <th scope="col" class="text-center">Equipamentos Próprio</th>
              </tr>
              <tr>
                <th scope="col" class="text-center">Custos do Equipamento (MT/h)</th>
              </tr>
              <tr>
              <tr>
                <th scope="row">Depreciação Horária (Dh)</th>
                <td>
                  <input class="form-control" name="dh" id="dh" data-dh="0" value="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Juros (Jh)</th>
                <td>
                  <input class="form-control" name="jh" id="jh" data-jh="0" value="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Seguros (Sh)</th>
                <td>
                  <input class="form-control" name="sh" id="sh" data-sh="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Armazenamento (Ah)</th>
                <td>
                  <input class="form-control" name="ah" id="ah" data-ah="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Pneus (Ph)</th>
                <td>
                  <input class="form-control" name="ph" id="ph" data-ah="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Energia (Eh)</th>
                <td>
                  <input class="form-control" name="eh" id="eh" data-ah="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Combustível (Gh)</th>
                <td>
                  <input class="form-control" name="gh" id="gh" data-gh="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Lubrificantes (Lh)</th>
                <td>
                  <input class="form-control" name="lh" id="lh" data-lh="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Operador (Moh)</th>
                <td>
                  <input class="form-control" name="moh" id="moh" data-moh="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Manutenção (Mh)</th>
                <td>
                  <input class="form-control" name="mh" id="mh" data-mh="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Custo Total Produtivo</th>
                <td>
                  <input class="form-control" name="ctpce" id="ctpce" data-ctpce="0" value="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Custo Total Improdutivo</th>
                <td>
                  <input type="hidden" class="form-control" name="cti" id="cti" data-cti="0" />
                  <span id="custo-total-improdutivo"></span>
                </td>
              </tr>
            </table>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary shadow-3-strong btn-rounded" id="gravar-equipamento-proprio">Gravar</button>
              <button type="button" class="btn btn-secondary shadow-3-strong btn-rounded close-equipamento-proprio" data-dismiss="modal">Fechar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Equipamento Alugado -->
  <div class="modal fade overflow-y-auto" id="equipamento-alugado" role="dialog" style="display: none;">
    <div class="modal-dialog modal-large">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="mb-0 text-center">Equipamentos Alugados (Eq)</h4>
        </div>
        <div class="modal-body">
          <form method="POST" id="frmEquipamentosAlugado">
            <input type="hidden" name="id_codigo_equipamento_alugado" id="id-codigo-equipamento-alugado">
            <input type="hidden" name="at_codigo_equipamento_alugado" id="at-codigo-equipamento-alugado">
            <input type="hidden" name="at_unidade" id="at-unidade">
            <table class="table table-hover" id="rentTable">
              <col>
              <colgroup span="2"></colgroup>
              <tr>
                <td rowspan="2"></td>
                <th scope="col" class="text-center">Equipamentos Alugado</th>
              </tr>
              <tr>
                <th scope="col" class="text-center">Custos do Equipamento (MT/h)</th>
              </tr>
              <tr>
              <tr>
                <th scope="row">Aluguer</th>
                <td>
                  <input class="form-control" name="alh" id="alh" data-alh="0" value="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Custo Total Produtivo</th>
                <td>
                  <input class="form-control" name="ctpce2" id="ctpce2" data-ctpce2="0" value="0" />
                </td>
              </tr>
              <tr>
                <th scope="row">Custo Total Improdutivo</th>
                <td>
                  <input type="hidden" class="form-control" name="cti2" id="cti2" data-cti2="0" />
                  <span id="custo-total-improdutivo-2"></span>
                </td>
              </tr>
            </table>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary shadow-3-strong btn-rounded" id="gravar-equipamento-alugado">Gravar</button>
              <button type="button" class="btn btn-secondary shadow-3-strong btn-rounded close-equipamento-alugado" data-dismiss="modal">Fechar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('resources/views/components/modals-hourly-depreciation.php') ?>
  <?php require_once('resources/views/components/modals-fees.php') ?>
  <?php require_once('resources/views/components/modals-insurance.php') ?>
  <?php require_once('resources/views/components/modals-storage.php') ?>
  <?php require_once('resources/views/components/modals-pneu.php') ?>
  <?php require_once('resources/views/components/modals-power.php') ?>
  <?php require_once('resources/views/components/modals-fuel.php') ?>
  <?php require_once('resources/views/components/modals-lubricants.php') ?>
  <?php require_once('resources/views/components/modals-maintenance.php') ?>
  <?php require_once('resources/views/components/modals-coe.php') ?>

  <script src="public/vendors/js/vendor.bundle.base.js"></script>
  <script src="public/vendors/jquery-ui/jquery-ui.js"></script>
  <script src="public/vendors/jquery-number/jquery.number.min.js"></script>
  <script src="public/vendors/jquery.tableToExcel.js"></script>
  <script src="public/vendors/pdfmake.min.js"></script>
  <script src="public/vendors/html2canvas.min.js"></script>
  <script src="public/js/script.js"></script>
  
  <script src="public/js/k_custos_indiretos.js"></script>
  <!-- <script src="public/assets/js/vendor-all.min.js"></script> -->
  <script src="public/assets/js/plugins/bootstrap.min.js"></script>
</body>