<?php get_header() ?>
<h1 class="text-4xl font-bold uppercase mt-[2rem] mb-[2rem] text-center">Order History</h1>
<section class="max-w-screen-lg mx-auto">
<?php
if (have_posts()) : ?>
    <div class="flex flex-col gap-4 mb-4 items-center">
        <a href="/" class="text-[0.8rem] font-semibold cursor-pointer flex items-baseline"><i class="fa-solid fa-arrow-left-long mr-2 text-blue-500 hover:text-blue-700 ease-in duration-300"></i>New Order</a>
        <div class="flex flex-col gap-2 border p-2 bg-slate-100 rounded">
            <div class="text-center">Click on the order id to view a dialog of order details, or click on the details button to view order page.</div>
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
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap min-[831px]:!border-b-0 max-[830px]:flex max-[830px]:flex-col max-[830px]:gap-2">
                        <span class="min-[831px]:hidden max-[830px]:text-[0.725rem] max-[830px]:underline max-[830px]:uppercase dark:text-white">Order ID</span>
                        <button type="button" class="fetchPreview p-2 rounded bg-slate-200 hover:bg-blue-700 hover:text-white" data-id="<?php the_ID() ?>"><?php the_ID() ?></button>
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

    <dialog id="orderDialog" class="border rounded">
        <div id="orderDialogContent" class="flex flex-col border rounded bg-slate-200 text-black p-4"></div>
        <!-- <button type="button" id="closeDialog">Close</button> -->
        <button type="button" id="closeDialog" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-700 hover:text-gray-500 hover:bg-gray-100">
              <span class="sr-only">Close menu</span>
              <!-- Heroicon name: outline/x -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
    </dialog>
<?php endif;
?>
</section>

<?php get_footer() ?>