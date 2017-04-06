<?php if ( ! defined('ABSPATH')) exit; ?>
    
    <?php
        // Carrega todos os métodos do modelo
        $modelo->validate_register_form();
        $modelo->get_register_form( chk_array( $parametros, 1 ) );
        $modelo->del_fornecedor( $parametros );
	?>

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="<?php echo HOME_URI; ?>/fornecedor/cad" class="btn btn-success waves-effect waves-light"><b>Incluir</b></a>
            </div>

            <h4 class="page-title">Listagem de fornecedores</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo HOME_URI; ?>">Início</a>
                </li>
                <li class="active">
                    Listagem de fornecedores
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="m-t-0 header-title"><b>Listagem de fornecedores</b></h4>
                <p class="text-muted font-13 m-b-30">
                </p>

                <?php
                    // Lista os usuários
                    $lista = $modelo->getFornecedores();
                ?>

                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Cod.</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>nº</th>
                        <th>Ramo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista as $fetch_data): ?>
                        <tr>
                            <td> <?php echo $fetch_data['idPessoa'] ?> </td>
                            <td> <?php echo $fetch_data['nome'] ?> </td>
                            <td> <?php echo $fetch_data['logradouro'] ?> </td>
                            <td> <?php echo $fetch_data['numero'] ?> </td>
                            <td> <?php echo $fetch_data['telefone'] ?> </td>
                            <td align="right">
                                <a href="<?php echo HOME_URI ?>/fornecedor/cad/edit/<?php echo $fetch_data['idPessoa'] ?>" class="on-default edit-row"><i class="fa fa-pencil text-primary"></i></a>
                                &nbsp;&nbsp;
                                <a href="<?php echo HOME_URI ?>/fornecedor/cad/del/<?php echo $fetch_data['idPessoa'] ?>" class="on-default remove-row"><i class="fa fa-trash-o text-danger"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>