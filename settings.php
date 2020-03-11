<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Roundy filter settings
 *
 * @package    filter_roundy
 * @copyright  2020 tim@avideelearning.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    $item = new admin_setting_configtext('filter_roundy/classname',
                                         new lang_string('classname', 'filter_roundy'),
                                         new lang_string('classname_help', 'filter_roundy'),
                                         'ittaMenu',
                                         PARAM_RAW);
    $settings->add($item);

    $item = new admin_setting_configtext('filter_roundy/radius',
                                         new lang_string('radius', 'filter_roundy'),
                                         new lang_string('radius_help', 'filter_roundy'),
                                         '275',
                                         PARAM_RAW);
    $settings->add($item);

    $item = new admin_setting_configtext('filter_roundy/xoffset',
                                         new lang_string('xoffset', 'filter_roundy'),
                                         new lang_string('xoffset_help', 'filter_roundy'),
                                         '250',
                                         PARAM_RAW);
    $settings->add($item);

    $item = new admin_setting_configtext('filter_roundy/yoffset',
                                         new lang_string('yoffset', 'filter_roundy'),
                                         new lang_string('yoffset_help', 'filter_roundy'),
                                         '250',
                                         PARAM_RAW);
    $settings->add($item);


    $item = new admin_setting_configcheckbox('filter_roundy/defaultstyles',
                                             new lang_string('defaultstyles', 'filter_roundy'),
                                             new lang_string('defaultstyles_help', 'filter_roundy'),
                                             1);
    $settings->add($item);


}