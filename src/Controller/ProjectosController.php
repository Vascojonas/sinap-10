<?php
	namespace Sinap\Group\Controller;

	use Sinap\DB\config\database;

	class ProjectosController extends database {

        public function createProject() {
            $sql = "INSERT INTO projectos (numero, descricao, localizacao, data_registo, data_alterado) VALUES('".$_POST['projecto']."', '".$_POST['descricao']."', '".$_POST['localizacao']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
            if ($save = mysqli_query($this->open(), $sql)) {
                $query = "SELECT id FROM projectos ORDER BY id DESC";
                $result = mysqli_query($this->open(), $query);
                $id = mysqli_fetch_assoc($result);
                foreach($_POST['teia'] as $k => $items) {
                    if($k != 0) {
                        foreach ($items as $value) {
                            $sql2 = "INSERT INTO projecto_servicos (projecto_id, servicos_id, capitulo, quantidade, preco_unitario, preco_total, data_registo, data_alterado) VALUES('".$id['id']."', '".$value['codigo']."', '".$k."', '".$value['quantidade']."', '".$value['preco_unitario']."', '".$value['preco_total']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
                            mysqli_query($this->open(), $sql2);
                        }
                    }
                }
                echo json_encode($save);
            }
        }

        public function getProject() {
            $sql = "SELECT * FROM Projectos";
            $result = mysqli_query($this->open(), $sql);
            $projecto = array();

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $projecto[] = $row;
                }

                echo json_encode($projecto);
          } else {
                echo json_encode('0');
          }
        }

        public function getServices() {
            $sql = "SELECT servicos.codigo, servicos.designacao, servicos.unidade, projecto_servicos.capitulo, projecto_servicos.quantidade, projecto_servicos.preco_unitario, projecto_servicos.preco_total FROM projecto_servicos INNER JOIN servicos ON projecto_servicos.servicos_id = servicos.codigo WHERE projecto_id = ".$_POST['codigo']."";
			$result = mysqli_query($this->open(), $sql);
            $servicos = array();
            while($row = mysqli_fetch_assoc($result)) {
                $servicos[] = $row;
            }

            $sql2 = "SELECT * FROM projectos where id = ".$_POST['codigo']." ";
            $result2 = mysqli_query($this->open(), $sql2);
            $projecto = array();
            while($row2 = mysqli_fetch_assoc($result2)) {
                $projecto[] = $row2;
            }

            $data = array(
                'descricao' => $projecto,
                'servicos' => $servicos
            );

            echo json_encode($data);
        }
	}
?>