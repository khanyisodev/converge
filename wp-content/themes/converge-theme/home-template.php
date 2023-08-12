<?php
/*
Template Name: Home Page Template
Template Post Type: page
*/

get_header();


?>
<section id="intro">
  <div class="container">
    <div class="heading">
      <h1>We’re helping students explore their <strong>full potential to solve some of the most pressing problems facing our world.</strong></h1>
    </div>
  </div>
  <div class="video">
    <a href="#">
        <i class="fa fa-play" aria-hidden="true"></i>
    </a>
  </div>
  <div class="blue-bg">
    <div class="container">
      <div class="box row1 col-12 col-lg-10 offset-lg-1">
        <h3>Converge is an experiential learning program for</h3>
        <h2>innovators,<br>
          creatives, <br>
          and disruptors</h2>
        <h3>who would like to co-design their pathways from <span class="underline">college to career.</span></h3>
      </div>
      <div class="box row2 col-12 col-lg-10 offset-lg-1">
        <div class="col-12 col-lg-6">
          <h4>Our program is rooted in design-thinking, experiential learning, and self-discovery.</h4>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12 col-lg-6 padding-right">
              <h5>Converge will connect you to internships at start-ups and established companies and non-profits tackling the issues that matter most to you. You will be challenged to develop and apply your personal skillset and cultural perspectives while exploring careers in areas such as Clean Energy, Global Health, EdTech, and Finance.</h5>
            </div>
            <div class="col-12 col-lg-6 padding-left">
              <h5>In the process you will become a part of a global network of young changemakers working on the most pressing problems facing your generation. Here you can apply your own inter-disciplinary skills and cultural perspectives while exploring careers in these sectors. In the process you will become a part of a global network of young changemakers.</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="row links">
          <div class="col-12 col-lg-6 padding-right">
            <a href="#">
              <div class="col-10 col-md-8">
                <span class="sub uppercase">Corporates</span>
                <span class="cta">Join Program</span>
              </div>
              <div class="col-2 col-md-4">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/arrow-right-lrg-blk.png' ); ?>">
              </div>
            </a>
          </div>
          <div class="col-12 col-lg-6 padding-left">
            <a href="#">
              <div class="col-10 col-md-8">
                <span class="sub">Students</span>
                <span class="cta">Apply now</span>
              </div>
              <div class="col-2 col-md-4">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/arrow-right-lrg-blk.png' ); ?>">
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="how-it-works">
  <div class="container">
    <h5 class="uppercase">How it works</h5>
    <h4>We seek students who</h4>
    <div class="items">
      <div class="down-arrow">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/down-arrow.png' ); ?>">
      </div>
      <ul>
        <!-- Display "How It Works" -->
        <?php
        $args = array(
            'post_type' => 'how_it_works',
            'posts_per_page' => -1, // Display all posts
            'order' => 'ASC', // Order in Ascending order
            'orderby' => 'date',
        );

        $how_it_works_query = new WP_Query( $args );

        if ( $how_it_works_query->have_posts() ) :
            while ( $how_it_works_query->have_posts() ) : $how_it_works_query->the_post();
                $sub_title = get_post_meta( get_the_ID(), '_sub_title', true );
                ?>
                <li class="item">
                    <span class="sub uppercase">
                        <?php if ( $sub_title ) : ?>
                            <?php echo esc_html( $sub_title ); ?>
                        <?php endif; ?>
                    </span>
                    <div class="inner">
                        <h2 class="item-name"><?php the_title(); ?></h2>
                        <div class="info slidedown">
                            <?php the_content(); ?>
                        </div>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="item-image">
                                <?php the_post_thumbnail( 'full' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>
                <?php
            endwhile;
            wp_reset_postdata(); // Reset the query
        else :
            echo 'No "How It Works" posts found.';
        endif;
        ?>

      </ul>
      <div class="cursor"></div>
    </div>
  </div>
</section>
<section id="about-us">
  <div class="container">
    <h5 class="uppercase">About us</h5>
    <div class="box col-12 col-sm-10 col-lg-8 offset-sm-1">
      <div class="empower-students">
        <p>We empower students to live out their most meaningful lives in a rapidly changing global labor market – aligned with their personal and professional <span class="underline">values, skills, and passions.</span></p>
      </div>
      <div class="our-experience col-12 col-lg-7 offset-lg-5">
        <p>Our team has decades of experience working with young people from around the world in co-creative processes of self-discovery and career exploration.</p>
      </div>
    </div>
    <div class="about-us-img">
      <div class="desktop">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/about-us.jpg' ); ?>">
      </div>
      <div class="mobile">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/about-us-mobile.jpg' ); ?>">
      </div>
    </div>
  </div>
</section>
<section id="converge">
  <div class="container">
    <div class="col-12 col-lg-8 offset-lg-2">
      <div class="converge">Converge <span class="pronunciation">con·​verge | \ kən-ˈvərj (verb)</span></div>
      <div class="subtext col-12 col-lg-11">
        <p>If lines, roads, or paths converge, they move towards the same point where they join or meet; to come together and meet.</p>
      </div>
    </div>
  </div>
</section>
<section id="team">
  <div class="container">
    <h5 class="uppercase">Meet our people</h5>
    <div class="col-10 offset-1 team-content">
      <h4>These are our founders.</h4>
      <ul class="team">
        <!-- Display team member post type -->
        <?php
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1, // Display all posts
            'order' => 'ASC', // Order in Ascending order
            'orderby' => 'date',
        );

        $how_it_works_query = new WP_Query($args);

        if ($how_it_works_query->have_posts()) :
          while ($how_it_works_query->have_posts()) : $how_it_works_query->the_post();
          $full_name = get_the_title(); // Get the full name from the title
          $parts = explode(' ', $full_name, 2); // Split into two parts at the first space
          $first_name = $parts[0];
          $surname = isset($parts[1]) ? $parts[1] : ''; // Handle the case where there's no surname

          $sub_title = get_post_meta(get_the_ID(), '_sub_title', true);
          ?>
          <li class="col-10 col-sm-12 col-lg-6 team-member item">
              <div class="row">
                  <div class="team-img col-8 col-lg-7">
                      <?php if (has_post_thumbnail()) : ?>
                          <div class="member-image">
                              <?php the_post_thumbnail('full'); ?>
                          </div>
                      <?php endif; ?>
                      <div class="expander">
                          +
                      </div>
                  </div>
                  <div class="team-name col-4 col-lg-5">
                      <div class="name">
                          <span class="first-name"><?php echo $first_name; ?></span>
                          <span class="surname"><?php echo $surname; ?></span>
                      </div>
                  </div>
                  <div class="synopsis-container col-9 col-lg-12">
                    <div class="synopsis slidedown">
                        <?php the_content(); ?>
                    </div>
                  </div>
              </div>
          </li>
          <?php
        endwhile;
        wp_reset_postdata(); // Reset the query
        else :
          echo 'No team member found.';
        endif;
        ?>
      </ul>
    </div>
  </div>
