<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * This template is responsible for rendering all the subpages of the `notes` page.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header-note') ?>

<main>
    
       <a class="button" href="http://localhost:8888/maziyar-starterkit-master/notes">Back</a>

  <article class="note">
    <header class="note-header intro">
      <ul>
        <li><?= $page->title() ?></li>
        <li><?= $page->client() ?></li>
           <li><?= $page->year() ?></li>
     </ul>
     
    </header>

    <section class="gallery">
  <?php foreach($page->images() as $image): ?>
  <figure>
    <a href="<?= $image->url() ?>">
      <img src="<?= $image->url() ?>" alt="">
    </a>
  </figure>
  <?php endforeach ?>
</section>
      
      <div class="note-text text">
      <?= $page->text()->kt() ?>
    </div>
  </article>
</main>


