<?php
/**
 * Config-file for development mode with error reporting.
 */

/**
 * Set one of Development or Production mode.
 */
define(ANAX_DEVELOPMENT, true);
//define(ANAX_PRODUCTION, true);



/**
 * Set true or false to activate session by default.
 */
define(ANAX_WITH_SESSION, true);



/**
 * Set the error reporting.
 */
error_reporting(-1);                  // Report all type of errors
//error_reporting(E_ALL ^ E_DEPRECATED);  // Report no deprecated errors
ini_set('display_errors', 1);           // Display all errors



/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "<p>Anax: Uncaught exception:</p><p>Line "
        . $e->getLine()
        . " in file "
        . $e->getFile()
        . "</p><p><code>"
        . get_class($e)
        . "</code></p><p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});
