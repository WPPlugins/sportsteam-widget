
=== Sportsteam Widget ===
Contributors: mpol
Tags: sport, sports, widget, team, teams, match, matches, game, games, league, leagues, competition, soccer
Requires at least: 3.7
Tested up to: 4.8
Stable tag: 2.2.2

A widget that shows the next match of a team.

== Description ==

SportsTeam Widget is a widget that shows the next match of a game.
It uses a Custom Post Type for sportsteams, together with a Taxonomy/Term
for the class/level where the team plays.


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Fill the Teams posts, together with the featured image.
4. Optionally use Taxonomies/Terms.
5. Add the widget to the sidebar where you want it and select the teams and dates.
6. Optionally set the colors with CSS colors.
7. Enjoy.


== Frequently Asked Questions ==

= No questions have been asked yet. =

Email any questions to marcel at timelord dot nl.

== Screenshots ==

1. Frontend of the widget, with both teams for the match displayed.
2. Backend of the widget, select teams and other metadata.

== Changelog ==

= 2.2.2 =
* 2016-10-04
* Fix PHP notices.

= 2.2.1 =
* 2016-05-17
* Add filter for thumbnail size.
* Add widget.php file with Widget class.
* Update Donate text.

= 2.2.0 =
* 2016-02-03
* Add results to widget (optional).
* If title is empty, don't show it.
* Use $before_widget properly.

= 2.1.9 =
* 2016-01-10
* Make archive pages work.

= 2.1.8 =
* 2015-12-11
* Drop pot and nl_NL, they are maintained at GlotPress.

= 2.1.7 =
* 2015-10-04
* Use plugins_url() for enqueue.

= 2.1.6 =
* 2015-09-28
* Only support WordPress 3.7+, since they really are supported.
* Change title of widget.
* Use medium thumbnail.
* Set width of post thumbnail to 100%.

= 2.1.5 =
* 2015-09-05
* Change textdomain to slug.
* Add option to show as links or not.
* Update pot, nl_NL.

= 2.1.4 =
* 2015-08-24
* Change Out to Away.

= 2.1.3 =
* 2015-08-05
* Use headings correctly on admin page.

= 2.1.2 =
* 2015-07-05
* Use the correct __construct for WP_Widget.

= 2.1.1 =
* 2015-06-03
* Add About page.
* Update pot and nl_NL.

= 2.1 =
* 2015-03-07
* Separator is now in grayscale.
* Improve HTML/CSS.

= 2.0 =
* 2015-03-06
* First public version.

= 1.0 =
* First version.

