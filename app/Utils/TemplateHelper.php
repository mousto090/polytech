<?php

namespace App\Utils;

use App\Models\Country;
use App\Models\User;

class TemplateHelper
{
    /**
     * @param Country[] $countries
     * @param string $selected_id
     * @return string
     */
    public static function dropdown_contries(array $countries, string $selected_id = ''): string
    {
        $html = '<option value="">Séléctionnez un pays</option>';
        foreach ($countries as $country) {
            $html .= sprintf(
                '<option value="%s" %s>%s</option>',
                $country->getId(),
                $country->getId() === $selected_id ? 'selected': '',
                $country->getName()
            );
        }
        return $html;
    }

    public static function list_users_row(User $user)
    {
        ?>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                        <svg class="h-full w-full text-gray-300" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900"><?= $user->getFirstName() ?></div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"><?=$user->getLastName()?></div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  <?=$user->getCountry()->getName()?>
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="/?action=update&id=<?= $user->getId() ?>"
                   class="text-indigo-600 hover:text-indigo-900 p-2">Modifier</a>
                <a href="/?action=delete&id=<?= $user->getId() ?>"
                   onclick="return window.confirm(`Êtes-vous sur de vouloir supprimer cet utilisateur ?`)"
                   class="text-red-600 hover:text-indigo-900 p-2">Supprimer</a>
            </td>
        </tr>
        <?php
    }
}