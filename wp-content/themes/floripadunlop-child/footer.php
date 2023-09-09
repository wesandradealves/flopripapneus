        </main>
        <footer class="footer">
            <div class="container d-flex flex-column flex-lg-row flex-wrap align-items-center align-items-lg-stretch justify-content-center justify-content-lg-between">
                <div class="footer-top">
                    <ul class="d-flex flex-column align-items-center align-items-lg-start">
                        <li>
                            <?php get_template_part('template_parts/logo', null, array('classes' => 'logo')); ?>
                        </li>
                        <li class="d-block d-lg-none mt-4">
                            <img class="d-block img-fluid" width="185" height="57" src="<?php echo get_stylesheet_directory_uri(); ?>/img/continental.png" alt="<?php echo get_bloginfo('title'); ?>">
                        </li>                        
                    </ul>
                    <p class="text mt-5 copyright d-none d-lg-block">
                        Todos os direitos reservados © Copyright <?php echo date('Y'); ?><br/>
                        Desenvolvido a mão por <a href="https://904.ag/" target="_blank">Agência 9ZERO4</a> + <a href="https://criativc.com.br/" target="_blank">Criativic</a>                    
                    </p>
                </div>
                <div class="footer-bottom m-auto d-flex flex-column justify-content-center mt-4 mb-4 mt-lg-0 mb-lg-0">
                    <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-4">
                        <i class="fa-solid fa-phone"></i> 
                        <span class="d-inline-block ms-2"><a href="tel:+55<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_field('phone', 'option')); ?>"><?php echo get_field('phone', 'option'); ?></a></span>
                    </span>  
                    <?php get_template_part('template_parts/addresses', null, array('classes' => '', 'cards' => false)); ?>                  
                </div>  
                <div class="d-none d-lg-flex flex-column align-items-end">
                    <img class="d-block img-fluid" width="185" height="57" src="<?php echo get_stylesheet_directory_uri(); ?>/img/continental.png" alt="<?php echo get_bloginfo('title'); ?>">
                </div>    
                    <p class="text mt-5 copyright d-block d-lg-none order-3">
                        Todos os direitos reservados © Copyright <?php echo date('Y'); ?><br/>
                        Desenvolvido a mão por <a href="https://904.ag/" target="_blank">Agência 9ZERO4</a> + <a href="https://criativc.com.br/" target="_blank">Criativic</a>                    
                    </p>
            </div>
        </footer>
    </div> 
    <?php if(get_field('whatsapp_form_id', 'option')) : ?>          
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>              
        <div class="module-whatsapp" id="module-whatsapp" style="visibility: hidden;">
            <div class="module-whatsapp-btn whatsapp-btn btn-whatsapp-pulse" id="module-whatsapp-btn">
                <div class="whatsapp-icon-message">
                    <div class="whatsapp-icon-message-close">
                        <i class="fas fa-times"></i>
                    </div>
                    <figure>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/imagem-whatsapp-floripa-pneus.jpg" alt=" WhatsApp | Floripa Continental" />
                    </figure>
                    <div class="whatsapp-icon-message-content">
                        <p><strong>Olá! Posso ajudar?</strong> Qualquer coisa me chama aqui, ta?</p>
                    </div>
                </div>
                <div class="module-whatsapp-btn-icon">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

            <div class="module-whatsapp-container" id="module-whatsapp-container">
                <div class="module-whatsapp-header">
                    <div class="module-whatsapp-header-icon">
                    </div>
                    <div class="module-whatsapp-header-title">
                        <strong>Comece uma conversa</strong>
                        <p>Cadastre-se para começar uma conversa no <b>WhatsApp</b></p>
                    </div>
                </div>
                <div class="module-whatsapp-content">
                    <div class="module-whatsapp-content-form">
                        <?php echo do_shortcode('[contact-form-7 id="'.get_field('whatsapp_form_id', 'option').'" title="WhatsApp Icon – PT-BR"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php wp_footer(); ?>
</body>
</html>