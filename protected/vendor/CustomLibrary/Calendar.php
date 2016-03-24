<?php


class Calendar {
    /*
     * draws a calendar 
     */

    public function drawCalendar($month, $year, $data = array()) {
        /* draw table */
        $calendar = '<table class="table table-bordered  bg-default table-responsive">';

        /* table headings */
        $headings = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $headings_big = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $headings_small = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        $full_headings = array();
        for ($i = 0; $i < count($headings); $i++) {
            $full_headings[] = '<div>' . '</div><div class="visible-lg hidden-sm hidden-xs hidden-md">' . $headings_big[$i] . '</div><div class="hidden-lg visible-sm visible-xs visible-md">' . $headings_small[$i] . '' . '</div>';
        }

        $calendar.= '<tr class="bg-primary"><th class="" style="width:14.28571428571429%;">' . implode('</th><th class="" style="width:14.28571428571429%">', $full_headings) . '</th></tr>';

        /* days and weeks vars now ... */
        $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
        $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
        $days_in_this_week = 1;
        $day_counter = 0;
        $dates_array = array();

        /* row for week one */
        $calendar.= '<tr>';

        /* print "blank" days until the first of the current week */
        for ($x = 0; $x < $running_day; $x++):
            $calendar.= '<td><p>&nbsp;</p> </td>';
            $days_in_this_week++;
        endfor;

        // keep going with days.... 
        for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
            $class = '';
//            if ($data[$list_day - 1][$list_day] == 'A') {
//                $class = 'bg-danger';
//            }
//            if ($data[$list_day - 1][$list_day] == 'P') {
//                $class = 'bg-success';
//            }
//            if ($data[$list_day - 1][$list_day] == 'H') {
//                $class = 'bg-aqua';
//            }

            $calendar.= '<td class="' . $class . '" style="">';
            // add in the day number 
            $calendar.= '<div style="text-align:center;">' . $list_day . '</div>';

            // QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! 
            $calendar.= '<p style="text-align:center;">';

            $calendar.= '' . @$data[$list_day - 1][$list_day] . '';
            $calendar.= '</p>';

            $calendar.= '</td>';
            if ($running_day == 6):
                $calendar.= '</tr>';
                if (($day_counter + 1) != $days_in_month):
                    $calendar.= '<tr>';
                endif;
                $running_day = -1;
                $days_in_this_week = 0;
            endif;
            $days_in_this_week++;
            $running_day++;
            $day_counter++;
        endfor;

        /* finish the rest of the days in the week */
        if ($days_in_this_week < 8):
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
                $calendar.= '<td> </td>';
            endfor;
        endif;

        /* final row */
        $calendar.= '</tr>';

        /* end the table */
        $calendar.= '</table>';

        /* all done, return result */
        return $calendar;
    }

}
