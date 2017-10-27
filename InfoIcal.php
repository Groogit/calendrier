<?php

/* Replace the URL / file path with the .ics url */
$file = "https://calendar.google.com/calendar/ical/innovationjulian%40gmail.com/public/basic.ics";
/* Getting events from isc file */
$obj = new ics();
$icsEvents = $obj->getIcsEventsAsArray( $file );


?>