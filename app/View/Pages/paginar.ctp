
                              <?php foreach ($posts as $post): ?>
                              <div class="top-inner" style="background-color: #ffffff;">
					<div class="col-md-12 top-text ">
                                            <h2 class="top">
                                                <?php  echo $this->Html->link($post['Post']['titulo'],
array('controller' => 'pages', 'action' => 'interna', $post['Post']['id'])); ?>
                                             </h2>
                                             <br>
						<a href="single.html"><img src="app/webroot/img/upload/full/<?php echo $post['Post']['imagem'] ?>" class="img-responsive" alt=""></a>
                                                <p   >
						  <?php echo $post['Post']['corpo']  ?>
                                               </p>
                                              <p><?php echo date("d-m-Y",strtotime($post['Post']['created']))   ?> em <?php echo $post['Categoria']['nome']  ?> 
                                                  <a  class="comentar" id="<?php echo $post['Post']['id'] ?>" ><span class="glyphicon glyphicon-comment"></span><?php echo count($post['Comentario'])  ?> </a>
                                                  <a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a>
                                                  <a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
                                              <div class="response"></div>	
					
                                              <div style="display: none" class="visibilidade" id="mostrar<?php echo $post['Post']['id'] ?>">          
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
					
				
                                              <div class="coment-form ">
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
                             
                              <div id="resultsDiv"> </div>
                               <?php endforeach; ?>
		      
