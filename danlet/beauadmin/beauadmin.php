<?php
/**
 * BeauAdmin
 * PHP Version 5
 * @package BeauAdmin
 * @author VNMilky (BeauAgency) <vnmilky.dev@gmail.com>
 * @copyright 2017 - Hanoi/VietNam
 * @version 1.0.0
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */
include_once wp_normalize_path( get_template_directory() . '/beauadmin/includes/class-beauadmin.php' );
/**
 * Include the autoloader.
 */
include_once wp_normalize_path( get_template_directory() . '/beauadmin/includes/class-beauadmin-autoload.php');

// Required do not blank.
BeauAdmin::$version_theme = '1.0.4';
/**
 * Instantiate the autoloader.
 */
new BeauAdmin_Autoload();
new BeauAdmin();
function BeauAdmin() {
    return BeauAdmin::get_instance();
}