
<!DOCTYPE html>
<head>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
<title>
SHERIFF DO SERIDÓ
</title>
<meta charset='UTF-8'/>
<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<link href='../../app/webroot/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'/>
<link href='../../app/webroot/font-awesome/4.1.0/css/font-awesome.min.css' id='fontawesome' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700|Merriweather:300,400,700|Bangers|Montserrat:400,700&amp;subset=cyrillic' rel='stylesheet' type='text/css'/>
<!-- <link type='text/css' rel='stylesheet' href='www.blogger.com/static/v1/widgets/3645911276-widget_css_bundle.css' />
<link type='text/css' rel='stylesheet' href='www.blogger.com/dyn-css/authorizationc1b4.css?targetBlogID=1457031721144529915&amp;zx=4ad2f874-b33f-49c0-9620-9557180e699c' /> -->
<link href='../../app/webroot/css/principal.css' rel='stylesheet' type='text/css'/>

</head>
<!--<body>-->
<body>
<header id='blog_header'>
<div class='ct-wrapper'>
<div class='header section' id='header'><div class='widget Header' id='Header1'>
<div id='header-inner'>
<a class='logo' href='index.html' style='display: inline-block'>
<img alt='Gamer' id='Header1_headerimg' src='../../app/webroot/img/logo3.png' style='display: block'/>
</a>
</div>
</div></div>
</div>
<div class='navigation section' id='navigation'><div class='widget HTML' id='HTML77'>
<div class='nav-menu'>
<div class='ct-wrapper'>
<ul class='blog_menus'>
<li><a href='index.html'>Início</a></li>
<li><a href='p/blog-page.html'>Sobre</a></li>

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

<?php foreach ($posts as $post): ?>    
    <div class="post hentry" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">  
<div class="post-body entry-content" id="post-body-2385687976621880192">
    <div id="p2385687976621880192">
        <div class="article_container">
            <div class="article_header">
                <div class="meta">
                    <span class="article_tags">
                        <a href="#" rel="tag"><?php echo $post['Categoria']['nome']  ?></a>
                        
                    </span>
                    <span class="article_comments">
                        <a href="2015/05/lots-of-thrill-has-been-included-in.html#comments"><?php echo count($post['Comentario'])  ?></a>
                    </span>
                </div>
                <h2>
                    <?php  echo $this->Html->link($post['Post']['titulo'],
                                                        array('controller' => 'pages', 'action' => 'interna', $post['Post']['id'])); ?>
                </h2>
                <div class="meta post_meta">
                    <span class="author">postado por  <a href="">Isto é</a>
                    </span>
                    <span class="date">em <?php echo date("d-m-Y",strtotime($post['Post']['created']))   ?></span>
                </div>
            </div>
            <div class="post-media">
                     <?php if ($post['Post']['imagem'] != "" ) { ?>
                         <a href="" class="article_img" ><img src="../../app/webroot/img/upload/full/<?php echo $post['Post']['imagem'] ?>" ></a>
                     <?php } ?>
                   
            </div>
            <div class="article_excerpt">
                <p> <?php echo $post['Post']['corpo']  ?></p>
             </div>
        </div>
    </div>
    </div>  
