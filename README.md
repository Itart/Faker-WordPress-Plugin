PHP-Faker WordPress Plugin
========================

Provides a way to use the [PHPFaker](https://github.com/Itart/php-faker) library in WordPress

###Version
1.0.0 

###Requirements

WordPress 3.3 or later, PHP 5.3 or later.

###Usage

Functionality way:
<code php>
echo faker_generate('name', 'name');
</code>
<code php>
echo faker_generator('address')->zipCode();
</code>
or Object Oriented way:
<code php>
echo Faker::getFaker()->address->zipCode();
</code>
