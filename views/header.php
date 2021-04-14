<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= \App\Utils\Utils::page_title() ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@0.7.2/dist/tailwind-ui.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        html {
            font-family: Inter var, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
    </style>
</head>
<body>
<div id="page" class="site">
    <header id="masthead" class="site-header">

        <nav class="bg-indigo-700">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden"></div>
                    <div class="flex-1 flex items-center justify-center items-center sm:justify-start">
                        <a href="/" class="block">
                            <span class="flex-shrink-0 flex items-center w-16 pt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125" class="w-auto"
                                     fill="#fff">
                                    <path d="M87.44 36.82l-30.28-7.57a29.69 29.69 0 00-14.33 0l-30.28 7.57c-1.52.38-2.55 1.7-2.55 3.28s1.02 2.9 2.55 3.28l5.05 1.26v9.67c-.67.28-1.26 1-1.26 1.84 0 .68.35 1.29.88 1.64l-2 9.98c-.4 2 1.13 3.86 3.16 3.86s3.56-1.86 3.16-3.86l-2.02-10.09c.45-.36.76-.91.76-1.54 0-.78-.43-1.45-1.1-1.77v-9.35l6.93 1.74v11.78c0 2.39 2.61 4.39 7.55 5.8 4.38 1.25 10.17 1.94 16.32 1.94s11.94-.69 16.32-1.94c4.94-1.41 7.55-3.42 7.55-5.8V46.77l13.57-3.39c1.53-.38 2.56-1.7 2.56-3.28s-1.01-2.9-2.54-3.28zM71.33 58.55c0 .59-1.21 2.04-5.7 3.32-4.15 1.19-9.71 1.84-15.62 1.84s-11.49-.65-15.64-1.84c-4.49-1.28-5.71-2.73-5.71-3.32V47.47l13.68 3.41a32.187 32.187 0 007.65.94c.62 0 1.25-.02 1.87-.06 1.94-.11 3.9-.41 5.79-.88l13.68-3.41v11.08zm15.49-17.68l-30.28 7.57c-1.87.47-3.78.73-5.71.79-.55.02-1.11.02-1.66 0-1.92-.06-3.84-.32-5.71-.79l-30.28-7.57c-.55-.14-.61-.59-.61-.78s.06-.64.61-.78l30.28-7.57c2.14-.53 4.34-.8 6.54-.8s4.4.27 6.54.8l30.28 7.57c.55.14.61.59.61.78s-.07.65-.61.78z"/>
                                </svg>
                            </span>
                        </a>
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a href="/"
                                   class="text-gray-300 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Utilisateurs
                                </a>

                                <a href="/?action=register"
                                   class="text-gray-300 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Inscription
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="/"
                       class="text-gray-300 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Utilisateurs</a>

                    <a href="/?action=register"
                       class="text-gray-300 hover:bg-indigo-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Inscription
                    </a>
                </div>
            </div>
        </nav>

    </header>
