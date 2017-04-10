<?php if ( ! defined('ABSPATH')) exit; ?>

<?php
    // Carrega todos os métodos do modelo
    $modelo->validate_register_form();
    $modelo->get_register_form( chk_array( $parametros, 1 ) );
    $modelo->del_receber( $parametros );
?>

<?php if( !empty( $modelo->form_msg_del ) ){ echo $modelo->form_msg_del; } ?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Cadastro de conta à receber</h4>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo HOME_URI; ?>">Início</a>
            </li>
            <li>
                <a href="<?php echo HOME_URI; ?>/fornecedor">Listagem de contas à receber</a>
            </li>
            <li class="active">
                Cadastro de conta à receber
            </li>
        </ol>
    </div>
</div>

<?php echo $modelo->form_msg;?>

<div class="row">
    <div class="<?php ( chk_array( $parametros, 1 ) ) ? print 'col-sm-9' : print 'col-sm-12'; ?>">
        <form method="post" action="">
            <div class="card-box">

                <h4 class="m-t-0 m-b-20 header-title"><b>Cadastro de conta à receber</b></h4>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nº do documento</label>
                            <input type="text" class="form-control border-input datepicker" id="documento" name="documento" value="<?php
                            echo htmlentities( chk_array( $modelo->form_data, 'documento') ); ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Data de lançamento *</label>
                            <input type="text" class="form-control border-input datepicker" placeholder="99/99/9999" id="dataLancamento" name="dataLancamento" value="<?php
                            if(empty(chk_array( $modelo->form_data, 'dataCriacao'))){ echo converteData(date("Y-m-d")); } else { echo htmlentities( converteData(chk_array( $modelo->form_data, 'dataLancamento')) ); } ?>" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Data de vencimento *</label>
                            <input type="text" class="form-control border-input datepicker" placeholder="99/99/9999" id="dataVencimento" name="dataVencimento" value="<?php
                            echo htmlentities( converteData( chk_array( $modelo->form_data, 'dataVencimento') ) ); ?>" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Valor total *</label>
                            <input type="text" class="form-control border-input" placeholder="0,00" id="valor" name="valor" value="<?php
                            echo htmlentities(  imprimeValorFormatado(chk_array( $modelo->form_data, 'valor'),1) ); ?>" required align="right">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cliente *</label>
                            <select class="form-control select2" required="required" id="idPessoa" name="idPessoa">
                                <option value="">< Selecione ></option>
                                <?php
                                // Lista os clientes
                                $lista = $modelo->getClientes();
                                foreach ($lista as $fetch_clientes): ?>
                                    <option value="<?php echo $fetch_clientes['idPessoa']; ?>" <?php if( isset($modelo->form_data['idPessoa']) && $modelo->form_data['idPessoa'] == $fetch_clientes['idPessoa']) echo 'selected="selected"'; ?>>
                                        <?php echo $fetch_clientes['nome']; ?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Historico</label>
                            <textarea class="form-control border-input" placeholder="Aqui será exibido o histórico do titulo." rows="3" name="historico" id="historico"><?php
                                echo htmlentities( chk_array( $modelo->form_data, 'historico') ); ?></textarea>
                        </div>
                    </div>
                </div>
                <?php if( empty(chk_array( $modelo->form_data, 'idConta')) )
                { 
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        Esta conta se repetirá nos próximos meses?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="visibility: hidden;" id="repete">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Quantos meses?</label>
                                <input type="number" min="0" class="form-control border-input" id="mesesRepete" name="mesesRepete" value="">
                            </div>
                        </div>
                    </div>
                    <?php 
                } 
                ?>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="text" id="id" name="id" value="<?php echo htmlentities( chk_array( $modelo->form_data, 'idConta') ); ?>" hidden>
                        <br>
                        <button class="btn btn-success waves-effect waves-light" type="submit">
                            Gravar
                        </button>
                        <a href="<?php echo HOME_URI . '/receber/';?>" class="btn btn-white waves-effect waves-light m-l-5">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php if(chk_array( $parametros, 1 )) {
        ?>
        <div class="col-sm-3">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Data de quitação</label>
                            <input type="text" class="form-control border-input datepicker" placeholder=""
                                   id="dataQuitacao" name="dataQuitacao" value="<?php
                            echo htmlentities(converteData(chk_array($modelo->form_data, 'dataQuitacao'))); ?>"
                                   readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Última alteração</label>
                            <input type="text" class="form-control border-input datepicker" placeholder=""
                                   id="ultimaAlteracao" name="ultimaAlteracao" value="<?php
                            echo htmlentities(converteData(chk_array($modelo->form_data, 'ultimaAlteracao'))); ?>"
                                   readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Valor pago</label>
                            <input type="text" class="form-control border-input" id="valorPago" name="valorPago"
                                   value="<?php
                                   if (isset($modelo->form_data['valorPago'])) echo imprimeValorFormatado($modelo->form_data['valorPago'], 1);
                                   ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Valor em aberto</label>
                            <input type="text" class="form-control border-input" id="valorPendente" name="valorPendente"
                                   value="<?php
                                   if (isset($modelo->form_data['valorPago'])) echo imprimeValorFormatado($modelo->form_data['valor'] - $modelo->form_data['valorPago'], 1);
                                   ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }?>
</div>
<br>

<script>
    $(document).ready(function(){
        // Masks
        $("#dataLancamento").mask('00/00/0000');
        $("#dataVencimento").mask('00/00/0000');
        $("#valor").mask("000.000.000,00", {reverse: true});
        $("#dataVencimento").mask('00/00/0000');

        $("#checkbox2").click(function(){
            if(document.getElementById('repete').style.visibility == "hidden"){
                document.getElementById('repete').style.visibility = "visible";
            }
            else{
                document.getElementById('repete').style.visibility = "hidden";
                $('#mesesRepete').val('');
            }
        })
    });
</script>

<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script src="<?php echo HOME_URI; ?>/views/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo HOME_URI; ?>/views/assets/pages/jquery.form-advanced.init.js"></script>