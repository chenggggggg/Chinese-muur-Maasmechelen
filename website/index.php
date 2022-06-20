<?php
session_start();
ob_start();
setlocale(LC_TIME, 'NL_nl');
set_include_path(get_include_path()
  . PATH_SEPARATOR . 'library/'
  . PATH_SEPARATOR . 'pages/');

// require_once('db.php');

$menu = array(
    'home'  => array('text'=>'Home',  'url'=>'#', 'class'=>null),
    'over' => array('text'=>'Over Ons', 'url'=>'#over', 'class'=>null),
    'menu'  => array('text'=>'Menu',  'url'=>'#menu', 'class'=>null),
    'weekmenu'  => array('text'=>'Weekmenu',  'url'=>'#weekmenu', 'class'=>null),
    'locatie' => array('text'=>'Locatie', 'url'=>'#locatie', 'class'=>null),
);

if(isset($_GET['p'])){
  $page = isset($menu[$_GET['p']]) ? $_GET['p'] : '404';
} else {
  $page = 'home';
}

function generateMenu($page, $items) {
  $html = "<nav id='nav'>\n <ul>\n";
  foreach($items as $item) {
    if('?p=' . $page == $item['url']){
      $html .= "  <li class='current'><a href='{$item['url']}'>{$item['text']}</a></li>\n";
    } else {
      $html .= "  <li><a href='{$item['url']}'>{$item['text']}</a></li>\n";
    }
  }
  $html .= "  <li>
  <a class='icon fa-facebook' href='https://www.facebook.com/tastyhongkongrestaurantbelgium/'></a></li>";
  $html .= "  <li>
  <a class='icon fa-instagram' href='https://www.instagram.com/TastyHongKong.be'></a></li>\n</ul>\n</nav>\n";
  return $html;
}

function modifyNavbar($page, $items) {
  if($page) {
    $items[$page]['class'] .= 'selected';
  }
  return $items;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Restaurant Tasty Hong Kong - <?php echo ucfirst($page); ?></title>
		<meta charset="utf-8" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Chinese Muur Maasmechelen ziet Oosterse gastvrijheid als een vanzelfsprekendheid. Al onze gerechten worden met veel zorg en verse producten bereidt en dit proeft u!"/>
    <meta name="keywords" content="Tasty Hong Kong, Tasty Hong Kong Maasmechelen, restaurant, afhalen, bezorgen, eten bestellen, Chinees, Indonesisch, Vietnamees, Snacks, Loempia, Vegetarisch"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/sass/main.min.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.min.css"/>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	</head>
	<body class="homepage">
    <div id="header">
      <?php echo generateMenu($page, $menu); ?>
    </div>
    <div id="page-wrapper">
      <div id="main-wrapper">
      	<div class="container">
        <?php
        require_once('home.php');
        require_once('over.php');
        require_once('menu.php');
        require_once('weekmenu.php');
        require_once('locatie.php');
        ?>
        </div>
      </div>
      <?php require_once('footer.php');?>
		</div>
    <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/additional-methods.min.js"></script>
    <script src="assets/js/messages_nl.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/skel-viewport.min.js"></script>
		<script src="assets/js/util.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="assets/js/main.js"></script>
	</body>
</html>
