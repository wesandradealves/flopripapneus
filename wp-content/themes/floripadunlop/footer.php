        </main>
        <footer class="footer">
            <div class="container d-flex flex-column flex-md-row flex-wrap align-items-stretch justify-content-between">
                <div class="footer-top col-12 col-md-6 ps-4 pe-4 ps-lg-5">
                    <ul class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <li>
                            <?php get_template_part('template_parts/logo', null, array('classes' => 'logo')); ?>
                        </li>
                        <li class="ms-5">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri().'/img/'; ?>32c9d13b614dec36f76d.png" />
                        </li>
                    </ul>
                    <nav class="nav mt-5">
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'footer', 
                                    'menu_class' => 'd-flex flex-wrap align-items-center justify-content-center justify-content-md-start',   
                                    'container' => false
                                ) 
                            ); 
                        ?>                          
                    </nav>
                    <?php if(get_field('horario_de_atendimento', 'option')) : ?>  
                    <p class="text d-flex justify-content-center justify-content-md-start mt-4"><i class="fa-solid fa-calendar me-3"></i> <?php echo get_field('horario_de_atendimento', 'option'); ?></p>
                    <?php endif; ?>
                    <p class="text mt-5 copyright">
                        Todos os direitos reservados © Copyright <?php echo date('Y'); ?><br/>
                        Desenvolvido a mão por <a href="https://904.ag/" target="_blank">Agência 9ZERO4</a> + <a href="https://criativc.com.br/" target="_blank">Criativic</a>             
                    </p>
                </div>
                <div class="footer-bottom col-12 col-md-6 ps-4 pe-4 ps-lg-5 pe-lg-5">
                    <?php get_template_part('template_parts/addresses', null, array('classes' => 'd-flex flex-wrap flex-column justify-content-center justify-content-md-start align-items-center align-items-md-start', 'cards' => false)); ?>
                </div>            
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
                        <img src="<?php echo get_template_directory_uri(); ?>/img/imagem-whatsapp-floripa-pneus.jpg" alt="Thais - WhatsApp | Jet Vap" />
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