<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pg = "Dashboard";
include_once('topo.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>

            <p>Vendas</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Saldo</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>

            <p>Enviado</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Conversões</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-8">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Clientes</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Campanha</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Status</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "
                SELECT cc.id id, ca.name campanha, cl.NOME nome, cl.TELEFONE1 telefone, cc.status status, cc.rating rating
                FROM CLIENTE_campaigns cc, CLIENTE cl, campaigns ca
                WHERE cc.id_cliente = cl.id_cliente
                AND ca.id = cc.id_campaigns
                ORDER BY cc.rating DESC LIMIT 100
                ";
                $result = query($sql);
                while($ln = mysql_fetch_array($result)){
                ?>
                <tr>
                  <td><?= $ln['id']?></td>
                  <td><?= $ln['campanha']?></td>
                  <td><?= $ln['nome']?></td>
                  <td><?= $ln['telefone']?></td>
                  <td><?= $ln['status']?></td>
                  <td><?= $ln['rating']?></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.nav-tabs-custom -->

        <!-- Chat box -->


      </section>
      <section class="col-lg-4">

        <!-- Custom tabs (Charts with tabs)-->
  <div class="box">
        <div class="box-header">
          <h3 class="box-title">Ações dos clientes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body acao-clientes">

Nenhuma ação nos últimos minutos.

        </div>

  </div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Vendas</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div id="container" style="min-width: 100%; max-width: 100%; height: 200px; margin: 0 auto"></div>

          </div>
        </div>
        <!-- right col -->
      </section>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('rodape.php') ?>
  <script>
  $(function () {
    $("#example1").DataTable();

var arrMsgs = [
'<i class="fa fa-mobile-phone"></i> Cliente Felipe abriu o 1º SMS.',
'<i class="fa fa-envelope-o"></i> Cliente Renan abriu o 1º E-mail.',
'<i class="fa fa-mobile-phone"></i> Cliente Felipe clicou no link do 1º SMS.',
'<i class="fa fa-mobile-phone"></i> Cliente Marta abriu o 3º SMS.',
'<i class="fa fa-mobile-phone"></i> Cliente Antônio abriu o 1º SMS.',
'<i class="fa fa-envelope-o"></i> Cliente Jorge clicou no link do 3º E-mail.',
'<i class="fa fa-mobile-phone"></i> Cliente Roberta abriu o 1º SMS.'];

indice=0;
setInterval(function(){
  $(".acao-clientes").html(arrMsgs[indice]);
  indice++;
  if(indice==8) indice = 0;
},5000);


  });


  Highcharts.chart('container', {
    chart: {
      type: 'funnel',
      marginRight: 100
    },
    title: {
      text: '',
      x: -50
    },
    plotOptions: {
      series: {
        dataLabels: {
          enabled: true,
          format: '{point.name}',
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
          softConnector: true
        },
        neckWidth: '10%',
        neckHeight: '0%'

        //-- Other available options
        // height: pixels or percent
        // width: pixels or percent
      }
    },
    legend: {
      enabled: false
    },
    series: [{
      name: 'Unique users',
      data: [
        ['Leads', 5654],
        ['Prospectos', 4064],
        ['Vendas', 1987],
        ['Clientes', 976]
      ]
    }]
  });
  (function() {

    setTimeout(function() {

      $('#myModal').modal('show');

    }, 20000);

  })();
  </script>
  <style>.highcharts-credits{display:none}
  .acao-clientes i {
    margin-right: 6px;
}
.acao-clientes {
    font-size: 16px;
    padding-bottom: 24px;
    font-weight: bold;
}
.nome-pop{
  font-size: 17px;
  font-weight: bold;
  color: #5E127C;
}
</style>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ligue Agora!</h4>
        </div>
        <div class="modal-body">
          <p>A Cliente <span class="nome-pop">Marta</span> clicou no último link da campanha Vestidos. </br><h2><b><a href="tel:01122533123" target="_blank">Ligue agora: (11) 2253-3123</a></b></h2></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <script src="dist/js/modal.js"></script>
