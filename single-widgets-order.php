<?php get_header() ?>

<?php

    $order_details = get_post_meta( get_the_ID() , '_order_results' );
    $order_details = json_decode($order_details[0]);

?>


    <article class="max-w-screen-lg mx-auto ">
        <h1 id="page-title" class="text-4xl font-bold uppercase mt-[2rem] mb-[2rem] text-center"><?php the_title() ?></h1>
        <section class="mt-4">
            <div class="flex flex-col gap-4 mb-4">
                <a href="/order-history" class="text-[0.8rem] font-semibold cursor-pointer flex items-baseline"><i class="fa-solid fa-arrow-left-long mr-2 text-blue-500 hover:text-blue-700 ease-in duration-300"></i>Orders</a>
                <div class="flex flex-col gap-2 border p-2 bg-slate-100 rounded">
                    <div class="text-center">Order details</div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2 bg-slate-100 p-4 border rounded">
                    <span class="text-[0.725rem] underline uppercase font-medium">Order ID</span>
                    <?php the_ID() ?>
                </div>
                <div class="flex flex-col gap-2 bg-slate-100 p-4 border rounded">
                    <span class="text-[0.725rem] underline uppercase font-medium">Order ID</span>
                    <?php echo get_the_date( 'd/m/Y - H:i:s' ) ?>
                </div>
                <div class="flex flex-col gap-2 bg-slate-100 p-4 border rounded">
                    <span class="text-[0.725rem] underline uppercase font-medium">Order ID</span>
                    <?php the_field('first_name'); ?>
                    <?php the_field('last_name'); ?>
                </div>
                <div class="flex flex-col gap-2 bg-slate-100 p-4 border rounded">
                    <span class="text-[0.725rem] underline uppercase font-medium">Order ID</span>
                    <?php the_field('email_address'); ?>
                </div>
            </div>

            <div class="flex flex-col overflow-auto mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-700 uppercase bg-slate-100 border rounded">
                    <tr>
                        <th class="px-6 py-3 !border-b-0">Pack Size</th>
                        <th class="px-6 py-3 !border-b-0"># Required</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($order_details as $key => $val) {
                    if ( $val !== 0) {
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 w-full ">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $key; ?></td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $val; ?></td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
            </div>
        </section>

    </article>

<?php get_footer() ?>