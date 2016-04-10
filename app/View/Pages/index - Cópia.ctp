
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="keywords" content="Blogger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
 -->

<link href="app/webroot/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
 --><!--Custom-Theme-files-->
<link href="app/webroot/css/style.css" rel='stylesheet' type='text/css' />
<script src="app/webroot/js/jquery.min.js"> </script>
<!--/script-->
<script type="text/javascript" src="app/webroot/js/move-top.js"></script>
<script type="text/javascript" src="app/webroot/js/easing.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
<style>
@font-face {
font-family: west;
src: url(‘fonts/WEST____.TTF’);
}
.entry-title {
     
    font-size: 20px !important;
}

</style>
</head>
<body>
    <input type="hidden" id="pulo" name="pulo" value="2">
	<!-- header-section-starts -->
<?php  // public $helpers = array('Js');
        
?> 
	<div class="full">
			<div class="col-md-3 top-nav">
				     <div class="logo">
                                         <a href="/blog">
                                            
                                             <img class="estrela"  src="app/webroot/img/images/estrela.png" >
                                            
                                        </a>
					</div>
					<div class="top-menu">
					 <span class="menu"> </span>

					<ul class="cl-effect-16">
						<li><a class="active" href="/blog" data-hover="Início">Início</a></li>
						<li><a href="about.html" data-hover="Sobre">Sobre</a></li>


					</ul>
					<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".top-menu ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav -->
