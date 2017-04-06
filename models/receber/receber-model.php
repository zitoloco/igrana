<?php 
/**
 * Classe para registros de contas a receber.
 *
 */

class ReceberModel
{

	/**
	 * $form_data
	 *
	 * Os dados do formulário de envio.
	 *
	 */	
	public $form_data;

	/**
	 * $form_msg
	 *
	 * As mensagens de feedback para o usuário.
	 *
	 */	
	public $form_msg;

	/**
	 * $db
	 *
	 * O objeto da conexão PDO
	 *
	 */
	public $db;

	/**
	 * Construtor
	 * 
	 * Carrega  o DB.
	 *
	 */
	public function __construct( $db = false ) {
		$this->db = $db;
	}

	/**
	 * Valida o formulário de envio
	 * 
	 * Este método pode inserir ou atualizar dados.
	 */
	public function validate_register_form () {
	
		// Configura os dados do formulário
		$this->form_data = array();
		
		// Verifica se algo foi postado
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {
		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {
			
				// Configura os dados do post para a propriedade $form_data
				$this->form_data[$key] = $value;
			
			}
		
		} else {
		
			// Termina se nada foi enviado
			return;
			
		}
		
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {
			
			echo 'preenchido';
			return;
		}
		
		// Verifica se o registro existe
		$db_check_data = $this->db->query (
			'SELECT * FROM `contas` WHERE `idConta` = ?',
			array( 
				chk_array( $this->form_data, 'id')
			) 
		);
		
		// Verifica se a consulta foi realizada com sucesso
		if ( ! $db_check_data ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Não foi possível realizar a consulta. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da base de dados MySQL
		$fetch_data = $db_check_data->fetch();
		
		// Configura o ID da tabela
		$data_id = $fetch_data['idConta'];

		// Array com dados do formulario
        $arrayData = array(
            'idPessoa'        => chk_array( $this->form_data, 'idPessoa'),
            'dataLancamento'  => ( ( !empty(chk_array( $this->form_data, 'dataLancamento') ) ) ? converteData( chk_array( $this->form_data, 'dataLancamento') ) : NULL),
            'dataVencimento'  => ( ( !empty(chk_array( $this->form_data, 'dataVencimento') ) ) ? converteData( chk_array( $this->form_data, 'dataVencimento') ) : NULL),
            'historico'       => chk_array( $this->form_data, 'historico'),
            'documento'       => chk_array( $this->form_data, 'documento'),
            'tipo'            => 'receber'
        );

        if( isset($this->form_data['valor']) )
        	$arrayData['valor'] = str_replace( ' ','',str_replace( 'R$','',str_replace( ',','.',$this->form_data['valor'] ) ) );

        if( isset($this->form_data['valorPago']) )
        	$arrayData['valorPago'] = str_replace( ' ','',str_replace( 'R$','',str_replace( ',','.',$this->form_data['valorPago'] ) ) );
		
		// Se o ID não estiver vazio, atualiza os dados
		if ( ! empty($data_id) ) {

			$query = $this->db->update('contas', 'idConta', $data_id, $arrayData);
			
			// Verifica se a consulta está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
										<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
										<span><b> Não foi possível realizar a consulta no banco de dados. </b></span>
								   </div>';
				
				// Termina
				return;
			} else {
				$this->form_msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Sucesso!</b> Os dados foram gravados corretamente.
                                    </div>';
				
				// Termina
				return;
			}
		// Se o ID estiver vazio, insere os dados
		} else {
		
			// Executa a inserção 
			if( !empty($this->form_data['mesesRepete']) ){

				for($i=0;$i<=$this->form_data['mesesRepete'];$i++)
				{
					$query = $this->db->insert('contas', $arrayData);
					$arrayData['dataVencimento'] = date('Y-m-d', strtotime("+1 month", strtotime($arrayData['dataVencimento'])));
				}
			}else{
				$query = $this->db->insert('contas', $arrayData);
			}
			
			// Verifica se a inserção está OK e configura a mensagem
			if ( ! $query ) {
				$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
										<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
										<span><b> Erro ao inserir as informações no banco de dados. </b></span>
								   </div>';
				
				// Termina
				return;
			} else {

                // Faz a consulta para obter o valor
                $consulta_ult_reg = $this->db->query(
                    'SELECT `idConta` FROM `contas` ORDER BY `idConta` DESC LIMIT 1'
                );

                // Obtém os dados
                $ultimo_reg= $consulta_ult_reg->fetch();

                // Configura os dados do formulário
                $this->form_data = $ultimo_reg;
                $this->form_msg = '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Sucesso!</b> Os dados foram cadastrados corretamente.
                                    </div>';

                return;
			}
		}
	}
	
