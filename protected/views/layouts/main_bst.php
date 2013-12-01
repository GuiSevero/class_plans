<?php /* @var $this Controller */ ?>

<html lang="pt">
  <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
     <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bst/bootstrap.css" media="screen">
     <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bst/bootswatch.min.css">
     <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/typeahead.css">
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->     
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <style type="text/css">
  body{

    margin-top: 26px;
  }
  </style>
</head>
<body>

 <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo $this->createUrl('/site/index')?>" class="navbar-brand">
            <?php echo CHtml::image(Yii::app()->request->baseUrl .'/css/gtech.png', 'alt', array('class'=>"img-responsive", 'width'=>'50px')); ?>
          </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
              <?php if(!Yii::app()->user->isGuest): ?>
               <li>
                <a href="<?php echo $this->createUrl('/user/view', array('id'=>Yii::app()->user->getId()))?>">Minhas Aulas</a>
              </li>  
              <li>
                <a href="<?php echo $this->createUrl('/classPlan/create', array('view'=>'pastas'))?>">Criar Aula</a>
              </li> 
              <?php endif; ?>
              <li>
                <a href="<?php echo $this->createUrl('/classPlan')?>">Aulas</a>
              </li>     
              <?php if(Yii::app()->user->isGuest): ?>
              <li>
                <a href="<?php echo $this->createUrl('/site/login')?>">Entrar</a>
              </li>
              <?php else: ?>
               <li>
                <a href="<?php echo $this->createUrl('/site/logout')?>">Sair (<?php echo Yii::app()->user->name ?>)</a>
              </li>

            <?php endif;?>

        
          </ul>
          <form class="navbar-form navbar-right" action="echo $this->createUrl('/site/search')?>">
                      <input type="text" class="form-control col-lg-8 search" placeholder="Busca" id="search">
          </form>
        </div>
      </div>
    </div>
 <!-- //FIM DO MENU  -->

<div class="container">

        <div class="row">
          <div class="col-lg-6">
            <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
              'homeLink'=>CHtml::link('Início', Yii::app()->homeUrl),
              'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
          <?php endif?>
          </div>
        </div>

      <div class="clearfix">

			<div class="row">
      	 <div class="col-lg-12">
					<?php echo $content; ?>
				</div>
			</div>
	 </div>

       <footer>
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled">
              <li><a href="http://www.ufrgs.br">Universidade Federal do Rio Grande do Sul</a></li>
              <li><a href="http://gtech.ufrgs.br">Grupo Gtech de Pesquisa</a></li>
              <li><a href="http://sobek.ufrgs.br">SOBEK Text Mining</a></li>
            </ul>
          </div>
        </div>
        
      </footer>

</div>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootswatch.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/hogan-2.0.0.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/typeahead.js"></script>
<?php $baseUrl = Yii::app()->request->baseUrl; ?>
<script type="text/javascript">


  $('.search').typeahead([
   {                              
    name: 'aulas',                                                        
    remote: '<?php echo Yii::app()->createUrl("/classPlan/typeahead"); ?>?q=%QUERY',
    header:"<h4>Aulas</h4>"
    }
    ,
    {                              
    name: 'users',                                                        
    remote: '<?php echo Yii::app()->createUrl("/user/typeahead"); ?>?q=%QUERY', 
    header:"<h4>Usuários</h4>"
    },
    {                              
    name: 'tags',                                                        
    remote: '<?php echo Yii::app()->createUrl("/classPlan/tokens"); ?>?q=%QUERY', 
    header:"<h4>Marcadores</h4>"
    }
  ]).attr('style','')
  .removeClass('tt-query')
  .on('typeahead:selected', function(evt, item) {
    window.location = item.url;
  });


</script>
</body>
</html>
