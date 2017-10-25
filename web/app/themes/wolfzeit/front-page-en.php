<?php while (have_posts()) : the_post(); ?>

<h1>W&nbsp;O&nbsp;L&nbsp;F Z&nbsp;E&nbsp;I&nbsp;T.com</h1>

<div class="front-page--icon-container">
    <ul class="flex-container">
      <li class="flex-item-front-page">
        <a class="weisserlink" href="<?php echo get_home_url(); ?>/printdesign">
          <img src="<?php echo content_url(); ?>/uploads/icon-wacom.png" alt="My Canon EOS" />
          <p>Design of flyers, calling cards, posters and websites.</p>
        </a>
      </li>
      <li class="flex-item-front-page">
        <a class="weisserlink" href="<?php echo get_home_url(); ?>/fotografie">
          <img src="<?php echo content_url(); ?>/uploads/icon-eos.png" alt="My Wacom" />
          <p>Professional portraits not just for orchestra, competition and concert.</p>
        </a>
      </li>
      <li class="flex-item-front-page">
        <img src="<?php echo content_url(); ?>/uploads/icon-schoeps.png" alt="My Schoeps MK4" />
        <p>Recording for SoundCloud, YouTube, Podcast and CD.</p>
      </li>
    </ul>
</div>

<img class="logo-wolfzeit-knopf animated zoomIn delay2 duration1" alt="W O L F Z E I T Logo" onerror="this.onerror=null; this.src='/app/uploads/logo-wolf-knopf.svg'" src="/app/uploads/logo-wolf-knopf.svg">

<?php endwhile; ?>
