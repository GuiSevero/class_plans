<?php /* @var $this Controller */ ?>

<html lang="pt-BR">
  <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
     <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bst/bootstrap.css" media="screen">
     <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ."/css/templates/" .$model->theme .".min.css"?>">
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->     
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <style type="text/css">
  body{

    margin-top: 40px;
  }
  </style>
</head>
<body data-spy="scroll" data-target="#main-nav-bar" data-offeset="40">

 <div class="navbar navbar-default navbar-fixed-top" id="main-nav-bar">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
             <li class="active">
                <a href="#description">Descrição</a>
              </li>
              <li>
                <a href="#objectives">Objetivos</a>
              </li>
              <li>
                <a href="#contents">Conteúdo</a>
              </li>
              <li>
                <a href="#resources">Recursos</a>
              </li>
              <li>
                <a href="#evaluation">Sistema de Avaliação</a>
              </li>     
          </ul>

        </div>
      </div>
    </div>
 <!-- //FIM DO MENU  -->

<div class="container">
      <div class="row">
            <div class="col-lg-12">
              <div class="page-header">
                <h1><?php echo $model->title; ?></h1>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading" id="description">Descrição</div>
                <div class="panel-body">
                  <?php echo $model->description ?>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" id="objectives">Objetivos</div>
                <div class="panel-body">
                  <?php echo $model->objectives ?>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" id="contents">Conteúdo</div>
                <div class="panel-body">
                  <?php echo $model->contents ?>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" id="resources">Recursos</div>
                <div class="panel-body">
                  <?php echo $model->resources ?>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" id="evaluation">Sistema de Avaliação</div>
                <div class="panel-body">
                  <?php echo $model->evaluation ?>
                </div>
              </div>
          </div>

      </div>
</div>



<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php $baseUrl = Yii::app()->request->baseUrl; ?>
<script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $baseUrl; ?>/js/bootswatch.js"></script>

<script type="text/javascript">

</script>
</body>
</html>
