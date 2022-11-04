<?php
	namespace Sinap\Group\Controller;

	use Sinap\DB\config\database;

	class MaoObraController extends database {

        public function create() {
            $sql = "INSERT INTO mao_obra (services, dependentes, salario, inss, irps, ferias_anuais, repouso_semanais, faltas_justificadas, feriados, dezimo_terceiro_b, dezimo_terceiro_c, total_parcial_a, total_parcial_b, total_parcial_c, incidencia_cumulativa, total_encargos, total_encargos_percentagem, data_registo, data_alterado) VALUES ('".$_POST['at_codigo']."', '".$_POST['dependentes']."', '".$_POST['vm']."', '".$_POST['inss']."', '".$_POST['irps2']."', '".$_POST['repousos']."', '".$_POST['faltas_justificadas']."', '".$_POST['feriados']."', '".$_POST['feriados_cidade']."', '".$_POST['dezimoTerceiroSalarioB']."', '".$_POST['dezimoTerceiroSalarioC']."', '".$_POST['total_parcial_a']."', '".$_POST['total_parcial_b']."', '".$_POST['total_parcial_c']."', '".$_POST['incidencia_cumulativa']."', '".$_POST['total_encargos']."', '".$_POST['percentagem_labor']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
            $save = mysqli_query($this->open(), $sql);

            echo json_encode($save);
        }
    
        public function getMaoObra() {
            $sql = "SELECT * FROM mao_obra WHERE services = ".$_GET['codigo']." ";
			$result = mysqli_query($this->open(), $sql);
			$mao_obra = array();

			if (mysqli_num_rows($result) > 0) {
			  	// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$mao_obra[] = $row;
				}

			  	echo json_encode($mao_obra);
			} else {
			  	echo json_encode(false);
			}

			mysqli_close($this->open());
        }
	}
?>