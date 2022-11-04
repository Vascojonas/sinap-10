<?php
	namespace Sinap\Group\Controller;

	use Sinap\DB\config\database;

	class EquipamentoController extends database {

        public function createProprio() {
            $codigo = $_POST['at_codigo_equipamento_proprio'];
            $result = mysqli_query($this->open(), "SELECT * FROM equipamentos WHERE items = ".$codigo." ");
            $rowCount = mysqli_num_rows($result);
            if($rowCount > 0) {
                $sqlUp = "UPDATE equipamentos SET depreciacao_horaria = '".$_POST['dh']."', juros = '".$_POST['jh']."', seguros = '".$_POST['sh']."', armazenamento = '".$_POST['ah']."', pneus = '".$_POST['ph']."', energia = '".$_POST['eh']."', combustivel = '".$_POST['gh']."', lubrificantes = '".$_POST['lh']."', operador = '".$_POST['moh']."', manutencao = '".$_POST['mh']."', custo_total_produtivo = '".$_POST['ctpce']."', custo_total_improdutivo = '".$_POST['cti']."', data_registo = '".date('Y-m-d H:i:s')."' WHERE items = $codigo";
				$update = mysqli_query($this->open(), $sqlUp);

                echo json_encode($update);
            } else {
                $sql = "INSERT INTO equipamentos (items, depreciacao_horaria, juros, seguros, armazenamento, pneus, energia, combustivel, lubrificantes, operador, manutencao, custo_total_produtivo, custo_total_improdutivo, data_registo, data_alterado) VALUES ('".$_POST['at_codigo_equipamento_proprio']."', '".$_POST['dh']."', '".$_POST['jh']."', '".$_POST['sh']."', '".$_POST['ah']."', '".$_POST['ph']."', '".$_POST['eh']."', '".$_POST['gh']."', '".$_POST['lh']."', '".$_POST['moh']."', '".$_POST['mh']."', '".$_POST['ctpce']."', '".$_POST['cti']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
                $save = mysqli_query($this->open(), $sql);

                echo json_encode($save);
            }
        }
    
        public function getOwnEquipament() {
            $sql = "SELECT * FROM equipamentos WHERE items = ".$_GET['codigo']." ";
			$result = mysqli_query($this->open(), $sql);
			$eq = array();

			if (mysqli_num_rows($result) > 0) {
			  	// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$eq[] = $row;
				}

			  	echo json_encode($eq);
			} else {
			  	echo json_encode(false);
			}

			mysqli_close($this->open());
        }

        public function createAlugado() {
            $codigo = $_POST['at_codigo_equipamento_alugado'];
            $result = mysqli_query($this->open(), "SELECT * FROM equipamento_alugado WHERE items = ".$codigo." ");
            if(mysqli_num_rows($result) > 0) {
                $sqlUp = "UPDATE equipamento_alugado SET aluguer = '".$_POST['alh']."', custo_total_produtivo = '".$_POST['ctpce2']."', custo_total_improdutivo = '".$_POST['cti2']."', data_alterado = '".date('Y-m-d H:i:s')."' WHERE items = $codigo";

				$updated = mysqli_query($this->open(), $sqlUp);
                echo json_encode($updated);
            } else {
                $sql = "INSERT INTO equipamento_alugado (items, aluguer, custo_total_produtivo, custo_total_improdutivo, data_registo, data_alterado) VALUES ('".$_POST['id_codigo_equipamento_alugado']."', '".$_POST['alh']."', '".$_POST['ctpce2']."', '".$_POST['cti2']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
                $save = mysqli_query($this->open(), $sql);

                echo json_encode($save);
            }
        }

        public function getRentedEquipament() {
            $sql = "SELECT * FROM equipamento_alugado WHERE items = ".$_GET['codigo']." ";
            $result = mysqli_query($this->open(), $sql);
			$equipamento = array();

			if (mysqli_num_rows($result) > 0) {
			  	// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$equipamento[] = $row;
				}

			  	echo json_encode($equipamento);
			} else {
			  	echo json_encode(false);
			}

			mysqli_close($this->open());
        }
	}
?>