<?php if (is_array($testimoniosSel) && count($testimoniosSel) > 0) { ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
  <style>
    .testimonial{
      text-align: center;
    }
    .testimonial .pic{
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin: 0 auto;
      margin-bottom: 15px;
    }
    .testimonial .pic img{
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }
    .testimonial .testimonial-title{
      display: inline-block;
      font-size: 25px;
      font-weight: 600;
      color: #0e4f8f;
      margin: 0 0 70px 0;
    }
    .testimonial .testimonial-title small{
      font-size: 20px;
      font-weight: 600;
      color: #000;
    }
    .testimonial .description{
      font-size: 18px;
      color: #000;
      line-height: 27px;
      position: relative;
      margin: 0;
    }
    .testimonial .description:before{
      content: "\f10d";
      font-family: fontawesome;
      width: 35px;
      height: 35px;
      border-radius: 50%;
      position: absolute;
      top: -50px;
      left: 46%;
      font-size: 20px;
      color: #0e4f8f;
      line-height:33px;
      border: 2px solid #0e4f8f;
    }
    .owl-theme .owl-controls .owl-page span{
      background: #fff;
      border: 2px solid #bababa;
      opacity: 1;
    }
    .owl-theme .owl-controls .owl-page.active span,
    .owl-theme .owl-controls .owl-page:hover span{
      border: 2px solid #0e4f8f;
    }
  </style>
  <div>
    <div class="row">
      <div class="col-md-6">
        <div id="testimonial-slider" class="owl-carousel">

          <?php
          foreach ($testimoniosSel as $testimonio) {
            $cargo = get_field('cargo', $testimonio->ID);
            ?>
            <div class="testimonial">
              <div class="pic">
                <img src="<?php echo get_the_post_thumbnail_url($testimonio) ?>" alt="">
              </div>
              <h3 class="testimonial-title">
                <?php echo $testimonio->post_title ?><?php echo (!empty($cargo) ? '<br/><small>' . $cargo . '</small>' : '') ?>
              </h3>
              <p class="description">
                <?php echo $testimonio->post_content ?>
              </p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script>
    jQuery(document).ready(function () {
          jQuery("#testimonial-slider").owlCarousel({
                items: 1,
                itemsDesktop: [1000, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                pagination: true,
                navigation: false,
                navigationText: ["", ""],
                singleItem: true,
                transitionStyle: "fade",
                autoPlay: 20000,
                slideSpeed: 1000
          });
    });
  </script>
<?php }