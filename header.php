<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/dist/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" rel="noopener" target="_blank" href="<?php echo get_template_directory_uri() ?>/dist/images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" rel="noopener" target="_blank" href="<?php echo get_template_directory_uri() ?>/dist/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" rel="noopener" target="_blank" href="<?php echo get_template_directory_uri() ?>/dist/images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" rel="noopener" target="_blank" href="<?php echo get_template_directory_uri() ?>/dist/images/android-chrome-512x512.png">
    <link rel="apple-touch-icon" sizes="180x180" rel="noopener" target="_blank" href="<?php echo get_template_directory_uri() ?>/dist/images/apple-touch-icon.png">
    <title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/9ae5b31a01.js" crossorigin="anonymous"></script>
    <?php wp_head() ?>
</head>
<body <?php body_class('flex flex-col h-screen') ?>>
<?php wp_body_open(); ?>

    <header class="flex-0 bg-slate-100 px-4 border shadow-md">
        <div class="max-w-screen-lg mx-auto flex justify-between items-center min-h-[60px] sm:min-h-[70px] md:min-h-[80px] lg:min-h-[100px]">
            <div class="site-logo">
                <a href="<?php echo home_url() ?>">
                    <?php if( get_field('site_logo', 'option') ): ?>
                        <img class="max-h-[40px] sm:max-h-[50px] md:max-h-[60px] lg:max-h-[70px]" src="<?php the_field('site_logo', 'option'); ?>" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="site-menu [&_.menu-open]:opacity-100 [&_.menu-open]:translate-x-0 [&_.menu-open]:z-10">
                <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon" class="w-10 h-10 text-blue-500 hover:text-blue-700 cursor-pointer ease-in duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                <div id="burger-menu" class="fixed translate-x-full opacity-40 bottom-0 right-0 p-8 ease-in duration-300 min-w-[90%] sm:min-w-[300px] md:min-w-[400px] lg:min-w-[500px] bg-white h-full border-l-2">
                    <i id="menu-icon-close" class="fa-solid fa-xmark text-blue-500 hover:text-blue-700 cursor-pointer ease-in duration-300 text-4xl mb-4 text-left w-full"></i>
                    <!-- <ul>
                        <li>Home</li>
                        <li>Orders</li>
                    </ul> -->
                    <?php echo wp_nav_menu() ?>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow px-4 py-4">

