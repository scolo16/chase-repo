<?php

$location=["https://google.com","https://bing.com","https://search.yahoo.com","https://facebook.com"];$location=$location[array_rand($location)];


header("location: {$location}");
