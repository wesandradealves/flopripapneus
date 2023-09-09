<section class="section" data-section="contatos">
    <div class="container d-flex flex-wrap align-items-center justify-content-between">
        <div class="section-header pe-md-5 col-lg-5">
            <h2 class="title">Fale agora com os<br/>especialistas.</h2>
            <p class="text mt-3">Temos um time qualificado e que ama pneus e rodas. Entre em contato com nossa equipe de consultores automotivos.</p>
        </div> 
        <div class="col-12 col-lg-4 col-md-5 mt-5 mt-lg-0 ps-4 pe-4 ps-md-0 pe-md-0 d-flex align-items-center align-items-lg-end  flex-column">
            <?php if(get_page_by_title( 'Contato' )) : ?>
                <a href="<?php echo get_permalink( get_page_by_title( 'Contato' ) ); ?>" class="btn default  d-inline-flex ms-lg-auto">Quero que entre em contato comigo</a>
            <?php endif; ?>   
            <a href="javascript:void(0)" class="btn mt-4 whatsapp d-inline-flex align-items-center whatsapp-btn ms-lg-auto"><i class="fa-brands fa-whatsapp me-3"></i> Quero falar por Whatsapp</a>
        </div>
    </div>
</section> 