<?php
//https://www.apptha.com/blog/import-google-calendar-events-in-php/


/* Here we are getting the timezone to get the event dates according to gio location */
$timeZone = trim ( $icsEvents [1] ['X-WR-TIMEZONE'] );
unset( $icsEvents [1] );
$html = '<table><tr><td> Event </td><td> Start at </td><td> End at </td></tr>';
foreach( $icsEvents as $icsEvent){
        /* Getting start date and time */
        $start = isset( $icsEvent ['DTSTART;VALUE=DATE'] ) ? $icsEvent ['DTSTART;VALUE=DATE'] : $icsEvent ['DTSTART'];
        /* Converting to datetime and apply the timezone to get proper date time */
        $startDt = new DateTime ( $start );
        $startDt->setTimeZone ( new DateTimezone ( $timeZone ) );
        $startDate = $startDt->format ( 'm/d/Y h:i' );
        /* Getting end date with time */
        $end = isset( $icsEvent ['DTEND;VALUE=DATE'] ) ? $icsEvent ['DTEND;VALUE=DATE'] : $icsEvent ['DTEND'];
        $endDt = new DateTime ( $end );
        $endDate = $endDt->format ( 'm/d/Y h:i' );
        /* Getting the name of event */
        $eventName = $icsEvent['SUMMARY'];
        $html .= '<tr><td>'.$eventName.'</td><td>'.$startDate.'</td><td>'.$endDate.'</td></tr>';
}
echo $html.'</table>';


?>