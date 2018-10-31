<?php get_header(); ?>
<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xxl' );
 ?>

<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
  <div class="page-hero-content centered">
    <h1 class="standard-shadow">about us</h1>
    <!-- <p class="subheader">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
  </div>
</div>

<section class="filter-tabs inner-row align-center">
  <div class="container">
    <div class="inner-row align-center">
      <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#who" aria-selected="true">who we are</a></li>
        <li class="tabs-title"><a data-tabs-target="what" href="#what">what we do</a></li>
        <li class="tabs-title"><a data-tabs-target="mission" href="#mission">our mission</a></li>
      </ul>

      <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active animated fadeIn" id="who">
          <p>Fast Trac is about providing a revved up convenience experience to its customers while being active in the communities we work in. Fast Trac is a sure stop for all of your daily needs while on the go. No matter how fast paced your day is, Fast Trac has quality fuels for your cars, as well as everything you need to refuel your body to take on whatever comes your way. No matter who you are, or what you do, you have a place at Fast Trac. There just isnt enough time for you to be running across town to get what you need, and we know that, so we have created a number of locations for you to conveniently be able to stop and get what you need, when you need it.</p>
        </div>
        <div class="tabs-panel animated fadeIn" id="what">
          <p>Fast Trac does what you need. We provide our customers with a warm and friendly atmosphere, where they can get the things they need, when they need it fast. With multiple locations through out the Youngstown, Ohio area.</p>
        </div>
        <div class="tabs-panel animated fadeIn" id="mission">
          <p>Our mission is to provide our customers with the quality products they want and need, in a clean and friendly environment, with great customer service.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="stacks">
  <div class="stacked-wrapper inner-row border-top" data-equalizer>
    <div class="stack-media large-order-2 wow animated fadeIn" role="img" aria-label="Success Image" data-equalizer-watch style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
      <!-- <img src="img/fasttrac-day@1000px.jpg" alt=""> -->
    </div>
    <div class="stack-content container large-order-1 wow animated fadeIn" data-equalizer-watch>
      <h1>our success story</h1>
      <p>Fast Trac is a convenience store chain based in Youngstown, Ohio. For nearly twenty years, our mission at Fast Trac has been to meet the growing needs of the customers. Obviously, things have continued to change over the years. Life has become faster and much busier, and our customers expect us to be there to help them along the way. One thing that hasn't changed is our commitment to our customers, employees and especially the communities in which we operate on a daily basis.</p>
      <p>Hadi A. Hadi and Dan Qutail founded the Fast Trac convenience store chain after coming together with an idea to create a local convenience store chain in the the town they both had grown up in. The first location that was purchased was located in Liberty Township where Hadi and Dan both worked together to operate. This location was operated under Xpress Fuel Mart.</p>
      <p>It was not until October of 2006 that the second store was opened. By 2009 they were operating six locations in the Youngstown, Ohio market. under the name Xpress Convenience Stores. In 2010 Fast Trac was born and they purchased 15 more locations in the Youngstown, Ohio market. Literally tripling the size of the company.</p>
      <p>In 2016 the company built its first ground up Fast Trac Convenience Store located in Austintown, Ohio which also has a Subway and a local coffee shop chain.</p>
      <p>Continuing the successful growth, the second ground up location was built in 2017. Hadi and Dan continue to handle the day to day operations, both managing different aspects of the company while building a strong local team and being active in the communities they operate in.</p>
    </div>

  </div> <!-- end stacked-wrapper -->
</section>

<div class="about-counter-bar">
  <div class="container">
    <div class="inner-row counter-items-container wow animatied flipInX">
      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-smile"></i>
        </span>
        <span class="counter-number" data-count="1000000">
          0
        </span>
        <span class="counter-text">
          happy customers
        </span>
      </div>

      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-building"></i>
        </span>
        <span class="counter-number" data-count="31">
          0
        </span>
        <span class="counter-text">
          locations
        </span>
      </div>

      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-trophy"></i>
        </span>
        <span class="counter-number" data-count="110">
          0
        </span>
        <span class="counter-text">
          local awards
        </span>
      </div>

      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-award"></i>
        </span>
        <?php
        $startYear = new DateTime('2005-01-01');
        $currentYear = new DateTime();
        $diff= date_diff($currentYear, $startYear);
        ?>
        <span class="counter-number" data-count="<?php echo $diff->y; ?>">
          0
        </span>
        <span class="counter-text">
          years in business
        </span>
      </div>

    </div>
  </div>

</div>
<?php get_footer(); ?>
