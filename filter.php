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
 * Version details
 *
 * @package    filter
 * @subpackage roundy
 * @copyright  tim@avideelearning.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class filter_roundy extends moodle_text_filter {

    public function filter($text, array $options = array()) {
        global $CFG; // $PAGE,

        // skip past anything that isn't our menu
        $config_classname = get_config('filter_roundy', 'classname'); $config_classname = $config_classname ?: "ittaMenu";
        $pattern = '<div (?:id|class)\=(["\'])' . $config_classname . '\1>';
        if (!preg_match($pattern, $text, $arr)) return $text;

        // gather and set default config values
        $config_radius = get_config('filter_roundy', 'radius'); $config_radius = intval($config_radius ?: 275);
        $config_xoffset = get_config('filter_roundy', 'xoffset'); $config_xoffset = intval($config_xoffset ?: 250);
        $config_yoffset = get_config('filter_roundy', 'yoffset'); $config_yoffset = intval($config_yoffset ?: 250);
        $config_styles = (get_config('filter_roundy', 'defaultstyles') !== "0");

        // node caches
        $doc = new DOMDocument();
        $doc->loadHTML($text);
        $root = $doc->getElementById($config_classname);
        if (empty($root)) {
            $finder = new DomXPath($doc);
            $nodes = $finder->query("//div[@class='{$config_classname}']");
            $root = $nodes[0];
        }
        $links = $root->getElementsByTagName('a');
        $title = $root->getElementsByTagName('h1')[0]->nodeValue;

        // variables
        $li = [];
        $index = 0;
        $delta = (2 * M_PI) / $links->length;
        $radius = $config_radius;
        $xOffset = $config_xoffset;
        $yOffset = $config_yoffset;

        // grap elements and reformat them
        foreach ($links as $node) {

            $image = $node->getElementsByTagName('img')[0];

            $href = $node->getAttribute('href');
            $caption = $node->getAttribute('title');

            $bg = $image->getAttribute('src');
            $label = $image->getAttribute('alt');

            // calculate position in circle (radians)
            $theta = ($delta * $index) - M_PI_2; // pi on 2 = top of circle, see https://math.rice.edu/~pcmi/sphere/drg_txt.html
            $left = floor(cos($theta) * $radius) + $xOffset;
            $top = floor(sin($theta) * $radius) + $yOffset;

            $li[] = <<<LI
<li style="top:{$top}px;left:{$left}px" data-index="sub_{$index}">
    <a href="{$href}" style="background-image:url({$bg});">
        <span>{$label}</span>
    </a>
    <div>{$caption}</div>
</li>
LI;
            $index++;
        }

        // cheaty hack to use ternary inside heredoc format
        $if = function ($condition, $true, $false) { return $condition ? $true : $false; };
        $style = "<link rel='stylesheet' type='text/css' href='{$CFG->wwwroot}/filter/roundy/style.css'>";

        $ol = implode("\n", $li);

        // prepare output html, unfortunately has to include styles link this way - including via $PAGE doesn't work :(
        // $PAGE->requires->css_theme(new moodle_url('/filter/roundy/style.css'));
        $html = <<<HTML
<div id="ittaMenu">
{$if($config_styles,$style,"")}
<div id="circular_nav">
    <div id="hint"></div>
    <div id="map">
        <h1>{$title}</h1>
    </div>
    <ol>
        {$ol}
    </ol>
</div>
</div>
HTML;

        // return updated html
        return $html;

    }
}