<div class="scroll-top">
  <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/scroll-up.png' ); ?>"></a>
</div>
</main>
<footer>
  <section class="primary-footer">
    <div class="container-lg">
      <div class="row primary-inner">
        <div class="row">
          <div class="col-12 col-md-8">
            <div class="row row1">
              <div class="col-sm-6">
                <div class="num">
                  01
                </div>
                <div class="content">
                  <span class="email">hello@converge4billion.com</span>
                  <span class="tel">+1 650 338 9601</span>
                  <div class="socials desktop">
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="num">
                  02
                </div>
                <div class="content">
                  <?php wp_nav_menu([
                    "menu" => "footer-menu-1",
                    "menu_id" => "footer-menu-1",
                  ]); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 newsletter-container">
            <div class="num">
              03
            </div>
            <div class="content">
              <span class="newletter-label">Sign up for our newsletter</span>
              <div class="newsletter-form">
                <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="newsletter-form"><input type="hidden" name="form_type" value="customer"><input type="hidden" name="utf8" value="✓">
                  <input type="hidden" name="contact[tags]" value="newsletter">
                  <div class="newsletter-form__field-wrapper">
                    <div class="field">
                      <label class="field__label uppercase" for="NewsletterForm--footer">Subscribe</label>
                      <button type="submit" class="newsletter-form__button field__button" name="commit" id="Subscribe" aria-label="Subscribe" fdprocessedid="7s7hgo"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/right-arrow-white.png' ); ?>"></button>
                      <input id="NewsletterForm--footer" type="email" name="contact[email]" class="field__input" value="" aria-required="true" autocorrect="off" autocapitalize="off" autocomplete="email" placeholder="" required="">
                    </div>
                  </div>
                </form>
              </div>
              <!-- Mobile Socials -->
              <div class="socials mobile">
                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="row">
          <div class="copyright-content col-md-6">
            <div>Copyright © <?php $currentYear = date('Y'); echo $currentYear; ?> <?php bloginfo( 'name' ); ?> | All rights reserved</div>
          </div>
          <div class="second-footer-menu col-md-6">
            <div>
              <?php wp_nav_menu([
                "menu" => "footer-menu-2",
                "menu_id" => "footer-menu-2",
              ]); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="logo">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo-white.png' ); ?>">
      </div>
    </div>
  </section>
</footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js" type="text/javascript" defer=""></script>
<?php wp_footer(); ?>
</div>
</body>
</html>
