<?php get_header() ?>
<h1 class="text-4xl font-bold uppercase mt-[2rem] mb-[2rem] text-center">Order History</h1>
<section class="max-w-screen-lg mx-auto">
<?php
if (have_posts()) : ?>
    <div class="flex flex-col gap-4 mb-4">
        <div class="flex flex-col gap-2 border p-2 bg-slate-100 rounded">
            <div class="no-post-selected text-center">Select an order to view details</div>
        </div>
    </div>

    <div class="flex flex-col gap-4 overflow-auto">
        <table id="order-history-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-slate-100 rounded max-[830px]:hidden">
                <tr>
                    <th scope="col" class="px-6 py-3 !border-b-0">
                        Order ID
                    </th>
                    <th scope="col" class="px-6 py-3 !border-b-0">
                        Order Date/Time
                    </th>
                    <th scope="col" class="px-6 py-3 !border-b-0">
                        Customer Name
                    </th>
                    <th scope="col" class="px-6 py-3 !border-b-0">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 !border-b-0">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php while (have_posts()) :
                the_post(); ?>
                <tr class="order-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 w-full max-[830px]:grid max-[830px]:grid-cols-2 max-[500px]:grid-cols-1 max-[830px]:gap-4 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white min-[831px]:!border-b-0 max-[830px]:flex max-[830px]:flex-col max-[830px]:gap-2">
                        <span class="min-[831px]:hidden max-[830px]:text-[0.725rem] max-[830px]:underline max-[830px]:uppercase">Order ID</span>
                        <?php the_ID() ?>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white min-[831px]:!border-b-0 max-[830px]:flex max-[830px]:flex-col max-[830px]:gap-2">
                        <span class="min-[831px]:hidden max-[830px]:text-[0.725rem] max-[830px]:underline max-[830px]:uppercase">Date/Time</span>
                        <?php echo get_the_date( 'd/m/Y - H:i:s' ) ?>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white min-[831px]:!border-b-0 max-[830px]:flex max-[830px]:flex-col max-[830px]:gap-2">
                        <span class="min-[831px]:hidden max-[830px]:text-[0.725rem] max-[830px]:underline max-[830px]:uppercase">Customer Name</span>
                        <?php the_field('first_name'); ?>
                        <?php the_field('last_name'); ?>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white min-[831px]:!border-b-0 max-[830px]:flex max-[830px]:flex-col max-[830px]:gap-2">
                        <span class="min-[831px]:hidden max-[830px]:text-[0.725rem] max-[830px]:underline max-[830px]:uppercase">Email</span>
                        <?php the_field('email_address'); ?>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white min-[831px]:!border-b-0 max-[830px]:col-span-2 max-[500px]:col-span-1">
                        <a href="<?php echo get_the_permalink(); ?>" class="block cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Details</a>
                    </th>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
<?php endif;
?>
</section>

<?php get_footer() ?>