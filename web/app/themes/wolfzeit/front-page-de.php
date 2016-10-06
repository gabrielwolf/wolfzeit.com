<?php while (have_posts()) : the_post(); ?>

<h1>W&nbsp;O&nbsp;L&nbsp;F Z&nbsp;E&nbsp;I&nbsp;T.com</h1>

<div class="front-page--icon-container">
    <ul class="flex-container">
      <li class="flex-item-front-page">
        <img src="<?php echo get_home_url(); ?>/app/uploads/icon-wacom.png" alt="Meine Canon EOS" />
        <p>Design von Flyer, Visitenkarten, Konzertplakat und Webseite.</p>
      </li>
      <li class="flex-item-front-page">
        <img src="<?php echo get_home_url(); ?>/app/uploads/icon-eos.png" alt="Mein Wacom Zeichenbrett" />
        <p>Professionell fotografiert nicht nur für Orchester, Wettbewerb und Konzert.</p>
      </li>
      <li class="flex-item-front-page">
        <img src="<?php echo get_home_url(); ?>/app/uploads/icon-schoeps.png" alt="Meine Schoeps MK4" />
        <p>Recording für SoundCloud, YouTube, Podcast und CD.</p>
      </li>
    </ul>
</div>

<img class="logo-wolfzeit-knopf animated zoomIn delay2 duration1" alt="W O L F Z E I T Logo" onerror="this.onerror=null; this.src='/app/uploads/logo-wolf-knopf.svg'" src="/app/uploads/logo-wolf-knopf.svg">

<?php endwhile; ?>