<div class="article_footer clearfix">
<div class="article_read_mre meta">
    <!-- <span><a class="comentar" id="<?php echo $post['Post']['id'] ?>" >  Comentar <i class="fa fa-comment"></i></a></span> -->
    <div class="visibilidade" id="mostrar<?php echo $post['Post']['id'] ?>">          
        <BR>
        <h3>Comentários</h3>
        <div class="media response-info">
                        
            <?php foreach ($post['Comentario'] as $comentariospost): ?> 
                <div class="media-body response-text-right">
                    <ul>
                                                           
                         <li><?php echo date("d-m-Y",strtotime($comentariospost['created']))   ?>
                         </li>
                                                            
                    </ul>
                        <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="../../app/webroot/img/images/co.png" alt=""/>
                                    </a>
                                    
                                </div>
                                <div class="media-body response-text-right">
                                    <p><?php echo $comentariospost['corpo'] ?></p>
                                                                    
                                </div>
                                <div class="clearfix"> 
                                <h1><a style="font-size: 12px; padding-left: 25px;" href="#"> <?php echo $comentariospost['nome'] ?></a></h1>
                                </div>
                                <br>
                        </div>
                </div>
                <div class="clearfix"> </div>
                                                   
            <?php endforeach; ?>      
                                                
         </div>
                    
                
        <div class="coment-form esconder">
            <h3>Enviar Comentário</h3>
            <BR>
            <?php 
           // $nomeform = "form" . $post['Post']['id'];
            echo $this->Form->create('Comentario', array(
                'inputDefaults' => array(
                    'label' => false
                                                        
                ), 'id' => "form" . $post['Post']['id'] , 'class' => 'form'
            ));
            echo $this->Form->input('nome',['placeholder' => 'Nome' , 'class' => 'form-group inputbranco', 'size' => '50']); 
                                                
            echo $this->Form->input('email',['placeholder' => 'Email', 'class' => 'form-group inputbranco', 'size' => '80']);
            echo $this->Form->input('corpo',['placeholder' => 'Mensagem', 'class' => 'form-group inputbranco ', 'type' => 'textarea', 'cols' => '90']);
            echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
            echo $this->Form->end('Enviar');
            //  echo $this->Form->end('Enviar');
            //echo $this->Js->submit('Enviar', array('update' => '#response')));
                                             
            echo "<div class='response'></div>";

                                                          
                                                          ?>
                                                  
        </div>                
  </div>
                     
    
</div>
</div>

<div style="clear: both;"></div>
</div>
    
<?php endforeach; ?>
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
        <?php if ($post['Post']['imagem'] != "" ) { ?>
                         <a href="" class="article_img" ><img src="../../app/webroot/img/upload/full/<?php echo $postsmc['Post']['imagem'] ?>" ></a>
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
<a dir='ltr' href='search/label/Console.html'><?php echo $categoria['Categoria']['nome'] ;?>  </a>
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
<p class='attribution'>Copyright <a href='index.html'>Gamer</a> | Designed by <a href='http://www.veethemes.com/' id='attri_bution'>VeeThemes.com</a>.
<br/> 
Proudly present by <a href='#'>Blogger.</a>
</p>
</div>
</div>
</div><!-- footer-credits -->
</div><!-- /ct-wrapper -->
<input type="hidden" id="pulo" name="pulo" value="2">
<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
<script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            //$().UItoTop({ easingType: 'easeOutQuart' });
           // $('.visibilidade').hide();
            $( '.inputbranco' ).val( "" );
            
            $('.comentar').click(function(){
                $('#mostrar'+this.id).toggle();
               
            });
            
           
            $('#paginar').click(function(){ 
              
                //serialize form data 
                //var formData = $(this).serialize(); 
                ////get form action 
                var pulo = $('#pulo').val();   
               
               // alert(pulo);
                var formUrl = "pages/paginar/"+pulo;
                
                $('#pulo').val(parseInt(pulo) + 2); 
                
                $.ajax({ 
                    type: 'POST', 
                    url: formUrl, 
                  //  data: formData, 
                    success: function(data,textStatus,xhr){
                     //alert();
            $("#resultsDiv").append("<div id=resultsDiv"+pulo+"></div>")
                    $(data).insertBefore( '#resultsDiv'+pulo );
                     // $( '#resultsDiv'  ).before( data );
                     // $(  ).html( data );
                      //  alert(data);
                         
                    }, 
                    error: function(xhr,textStatus,error){ alert(textStatus + error);} 
                }); return false; }); 
            
            $('.form').submit(function(){ 
                $( ".response" ).show();
              //alert();
                //serialize form data 
                var formData = $(this).serialize(); 
                ////get form action 
                var formUrl = "../../Comentarios/add"
              
                $.ajax({ 
                    type: 'POST', 
                    url: formUrl, 
                    data: formData, 
                    success: function(data,textStatus,xhr){ 
                        $( '.response' ).html( data );
                        $( '.inputbranco' ).val( "" );
                        $( ".response" ).slideUp( 2800 ).delay( 800 );
                         
                    }, 
                    error: function(xhr,textStatus,error){ alert(textStatus + error);} 
                }); return false; }); 
            // bind 'myForm' and provide a simple callback function 
//            $('#../../../../app/').ajaxForm(function() { 
//                alert("Thank you for your comment!"); 
//            }); 
        
        }); 
    </script> 
</body>

<!-- Mirrored from gamer-veethemes.blogspot.com.br/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Mar 2016 19:57:49 GMT -->
</html>