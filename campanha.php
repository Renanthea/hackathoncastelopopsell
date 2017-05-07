<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pg = "Campanha";
include_once('topo.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Incluir nova campanha
      <?

      ?>
    </h1>
  </section>

  <form method="post" action="script_campanha.php" >
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <style>
      .collapsed h4.panel-title {
        color: #999;
      }
      h4.panel-title {
        color: #000;
      }
      .panel-body smal {
        font-size: 11px;
        margin-left: 24px;
        color: #777;
      }
      </style>

      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="panel-group" id="accordion">
            <!-- Campanha -->
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    Campanha
                  </h4>
                </div>
              </a>
              <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nome da Campanha</label>
                        <input name="campanha" type="text" class="form-control" placeholder="Campanha">
                      </div>
                      <div class="form-group">
                        <a href="javascript:$('a[href=\'#collapse2\']').click();">
                          <button type="button" class="btn bg-purple btn-flat">Próximo <i class="fa fa-fw fa-chevron-down"></i></button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Avatar -->
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    Perfil
                  </h4>
                </div>
              </a>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">

                      <div class="row">
                        <div class="col-md-12">
                          <div id="map"  style="width: 100%; height:370px"></div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Sexo</label>
                            <div class="checkbox">
                              <label>
                                <input name="sexo[]" value="M" type="checkbox">
                                Masculino
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input name="sexo[]" value="F" type="checkbox">
                                Feminino
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Faixa Etária</label>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input name="idade[]" value="1" type="checkbox">
                                  De 18 a 35 anos
                                </label>
                              </div>

                              <div class="checkbox">
                                <label>
                                  <input name="idade[]" value="2" type="checkbox">
                                  De 36 a 48 anos
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input name="idade[]" value="3" type="checkbox">
                                  A partir de 49 anos
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Faixa de Renda</label>
                            <div class="checkbox">
                              <label>
                                <input name="renda[]" value="E - DE 0 A 2 SM" type="checkbox">
                                Até R$ 2.000
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input name="renda[]" value="D - DE 2 A 4 SM" type="checkbox">
                                De R$ 2.0000 a R$ 4.000
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input name="renda[]" value="C - DE 4 A 10 SM" type="checkbox">
                                De R$ 4.0000 a R$ 10.000
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input name="renda[]" value="B - DE 10 A 20 SM" type="checkbox">
                                De R$ 10.0000 a R$ 20.000
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input name="renda[]" value="A - ACIMA DE 20 SM" type="checkbox">
                                Acima de R$ 20.000
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <a href="javascript:$('a[href=\'#collapse3\']').click();">
                          <button type="button" class="btn bg-purple btn-flat">Próximo <i class="fa fa-fw fa-chevron-down"></i></button>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="">
                        <h1 style="font-size:25px !important;; margin-top:0px !important;"><span class="numero_pessoas">0</span> pessoas serão atingidas.</h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Canal -->
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    Mensagens por SMS
                  </h4>
                </div>
              </a>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mensagem 1</label><smal> | *Para criar links utilize <b>#link_sms_1#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal>
                        <input type="text" class="form-control" name="mensagem-1" placeholder="Mensagem">
                      </div>
                      <hr/>
                      <div class="form-group">
                        <label>Mensagem 2</label><smal> | *Para criar links utilize <b>#link_sms_2#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal>
                        <input type="text" class="form-control" name="mensagem-2" placeholder="Mensagem">
                      </div>
                      <hr/>
                      <div class="form-group">
                        <label>Mensagem 3</label><smal> | *Para criar links utilize <b>#link_sms_3#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal>
                        <input type="text" class="form-control" name="mensagem-3" placeholder="Mensagem">
                      </div>
                      <hr/>
                      <div class="form-group">
                        <button type="button" class="btn bg-purple btn-flat insere-sms"><i class="fa fa-fw fa-plus"></i> Criar mais mensagens</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="javascript:$('a[href=\'#collapse4\']').click();">
                          <button type="button" class="btn bg-purple btn-flat">Próximo <i class="fa fa-fw fa-chevron-down"></i></button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Jornada -->
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    Mensagens por E-mail
                  </h4>
                </div>
              </a>
              <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="form-group">
                          <label>E-mail 1</label><smal> | *Para criar links utilize <b>#link_mail_1#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal>
                          <input type="text" class="form-control" name="assunto-1" placeholder="Assunto">
                        </div>
                        <div>
                          <textarea class="textarea" placeholder="Mensagem" name="msm-email-1" id="msm-email-1" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                        <div class="form-group">
                          <label>E-mail 2</label><smal> | *Para criar links utilize <b>#link_mail_2#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal>
                          <input type="text" class="form-control" name="assunto-2" placeholder="Assunto">
                        </div>
                        <div>
                          <textarea class="textarea" placeholder="Mensagem" name="msm-email-2" id="msm-email-1" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                        <div class="form-group">
                          <label>E-mail 3</label><smal> | *Para criar links utilize <b>#link_mail_3#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal>
                          <input type="text" class="form-control" name="assunto-3" placeholder="Assunto">
                        </div>
                        <div>
                          <textarea class="textarea" placeholder="Mensagem" name="msm-email-3" id="msm-email-1" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                      </div>
                      <hr/>
                      <div class="form-group">
                        <button type="button" class="btn bg-purple btn-flat insere-email"><i class="fa fa-fw fa-plus"></i> Criar mais mensagens</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="javascript:$('a[href=\'#collapse4\']').click();">
                          <input type="submit" class="btn bg-purple btn-flat" value="Criar campanha" />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include_once('rodape.php') ?>

<script>
$(document).ready(function(){
  var qtdsms = 3;
  var qtdemail = 3;
  $('.insere-sms').click(function(){
    qtdsms++;
    $(this).parent().before('<div class="form-group"><label>Mensagem '+qtdsms+'</label><smal> | *Para criar links utilize <b>#link_sms_'+qtdsms+'#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal><input type="text" class="form-control" name="mensagem-'+qtdsms+'" placeholder="Mensagem"></div><hr/>');
  })
  $('.insere-email').click(function(){
    qtdemail++;
    $(this).parent().before('<div class="form-group"><div class="form-group"><label>E-mail '+qtdemail+'</label><smal> | *Para criar links utilize <b>#link_mail_'+qtdemail+'#TEXTO_DO_LINK#LINK_EXTERNO_SE_HOUVER#</b></smal><input type="text" class="form-control" name="assunto-'+qtdemail+'" placeholder="Assunto"></div><div><textarea class="textarea" name="msm-email-'+qtdemail+'" id="msm-email-'+qtdemail+'" placeholder="Mensagem" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div></div><hr/>');
    $("#msm-email-"+qtdemail).wysihtml5();
  })
})
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0_BXBFtq7vwQoJEgGpgAgZfhQjq1s39g"></script>
<script src="./dist/js/map.js"></script>


<script src="./dist/js/campaigns.js"></script>