<!--					<ul class="side-icons">
							<li><a class="fb" href="#"></a></li>
							<li><a class="twitt" href="#"></a></li>
							<li><a class="goog" href="#"></a></li>
							<li><a class="drib" href="#"></a></li>
					   </ul>-->
			    </div>
			</div>
	<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
                    <h3 class="tittle"> <img src="app/webroot/img/logo.png"></h3>

			   <!--//banner-->
			  <!--/top-news-->
			  <div class="top-news">
                              <?php foreach ($posts as $post): ?>
                              <div class="top-inner" style="background-color: #ffffff;">
					<div class="col-md-12 top-text ">
                                            <h2 class="top">
                                                <?php  echo $this->Html->link($post['Post']['titulo'],
array('controller' => 'pages', 'action' => 'interna', $post['Post']['id'])); ?>
                                             </h2>
                                             <br>
                                                <?php if ($post['Post']['imagem'] != "" ) { ?>
                                                    <a href="single.html"><img src="app/webroot/img/upload/full/<?php echo $post['Post']['imagem'] ?>" class="img-responsive" alt=""></a>
                                                <?php } ?>
                                                <p>
						  <?php echo $post['Post']['corpo']  ?>
                                               </p>
                                              <p><?php echo date("d-m-Y",strtotime($post['Post']['created']))   ?> em <?php echo $post['Categoria']['nome']  ?> 
                                                  <a  class="comentar" id="<?php echo $post['Post']['id'] ?>" ><span class="glyphicon glyphicon-comment"></span><?php echo count($post['Comentario'])  ?> </a>
                                                  
                                                  <a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
                                              <div class="response"></div>	
					
                                              <div class="visibilidade" id="mostrar<?php echo $post['Post']['id'] ?>">          
                                        <h4>Comentários</h4>
					<div class="media response-info">
						
					 <?php foreach ($post['Comentario'] as $comentariospost): ?>	
                                              <div class="media-body response-text-right">
							
							<ul>
								<li><?php echo date("d-m-Y",strtotime($comentariospost['created']))   ?></li>
								
							</ul>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="app/webroot/img/images/co.png" alt=""/>
									</a>
									<h5><a href="#"><?php echo $comentariospost['nome'] ?></a></h5>
								</div>
								<div class="media-body response-text-right">
									<p><?php echo $comentariospost['corpo'] ?></p>
										
								</div>
								<div class="clearfix"> </div>
                                                                <br>
							</div>
						</div>
						<div class="clearfix"> </div>
                                               
                                         <?php endforeach; ?>      
                                                
					</div>
					
				
                                              <div class="coment-form esconder">
                                                  <h4>Enviar Comentário</h4>
                                              <?php 
                                               echo $this->Form->create('Comentario', array(
                                                    'inputDefaults' => array(
                                                        'label' => false
                                                        
                                                    )
                                                ));
                                                echo $this->Form->input('nome',['placeholder' => 'Nome']); 
                                                
                                                echo $this->Form->input('email',['placeholder' => 'Email']);
                                                echo $this->Form->input('corpo',['placeholder' => 'Mensagem']);
                                                echo $this->Form->hidden('post_id', array('value' => $post['Post']['id']));
                                                echo $this->Form->end('Enviar');
                                              //  echo $this->Form->end('Enviar');
                                                //echo $this->Js->submit('Enviar', array('update' => '#response')));
                                             
                                                echo "<div id='response'></div>";

                                                          
                                                          ?>
                                                  
                                            </div>                
                                              </div>
					 </div>

					 <div class="clearfix"> </div>
				 </div>
                              <br>
                             
                              
                               <?php endforeach; ?>
                              <div id="resultsDiv"> </div>
	            </div>
                          <span id="paginar">Leia Mais</span>
					<!--//top-news-->
		     </div>
			
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					
					 
                                    <div class="media">
                                     <h3 class="tittle media">Notícias em destaque </h3>
                                     <div  style="background-color: #ffffff;">
                                     <div class="edit-pics">
                                     <?php  foreach ($postmaiscomentados as $postcomentados): ?>
                                      <div class="editor-pics">
										 <div class="col-md-3 item-pic">
										   <img src="app/webroot/img/upload/full/<?php echo $postcomentados['Post']['imagem'] ?>" class="img-responsive" alt="">

										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="single.html"><?php echo $postcomentados['Post']['titulo'] ?></a></h5>
												 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo date("d-m-Y",strtotime($postcomentados['Post']['created']))  ?> <a href="#"><i class="glyphicon glyphicon-comment"></i> </a><a class="span_link" href=""><span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
											 </div>
											<div class="clearfix"></div>
										</div>
                                     <?php endforeach;?>
                                         
                                     </div>
                                     </div>
                                 </div>								
                               
				 </div>
                                 <div class="general-inner">
                                     <div class="media">
                                       <h3 class="tittle media">Twitter <i class="glyphicon glyphicon-twitter"></i></h3>  
                                       <a class="twitter-timeline" href="https://twitter.com/GovernodoRN" data-widget-id="260820737563164673">Tweets by @GovernodoRN</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                     </div>
                                 </div>    
			</div>
			<!--//general-news-->
			<!--/news-->
			<!--/news-->
		 </div>
			<div class="clearfix"> </div>
	<!--/footer-->
	     <div class="footer">
				 <div class="footer-top">
				    <div class="col-md-4 footer-grid">
					     
				    </div>
					  <div class="col-md-4 footer-grid">
					    
				    </div>
					<div class="col-md-4 footer-grid">
					   <ul class="side-icons">
							<li><a class="fb" href="#"></a></li>
							<li><a class="twitt" href="#"></a></li>
							<li><a class="goog" href="#"></a></li>
							<li><a class="drib" href="#"></a></li>
					   </ul>
				    </div>
					<div class="clearfix"> </div>
				 </div>
	     </div>
		<div class="copy">
		    <p>&copy; 2016 Sheriff do Seridó. Todos os Direitos Reservados| </p>
		</div>
	 
	<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
		
		<!--<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>-->

        
<script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            //$().UItoTop({ easingType: 'easeOutQuart' });
            $('.visibilidade').hide();
            
            
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
                });	return false; }); 
            
            $('#ComentarioDisplayForm').submit(function(){ 
              
                //serialize form data 
                var formData = $(this).serialize(); 
                ////get form action 
                var formUrl = "Comentarios/add"
              
                $.ajax({ 
                    type: 'POST', 
                    url: formUrl, 
                    data: formData, 
                    success: function(data,textStatus,xhr){ 
                        $( '#response' ).html( data );
                        $( '#ComentarioNome' ).val( "" );
                        $( '#ComentarioEmail' ).val( "" );
                        $( '#ComentarioCorpo' ).val( "" );
                        $( '#ComentarioPostId' ).val( "" );
                         
                    }, 
                    error: function(xhr,textStatus,error){ alert(textStatus + error);} 
                });	return false; }); 
            // bind 'myForm' and provide a simple callback function 
//            $('#ComentarioDisplayForm').ajaxForm(function() { 
//                alert("Thank you for your comment!"); 
//            }); 
        
        }); 
    </script> 
   
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
