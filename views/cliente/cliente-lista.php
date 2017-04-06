<?php if ( ! defined('ABSPATH')) exit; ?>
    
    <?php
        // Carrega todos os métodos do modelo
        $modelo->validate_register_form();
        $modelo->get_register_form( chk_array( $parametros, 1 ) );
        $modelo->del_cliente( $parametros );
	?>

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                <a href="<?php echo HOME_URI; ?>/cliente/cad" class="btn btn-success waves-effect waves-light"><b>Incluir</b></a>
            </div>

            <h4 class="page-title">Listagem de clientes</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo HOME_URI; ?>">Início</a>
                </li>
                <li class="active">
                    Listagem de clientes
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <h4 class="m-t-0 header-title"><b>Listagem de clientes</b></h4>
                <p class="text-muted font-13 m-b-30">
                </p>

                <?php
                    // Lista os usuários
                    $lista = $modelo->getClientes();
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
                    <?php foreach ($lista as $fetch_userdata): ?>
                        <tr>
                            <td> <?php echo $fetch_userdata['idPessoa'] ?> </td>
                            <td> <?php echo $fetch_userdata['nome'] ?> </td>
                            <td> <?php echo $fetch_userdata['logradouro'] ?> </td>
                            <td> <?php echo $fetch_userdata['numero'] ?> </td>
                            <td> <?php echo $fetch_userdata['telefone'] ?> </td>
                            <td align="right">
                                <a href="<?php echo HOME_URI ?>/cliente/cad/edit/<?php echo $fetch_userdata['idPessoa'] ?>" class="on-default edit-row"><i class="fa fa-pencil text-primary"></i></a>
                                &nbsp;&nbsp;
                                <a href="<?php echo HOME_URI ?>/cliente/cad/del/<?php echo $fetch_userdata['idPessoa'] ?>" class="on-default remove-row"><i class="fa fa-trash-o text-danger"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>