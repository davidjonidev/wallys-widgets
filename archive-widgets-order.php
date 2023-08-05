<?php get_header() ?>
<h1 class="text-4xl font-bold uppercase mt-[2rem] mb-[2rem] text-center">Order History</h1>
<section class="max-w-screen-lg mx-auto">
<?php
if (have_posts()) : ?>
    <div class="flex flex-col gap-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Order Date/Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php while (have_posts()) :
            the_post(); ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php the_ID() ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo get_the_date( 'd/m/Y - H:i:s' ) ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php the_field('first_name'); ?>
                    <?php the_field('last_name'); ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php the_field('email_address'); ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                </th>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>
<?php endif;
?>
</section>

<?php get_footer() ?>