	/**
	 ** Busca dados do formulário
	 **/
	public function get_register_form ( $register_id = false ) {
	
		// O ID que vamos pesquisar
		$s_register_id = false;
		
		// Verifica se você enviou algum ID para o método
		if ( ! empty( $register_id ) ) {
			$s_register_id = (int)$register_id;
		}
		
		// Verifica se existe um ID
		if ( empty( $s_register_id ) ) {
			return;
		}
		
		// Verifica na base de dados
		$query = $this->db->query('SELECT * FROM `contas` WHERE `idConta` = ? LIMIT 1', array( $s_register_id ));
		
		// Verifica a consulta
		if ( ! $query ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Registro não existe. </b></span>
							   </div>';
			return;
		}
		
		// Obtém os dados da consulta
		$fetch_registerdata = $query->fetch();
		
		// Verifica se os dados da consulta estão vazios
		if ( empty( $fetch_registerdata ) ) {
			$this->form_msg = '<div class="alert alert-danger" role="alert" align="center">
									<button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									<span><b> Registro não existe. </b></span>
							   </div>';
			return;
		}
		
		// Configura os dados do formulário
		foreach ( $fetch_registerdata as $key => $value ) {
			$this->form_data[$key] = $value;
		}
	}
	//Busca_dados_do_formulário
	
	/**
	 ** Apaga Registro
	 **/
	public function del_receber ( $parametros = array() ) {

		// O ID do usuário
		$receber_id = null;
		
		// Verifica se existe o parâmetro "del" na URL
		if ( chk_array( $parametros, 0 ) == 'del' ) {
			
			$this->form_msg_del = '<script>
                                        swal({
                                            title: "Tem certeza?",
                                            text: "Após a exclusão, você não poderá recuperar o registro.",
                                            type: "warning",
                                            showCancelButton: true,
                                            cancelButtonText: "Cancelar",
                                            confirmButtonColor: "#DD6B55",
                                            confirmButtonText: "Sim, excluir!",
                                            closeOnConfirm: false
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                window.location.assign("' . $_SERVER['REQUEST_URI'] . '/confirma");
                                            } else {
                                                window.location.assign("' . HOME_URI . '/receber/");
                                            }
                                        });
                                   </script>';

			// Verifica se o valor do parâmetro é um número
			if ( 
				is_numeric( chk_array( $parametros, 1 ) )
				&& chk_array( $parametros, 2 ) == 'confirma' 
			) {
				// Configura o ID do cliente a ser apagado
                $receber_id = chk_array( $parametros, 1 );
			}
		}
		
		// Verifica se o ID não está vazio
		if ( !empty( $receber_id ) ) {
		
			// O ID precisa ser inteiro
            $receber_id = (int)$receber_id;
			
			// Deleta o cliente
			$query = $this->db->delete('receber', 'idConta', $receber_id);
			
			// Redireciona para a página de registros
			echo '<meta http-equiv="Refresh" content="0; url=' . HOME_URI . '/receber/">';
			echo '<script type="text/javascript">window.location.href = "' . HOME_URI . '/receber/";</script>';
			return;
		}
	}
	
	/**
	 ** Lista contas a receber
	 **/
	public function getReceber() {
	
		// Simplesmente seleciona os dados na base de dados 
		$query = $this->db->query('SELECT * FROM `contas` `c` LEFT JOIN `pessoa` `p` ON `c`.`idPessoa` = `p`.`idPessoa`');
		
		// Verifica se a consulta está OK
		if ( ! $query ) {
			return array();
		}
		// Preenche a tabela com os dados do usuário
		return $query->fetchAll();
	}

	public function getClientes() {

        // Simplesmente seleciona os dados na base de dados
        $query = $this->db->query('SELECT * FROM `pessoa` WHERE tipo = "cliente" ORDER BY `nome`');

        // Verifica se a consulta está OK
        if ( ! $query ) {
            return array();
        }
        // Preenche a tabela com os dados do cliente
        return $query->fetchAll();
    }
}