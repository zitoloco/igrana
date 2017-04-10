<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
    // Carrega todos os métodos do modelo
    $modelo->get_register_form( chk_array( $parametros, 1 ) );
    $modelo->del_receber( $parametros );
    $modelo->baixaRecebimento();
?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15">
            <a href="<?php echo HOME_URI; ?>/receber/cad" class="btn btn-success waves-effect waves-light"><b>Incluir</b></a>
        </div>

        <h4 class="page-title">Listagem de contas à receber</h4>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo HOME_URI; ?>">Início</a>
            </li>
            <li class="active">
                Listagem de contas à receber
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <h4 class="m-t-0 header-title"><b>Listagem de contas à receber</b></h4>
            <p class="text-muted font-13 m-b-30">
            </p>

            <?php
                // Lista os usuários
                $lista = $modelo->getReceber();
            ?>

            <table id="datatable-responsive"
                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Cliente</th>
                    <th>Data de lançamento</th>
                    <th>Data de vencimento</th>
                    <th>Data de quitação</th>
                    <th>Valor pago</th>
                    <th>Valor total</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $fetch_data): ?>
                    <tr>
                        <td> <?php echo $fetch_data['idConta'] ?> </td>
                        <td> <?php echo $fetch_data['nome'] ?> </td>
                        <td> <?php echo converteData( $fetch_data['dataLancamento'] ); ?> </td>
                        <td> <?php echo converteData( $fetch_data['dataVencimento'] ); ?> </td>
                        <td> <?php echo converteData( $fetch_data['dataQuitacao']); ?> </td>
                        <td align="right"> <?php echo imprimeValorFormatado($fetch_data['valorPago'],1); ?> </td>
                        <td align="right"> <?php echo imprimeValorFormatado($fetch_data['valor'],1); ?> </td>
                        <td> 
                            <?php 
                            if( $fetch_data['valorPago'] < $fetch_data['valor']) 
                            { 
                                echo '<span class="label label-warning">Pendente</span>'; 
                            }else{
                                echo '<span class="label label-success">Baixado</span>';
                            }
                            ?>
                        </td>
                        <td align="right">
                            <a href="<?php echo HOME_URI ?>/receber/baixa/<?php echo $fetch_data['idConta'] ?>" class="btn btn-link waves-effect btn-xs text-success">Baixar</a>
                            &nbsp;&nbsp;
                            <a href="<?php echo HOME_URI ?>/receber/cad/edit/<?php echo $fetch_data['idConta'] ?>" class="on-default edit-row"><i class="fa fa-pencil text-primary"></i></a>
                            &nbsp;&nbsp;
                            <a href="<?php echo HOME_URI ?>/receber/cad/del/<?php echo $fetch_data['idConta'] ?>" class="on-default remove-row"><i class="fa fa-trash-o text-danger"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal-Effect -->
<script src="<?php echo HOME_URI;?>/views/assets/plugins/custombox/js/custombox.min.js"></script>
<script src="<?php echo HOME_URI;?>/views/assets/plugins/custombox/js/legacy.min.js"></script>