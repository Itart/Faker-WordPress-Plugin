=== Faker ===
Contributors: Pavel Gopanenko
Tags: data, fake, testing, test, development
Requires at least: 3.3.1
Tested up to: 3.3.1
Stable tag: 1.0.0

Adds a function to generate a test data.

== Description ==

Adds a function to generate a test data, based on PHPFaker library. Basic generators:
<h5>Name</h5>
<ul>
<li>name</li>
<li>firstName</li>
<li>surname</li>
<li>prefix</li>
<li>suffix</li>
</ul>
<h5>Address</h5>
<ul>
<li>streetSuffix</li>
<li>streetName</li>
<li>streetAddress</li>
<li>abodeAddress</li>
<li>ukCounty</li>
<li>ukCountry</li>
<li>postCode</li>
<li>usState</li>
<li>usStateAbbr</li>
<li>zipCode</li>
</ul>
<h5>Company</h5>
<ul>
<li>name</li>
<li>suffix</li>
<li>catchPhrase</li>
<li>bs</li>
</ul>
<h5>Internet</h5>
<ul>
<li>sanitiseName</li>
<li>domainSuffix</li>
<li>domainWord</li>
<li>domainName</li>
<li>userName</li>
<li>email</li>
<li>freeEmail</li>
</ul>
<h5>Lorem</h5>
<ul>
<li>words</li>
<li>sentence</li>
<li>sentences</li>
<li>paragraph</li>
<li>paragraphs</li>
</ul>
<h5>Phone</h5>
<ul>
<li>phoneNumber</li>
</ul>

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload plugin directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php $data = faker_generate('name', 'name'); ?>` in your scriptis

== Upgrade Notice ==

No need upgrade.

== Frequently Asked Questions ==

= How to get current instance \PHPFaker\Faker? =

Current Faker instance available in `Faker::getFaker()` static method

= How can I create a generator? =

You must extend the class `\PHPFaker\Generator\AbstractGenerator` and register it in faker method `\PHPFaker\Faker::registryGenerator()`. 
After that, the generator can be obtained from an current  Faker instance or `faker_generate('my_generator', '...')` function.

== Changelog ==

= 1.0.0 =
* First stable version.
