<?php get_header() ?>
    <article class="max-w-screen-lg mx-auto ">
        <h1 id="page-title" class="text-4xl font-bold uppercase mt-[2rem] mb-[2rem] text-center"><?php the_title() ?></h1>
        <section class="mt-4">
            <?php the_content() ?>
        </section>

    </article>

<?php get_footer() ?>