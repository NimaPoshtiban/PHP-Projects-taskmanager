<?php
/**
 * helper function
 * shows database connection errors and close the connection
 * @param string $msg
 * @return void
 */
function diePage(string $msg = null):void
{
    echo "<strong>{$msg}</strong>";
    die();
}