</section>
<section id="apply-now">
  <div class="container">
    <h5 class="uppercase">Apply now</h5>
    <div class="row">
      <div class="col-12 col-lg-6 offset-lg-1 subtext">
        <h4><span class="underline">We invite</span> both students and corporates to get involved. </h4><img src="<?php echo esc_url( get_template_directory_uri() . '/img/squares-9-blk.png' ); ?>">
      </div>
    </div>
    <div class="col-12 col-lg-10 offset-lg-1 apply-container">
      <h2>The Student</h2>
      <div class="apply-content">
        <div class="col-12 col-lg-10">
          <div class="col-12 col-lg-8">
            <h5>Are you a top-performing university student or a recent graduate?</h5>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6 padding-right">
              <p>Are you looking for help designing your pathway from college to career with companies tackling the world’s most pressing problems?</p>
              <p>Are you excited by the prospect of being part of an elite leadership program with peers from around the world who want to do well and also do good?</p>
              <p>Successful applicants will also gain access to a network of intelligent change-makers. </p>
            </div>
            <div class="col-12 col-lg-6 padding-left">
              <p>You’ll be able to offer more complex, multi-faceted value – giving you bargaining power in an ever-changing work environment.</p>
              <p>Our selection process is based on superb academic achievements and your approach to life, rather than your country of origin or where you study.</p>
            </div>
          </div>
        </div>
        <div class="row links">
          <a href="#">
            <div>
              <span class="cta">Apply now</span><img src="<?php echo esc_url( get_template_directory_uri() . '/img/arrow-right-lrg-blk-bold.png' ); ?>">
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-10 offset-lg-1 apply-container">
      <h2>The Corporate</h2>
      <div class="apply-content">
        <div class="col-12 col-lg-10">
          <div class="col-12 col-lg-8">
            <h5>Are you an employer who wants access to the most prepared talent?</h5>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6 padding-right">
              <p>Gain access to students and graduates with top academic qualifications, technical skills and adaptability to ‘hit the ground running’.</p>
              <p>You’ll also be part of a new way of nurturing brilliant young minds and in community with other companies that are redefining what the working world is like for the future innovators.</p>
            </div>
          </div>
        </div>
        <div class="row links">
          <a href="#">
            <div>
              <span class="cta">Join the program</span><img src="<?php echo esc_url( get_template_directory_uri() . '/img/arrow-right-lrg-blk-bold.png' ); ?>">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
