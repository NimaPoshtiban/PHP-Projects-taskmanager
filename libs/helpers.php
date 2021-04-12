<?php
# limiting user direct access to the file
defined('BASE_PATH') or die("Permission Denied!");

function site_url(string $uri=''):string
{
    return BASE_URL . $uri;
}

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

function isAjaxRequest()
{
    // code copied from stackOverFlow
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest') {
        return true;
    }
    return false;
}

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
