Roundy Filter
=============

Repositions hyperlinks into a circle at a given radius, adds images and labels, to make a neat circular menu system from an arbitary number of links.

Sprinkle in some clever CSS for a circular menu with hover effects.

Example
-------

![screenshot](screenshot.jpg)

Set up
------

The filter settings include the name of the class of the div to match on (default: ittaMenu), and the radius to draw (default: 275), and an option to include the default styles (default: true)

The menu expects a div containing a h1 and some hyperlinks. The div will have the following html structure:

```html

<div class="ittaMenu">
    <h1>
        BSB51918 Diploma of Leadership and Management
    </h1>
    <a href="http://localhost/course/view.php?id=35&section=1" title="INTRODUCTION">
        <img alt="Introduction" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2023.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=2" title="BSBWOR501">
        <img alt="Manage Personal Work Priorities and Professional Development" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2022.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=3" title="BSBADM502">
        <img alt="Manage meetings" height="125" src="http://localhost/draftfile.php/36/user/draft/179342490/Image%205.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=4" title="BSBLDR511">
        <img alt="Develop and use emotional intelligence" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%209.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=5" title="BSBLDR502">
        <img alt="Lead and manage effective workplace relationships" height="125" src="http://localhost/draftfile.php/36/user/draft/179342490/Image%203.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=6" title="BSBWOR502">
        <img alt="Lead and manage team effectiveness" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2021.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=7" title="BSBMGT502">
        <img alt="Manage people performance" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2017.jpg"/>
    </a>
    <a href="http://localhost/course/view.php?id=35&section=8" title="BSBLDR513">
        <img alt="Communicate with influence" height="125" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%204.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=9" title="BSBMGT516">
        <img alt="Facilitate continuous improvement" height="130" src="http://localhost/draftfile.php/36/user/draft/179342490/section4.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=10" title="BSBCUS501">
        <img alt="Manage quality customer service" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2015.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=11" title="BSBRSK501">
        <img alt="Manage risk" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2012.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=12" title="BSBMGT517">
        <img alt="Manage operational plan" height="128" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2011.jpg" />
    </a>
    <a href="http://localhost/course/view.php?id=35&section=13" title="BSBPMG522">
        <img alt="Undertake project work" src="http://localhost/draftfile.php/36/user/draft/179342490/Moodle%2010.jpg"/>
    </a>
</div>

```

hyperlink titles become captions; image alt tags become text that appears when you mouse-over a circle.

![mouseover](mouseover.jpg)

In the moodle editor, add images for your circles. Then hyperlink each image to the section names or places in the course you want to jump to. Ensure that a h1 contains the text for the centre of the circle.

The filter should be set up to be enabled but off globally, then enabled on only the courses where you want it to be used. Filters apply everwhere on the page (all blocks and sections) so you could have a circular menu in a block if you want.

Notes
-----

The default styles are stored in the plugin and included into the page as a link (because Moodle can't register them to the page during a filter, because reasons). Check out the style.css for default styling if you want to override it in your theme.

Licence
-------
GPL3