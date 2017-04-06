<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
    // Carrega todos os métodos do modelo
    $modelo->get_register_form( chk_array( $parametros, 1 ) );
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
    <div class="col-sm-6">
        <form method="post" action="">
            <div class="card-box">

                <h4 class="m-t-0 m-b-20 header-title"><b>Dados da baixa</b></h4>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Data do pagamento</label>
                            <input type="text" class="form-control" id="field-5" placeholder="United States">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Valor do pagamento</label>
                            <input type="text" class="form-control" id="field-6" placeholder="123456">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7" class="control-label">Informação ref. a baixa</label>
                            <textarea class="form-control autogrow" id="field-7" placeholder="O que for escrito neste campo, será registrado no histórico do título." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="text" id="id" name="id" value="<?php echo htmlentities( chk_array( $modelo->form_data, 'idConta') ); ?>" hidden>
                        <br>
                        <button class="btn btn-success waves-effect waves-light" type="submit">
                            Confirmar baixa
                        </button>
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
                        if( isset($modelo->form_data['valorPago']) ) echo imprimeValorFormatado($modelo->form_data['valorPago'],1);
                        ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>