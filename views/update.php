<?php
get_header();
?>
    <div class="page-content">
        <div class="container-row">
            <main id="primary" class="site-main">
                <div class="max-w-7xl mx-auto">
                    <div class="mt-10 py-10 sm:px-6 lg:px-8 bg-gray-200">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Modification de l'utilisateur</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Veuillez sasir les nouvelles informations de l'utilisateur
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="/?action=save-update" method="POST">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <input type="hidden" name="csrf-token" value="<?= $_SESSION[CSRF_TOKEN]?? '' ?>">
                                            <input type="hidden" name="id" value="<?= $user->getId() ?>" />
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="first_name"
                                                       class="block text-sm font-medium text-gray-700">
                                                    Prénoms
                                                </label>
                                                <input type="text" name="first_name" id="first_name"
                                                       class="mt-1 py-2 px-3 border focus:ring-indigo-500 focus:border-indigo-500 block w-full
                                                       focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                                       shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                       value="<?= $user->getFirstName() ?>"
                                                       required>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last_name"
                                                       class="block text-sm font-medium text-gray-700">
                                                    Noms
                                                </label>
                                                <input type="text" name="last_name" id="last_name"
                                                       class="mt-1 py-2 px-3 border focus:ring-indigo-500 focus:border-indigo-500 block w-full
                                                       focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                                                       shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                       value="<?= $user->getLastName() ?>"
                                                       required>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6">
                                                <label for="country"
                                                       class="block text-sm font-medium text-gray-700">
                                                    Pays
                                                </label>
                                                <select id="country" name="country_id" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <?=\App\Utils\TemplateHelper::dropdown_contries($countries, $user->getCountryId())?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Inscription
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </main>
        </div>
    </div>
<?php
get_footer();

