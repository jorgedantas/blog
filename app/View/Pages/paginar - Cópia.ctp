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
                         <a href="" class="article_img" ><img src="../app/webroot/img/upload/full/<?php echo $post['Post']['imagem'] ?>" ></a>
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
    <span><a href="">  Comentar <i class="fa fa-comment"></i></a></span>
</div>
</div>

<div style="clear: both;"></div>
</div>
    
<?php endforeach; ?>