<?php
	namespace Sinap\Group\Controller;

	use Sinap\DB\config\database;

	class ServicosController extends database {

		public function getServicos() {
			$pesquisa = $_GET['search'];
			$sql = "SELECT codigo, designacao, unidade, preco_unitario FROM servicos WHERE codigo LIKE '%$pesquisa%' OR designacao LIKE '%$pesquisa%'";
			$result = mysqli_query($this->open(), $sql);
			$response = array();

			if (mysqli_num_rows($result) > 0) {
			  	// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$response[] = array("value" => $row['codigo'], "label" => $row['codigo'], "descricao" => $row['designacao'], "unidade" => $row['unidade'],"preco" => $row['preco_unitario']);
				}
			  	echo json_encode($response);
			} else {
			  	echo json_encode('0 resultados');
			}

			mysqli_close($this->open());
		}

		public function getItems() {
			$codigo = $_GET['codigo'];
			$sql = "SELECT * FROM items WHERE servicos_id = $codigo ORDER BY descricao ASC";
			$result = mysqli_query($this->open(), $sql);
			$response = array();
			if (mysqli_num_rows($result) > 0) {
			  	// output data of each row
				$total = 0;
				$soma = 0;
				$button = "";
				while($row = mysqli_fetch_assoc($result)) {
					$soma = $row['coeficiente'] * $row['preco_unitario'];
                	$total += $soma;
					$preco = ($row['preco_unitario'] == 0) ? 0 : $row['preco_unitario'];
					if($row['unidade'] == "H") {
						$button = '<button type="button" class="btn btn-secondary shadow-3-strong btn-rounded btn-sm" data-at-codigo="'.$row['id'].'" data-at-coe="'.$row['coeficiente'].'" data-at-un="'.$row['unidade'].'" id="mao-obra">Mo</button>';
					} elseif($row['unidade'] == "CHI" || $row['unidade'] == "CHP") {
						$button = '<button type="button" class="btn btn-secondary shadow-3-strong btn-rounded btn-sm" data-at-codigo="'.$row['id'].'" data-at-coe="'.$row['coeficiente'].'" data-at-un="'.$row['unidade'].'" id="equipamento">Eq</button>';
					} else {
						$button = '';
					}
					$response[] = array("id" => $row['id'], "item" => '<div class="row" style="display: flex;align-items: center;">
                        <input type="hidden" name="id[]" value="'.$row['id'].'" multiple/>
                        <div class="col-sm-12 col-md-7 col-lg-7">
							<div class="form-group">
                                <div class="nk-int-st">
                                	<input type="hidden" name="des[]" value="'.$row['unidade'].'" multiple/>
                                    <textarea rows="3" class="form-control" name="descricao[]" id="descricao" disabled>'.$row['descricao'].'</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1">
							<div class="form-group">
                                <div class="nk-int-st">
                                	<input type="hidden" name="uni[]" value="'.$row['unidade'].'" multiple/>
                                    <input type="text" class="form-control" name="unidade[]" id="unidade" value="'.$row['unidade'].'" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <div class="nk-int-st">
                                	<input type="hidden" name="coe[]" value="'.$row['coeficiente'].'" multiple/>
                                    <input type="text" class="form-control" name="coeficiente[]" id="coeficiente" value="'.$row['coeficiente'].'" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="form-group">
                                <div class="nk-int-st d-flex">
                                    <input type="text" class="form-control preco-'.$row['id'].'" name="preco[]" id="preco" placeholder="Preço" value="'.$preco.'">
									'.$button.'
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>', "codigo" => $row['servicos_id']);
				}
				$data = array(
					'items' => $response,
					'total' => $total
				);
			  	echo json_encode($data);
			}

			mysqli_close($this->open());
		}

		public function putItems() {
			$coe = $_POST['coe'];
			$codigo = $_POST['frmCodigo'];
			$sql = "";

			for($i = 0; $i < count($coe); $i++) {
				if(!empty($_POST['descricao'])) {
					$sql = "UPDATE items SET descricao = '".$_POST['descricao'][$i]."', unidade = '".$_POST['unidade'][$i]."', coeficiente = '".$_POST['coeficiente'][$i]."', preco_unitario = '".$_POST['preco'][$i]."' WHERE id = ".$_POST['id'][$i]." AND servicos_id = $codigo";
				} else {
					$sql = "UPDATE items SET preco_unitario = '".$_POST['preco'][$i]."' WHERE id = ".$_POST['id'][$i]." AND servicos_id = $codigo";
				}
				$sql = "UPDATE items SET preco_unitario = '".$_POST['preco'][$i]."' WHERE id = ".$_POST['id'][$i]." AND servicos_id = $codigo";
				mysqli_query($this->open(), $sql);	
			}

			$sql2 =  "UPDATE servicos SET preco_unitario = '".$_POST['total']."' WHERE codigo = $codigo";
			if (mysqli_query($this->open(), $sql2)) {
				echo json_encode(true);
			} else {
			 	echo "Error updating record: " . mysqli_error($this->open());
			}
		}

		public function putPrecoSemIva() {
			$codigo = $_POST['codigo'];
			$preco = $_POST['preco'];
			
			$result = mysqli_query($this->open(), "SELECT * FROM custos WHERE servicos_id = ".$codigo." ");
			if (mysqli_num_rows($result) > 0) {
				$sqlUp = "UPDATE custos SET despesa_inicial = '".$_POST['despesaInicial']."', adminitracao_local = '".$_POST['administracaoLocal']."', adminitracao_central = '".$_POST['administracaoCentral']."', despesa_financeira = '".$_POST['despesaFinanceira']."', despesa_manutencao = '".$_POST['despesaManutencao']."', risco = '".$_POST['risco']."', despesa_1 = '".$_POST['despesa1']."', despesa_2 = '".$_POST['despesa2']."', despesa_3 = '".$_POST['despesa3']."', iva = '".$_POST['iva']."', outros_tributos_1 = '".$_POST['outrosTributos1']."', outros_tributos_2 = '".$_POST['outrosTributos2']."', outros_tributos_3 = '".$_POST['outrosTributos3']."', outros_tributos_4 = '".$_POST['outrosTributos4']."', lucro_bruto = '".$_POST['lucroBruto']."', indutor_custo_k = '".$_POST['indutorK']."', custo_directo = '".$_POST['cd']."', data_alterado = '".date('Y-m-d H:i:s')."' WHERE servicos_id = $codigo";
				mysqli_query($this->open(), $sqlUp);
			} else {
				$sqlIn = "INSERT INTO custos (servicos_id, despesa_inicial, adminitracao_local, adminitracao_central, despesa_financeira, despesa_manutencao, risco, despesa_1, despesa_2, despesa_3, iva, outros_tributos_1, outros_tributos_2, outros_tributos_3, outros_tributos_4, lucro_bruto, indutor_custo_k, custo_directo, data_registo, data_alterado) VALUES('".$_POST['frmcdg']."', '".$_POST['despesaInicial']."', '".$_POST['administracaoLocal']."', '".$_POST['administracaoCentral']."', '".$_POST['despesaFinanceira']."', '".$_POST['despesaManutencao']."', '".$_POST['risco']."', '".$_POST['despesa1']."', '".$_POST['despesa2']."', '".$_POST['despesa3']."', '".$_POST['iva']."', '".$_POST['outrosTributos1']."', '".$_POST['outrosTributos2']."', '".$_POST['outrosTributos3']."', '".$_POST['outrosTributos4']."', '".$_POST['lucroBruto']."', '".$_POST['indutorK']."', '".$_POST['cd']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
				mysqli_query($this->open(), $sqlIn);
			}

			$sql2 =  "UPDATE servicos SET preco_unitario = '".$preco."' WHERE codigo = $codigo";
			if (mysqli_query($this->open(), $sql2)) {
				echo json_encode(true);
			} else {
			 	echo "Error updating record: " . mysqli_error($this->open());
			}
		}

		public function custoK() {
			$sql = "SELECT * FROM custos WHERE servicos_id = ".$_GET['servico']." ";
			$result = mysqli_query($this->open(), $sql);
			$custos_indirectos = array();

			if (mysqli_num_rows($result) > 0) {
			  	// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$custos_indirectos[] = $row;
				}
				$data = array(
					'custos' => $custos_indirectos,
					'estado' => true
				);
			  	echo json_encode($data);
			} else {
			  	echo json_encode('0');
			}

			mysqli_close($this->open());
		}
	}
?>