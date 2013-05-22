<?php
/**
 * @author Jacek Wysocki <jacek.wysocki@gmail.com>
 */
require __DIR__ . '/../vendor/autoload.php';

use Hal\Resource;
use Hal\Link;

/* Create a new Resource Parent */
$parent = new Resource('/dogs');
/* Add any relevent links */
$parent->setLink(new Link('/dogs?q={text}', 'search'));

$dogs[1] =  new Resource('/dogs/1');
$dogs[1]->setData(
    array(
        'id' => '1',
        'name' => 'tiber',
        'color' => 'black'
    )
);

$dogs[2] =  new Resource(
    '/dogs/2',
    array(
        'id' => '2',
        'name' => 'sally',
        'color' => 'white'
    )
);

$dogs[3] =  new Resource(
    '/dogs/3',
    array(
        'id' => '3',
        'name' => 'fido',
        'color' => 'gray'
    )
);
/* Add the embedded resources */

foreach ($dogs as $dog) {
    $parent->setEmbedded('dog', $dog);
}

echo (string) $parent;
