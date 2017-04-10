<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
    // Carrega todos os métodos do modelo
    $modelo->get_register_form( chk_array( $parametros, 0 ) );
    $cliente = $modelo->getClientes( chk_array( $modelo->form_data, 'idPessoa' ) );
?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Baixa de conta à receber</h4>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo HOME_URI; ?>">Início</a>
            </li>
            <li>
                <a href="<?php echo HOME_URI; ?>/fornecedor">Listagem de contas à receber</a>
            </li>
            <li class="active">
                Baixa de conta à receber
            </li>
        </ol>
    </div>
</div>

<?php echo $modelo->form_msg;?>

<div class="row">
    <div class="col-sm-9">
        <form method="post" action="<?php echo HOME_URI; ?>/receber" id="realizarBaixa">
            <div class="card-box">

                <!-- Modal -->
                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title">Confirmação de baixa</h4>
                    <div class="custom-modal-text">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                Deseja confirmar a baixa do pagamento?
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <br>
                                <button class="btn btn-success waves-effect waves-light" type="submit" id="submitBaixa">
                                    Confirmar
                                </button>
                                <button onclick="Custombox.close();" class="btn btn-white waves-effect waves-light m-l-5">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="m-t-0 m-b-20 header-title"><b>Dados da baixa</b></h4>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Data do pagamento</label>
                            <input type="text" class="form-control" id="dataQuitacao" name="dataQuitacao" placeholder="" value="<?php echo date('d/m/Y'); ?>" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Valor do pagamento</label>
                            <input type="text" class="form-control" id="valorPagamento" name="valorPagamento" placeholder="" value="<?php
                            if( isset($modelo->form_data['valorPago']) ) echo imprimeValorFormatado($modelo->form_data['valor'] - $modelo->form_data['valorPago'],1);
                            ?>" required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7" class="control-label">Informação ref. a baixa</label>
                            <textarea class="form-control autogrow" id="descricaoBaixa" name="descricaoBaixa" placeholder="O que for escrito neste campo, será registrado no histórico do título." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="text" id="id" name="id" value="<?php echo htmlentities( chk_array( $modelo->form_data, 'idConta') ); ?>" hidden>
                        <input type="text" id="operacao" name="operacao" value="baixar_recebimento" hidden>
                        <br>
                        <a href="#custom-modal" class="btn btn-primary waves-effect waves-light" data-animation="blur" data-plugin="custommodal"
                           data-overlaySpeed="100" data-overlayColor="#36404a">
                            Confirmar baixa
                        </a>
                        <a href="<?php echo HOME_URI . '/receber';?>" class="btn btn-white waves-effect waves-light m-l-5">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-3">
        <div class="card-box">

            <h4 class="m-t-0 m-b-20 header-title"><b>Informações do título</b></h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Data de vencimento</label>
                        <input type="text" class="form-control border-input datepicker" placeholder="" value="<?php
                        echo htmlentities( converteData(chk_array( $modelo->form_data, 'dataVencimento')) ); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Valor em aberto</label>
                        <input type="text" class="form-control border-input" id="valorPendente" name="valorPendente" value="<?php
                        if( isset($modelo->form_data['valorPago']) ) echo imprimeValorFormatado($modelo->form_data['valor'] - $modelo->form_data['valorPago'],1);
                        ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Valor pago</label>
                        <input type="text" class="form-control border-input" id="valorPago" name="valorPago" value="<?php
                        if( isset($modelo->form_data['valorPago']) ) echo imprimeValorFormatado($modelo->form_data['valorPago'],1);
                        ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cliente</label>
                        <input type="text" class="form-control border-input" id="valorPago" name="valorPago" value="<?php
                        echo $cliente['nome'];
                        ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>

<script>
    $(document).ready(function(){
        $('#submitBaixa').click(function () {
            $('#realizarBaixa').submit();
        })
    });
</script>

<!-- Modal-Effect -->
<script src="<?php echo HOME_URI; ?>/views/assets/plugins/custombox/js/custombox.min.js"></script>
<script src="<?php echo HOME_URI; ?>/views/assets/plugins/custombox/js/legacy.min.js"></script>