
<!DOCTYPE html>
<head>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
<title>
SHERIFF DO SERIDÓ
</title>
<meta charset='UTF-8'/>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<link href='../app/webroot/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'/>
<link href='../app/webroot/font-awesome/4.1.0/css/font-awesome.min.css' id='fontawesome' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700|Merriweather:300,400,700|Bangers|Montserrat:400,700&amp;subset=cyrillic' rel='stylesheet' type='text/css'/>
<!-- <link type='text/css' rel='stylesheet' href='www.blogger.com/static/v1/widgets/3645911276-widget_css_bundle.css' />
<link type='text/css' rel='stylesheet' href='www.blogger.com/dyn-css/authorizationc1b4.css?targetBlogID=1457031721144529915&amp;zx=4ad2f874-b33f-49c0-9620-9557180e699c' /> -->
<link href='../app/webroot/css/principal.css' rel='stylesheet' type='text/css'/>

</head>
<!--<body>-->
<body>
<header id='blog_header'>
<div class='ct-wrapper'>
<div class='header section' id='header'><div class='widget Header' id='Header1'>
<div id='header-inner'>
<a class='logo' href='/blog' style='display: inline-block'>
<img alt='Gamer' id='Header1_headerimg' src='../app/webroot/img/logo3.png' style='display: block'/>
</a>
</div>
</div></div>
</div>
<div class='navigation section' id='navigation'><div class='widget HTML' id='HTML77'>
<div class='nav-menu'>
<div class='ct-wrapper'>
<ul class='blog_menus'>
<li><a href='/blog'>Início</a></li>
<li><a href='/blog/pages/sobre'>Sobre</a></li>

</ul>
<div class='clr'></div>
</div>
</div>
</div></div>

</header>
<div class='clr'></div>
<div class='ct-wrapper'>
<div class='outer-wrapper'>
<div class='main-wrapper'>
<div class='content section' id='content'><div class='widget Blog' id='Blog1'>
<div class='blog-posts hfeed'>


<div id="resultsDiv"> </div>

</div>

<div class='blog-pager' id='blog-pager'>

<!-- <span style="margin-left: 10x;" class="article_read_mre meta btn btn-info btn-lg" id="paginar"> Leia Mais</span> -->


<a class='home-link' href='index.html'>Home</a>
</div>
<div class='clear'></div>
</div></div>
</div><!-- /main-wrapper -->
<div class='sidebar-wrapper'>
<div class='sidebar section' id='sidebar'>
    
    <div class='widget PopularPosts' id='PopularPosts100'>
        <h2>Postagens Populares</h2>
        <div class='widget-content popular-posts'>
        <ul>
        <?php foreach ($postmaiscomentados as $postsmc) : ?>
        <li>
        <div class='item-content'>
        <div class='item-thumbnail'>
        <?php if ($postsmc['Post']['imagem'] != "" ) { ?>
                         <a href="" class="article_img" ><img src="../app/webroot/img/upload/full/<?php echo $postsmc['Post']['imagem'] ?>" ></a>
        <?php } ?>
        </div>
        <div class='item-title'><a href='2015/05/lots-of-thrill-has-been-included-in.html'><?php echo $postsmc['Post']['titulo'] ; ?></a></div>
        <div class='item-snippet'>  <?php //echo ($postsmc) ; ?> </div>
        </div>
        <div style='clear: both;'></div>
        </li>
         <?php endforeach; ?>





        </ul>
        </div>
    </div>
    
<div class='widget HTML' id='HTML1'>

<div class='clear'></div>


</div>
<div class='widget Label' id='Label2'>
<h2>Categorias</h2>
<div class='widget-content list-label-widget-content'>
<ul>
    <?php foreach ($categorias as $categoria): ?>  
<li>
<a dir='ltr' href='/blog/pages/categ/<?php echo $categoria['Categoria']['id'] ;?>'><?php echo $categoria['Categoria']['nome'] ;?>  </a>
<li>  
    <?php endforeach  ?>  
</ul>
</div>
</div>
<div class='widget HTML' id='HTML4'>


</div></div>
</div><!-- /sidebar-wrapper -->
<div class='clr'></div>
</div><!-- /outer-wrapper -->
</div><!-- /ct-wrapper -->
<div id='footer-wrapper'>
<div class='ct-wrapper'>
<div class='footer-widget'>
<div class='textwidget'>
<p class='attribution'>Copyright <a href='/blog'>SHERIFF</a> | Designed by <a href='http://www.jorgedantas.tech' id='attri_bution'>jorgedantas.tech</a>.
<br/> 
</p>
</div>
</div>
</div><!-- footer-credits -->
</div><!-- /ct-wrapper -->
<input type="hidden" id="pulo" name="pulo" value="2">
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>

</body>

<!-- Mirrored from gamer-veethemes.blogspot.com.br/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Mar 2016 19:57:49 GMT -->
</html>