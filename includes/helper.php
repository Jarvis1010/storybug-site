<?php 
    /**
     * The Below two functions were taken from Harvard's CS50 helper.php files used for instruction
     * 
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists($_SERVER["DOCUMENT_ROOT"]."/views/{$view}"))
        {
            // extract variables into local scope
            extract($values);
           
            // render view (between header and footer)
            require $_SERVER["DOCUMENT_ROOT"]."/views/header.php";
            require $_SERVER["DOCUMENT_ROOT"]."/views/{$view}";
            require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php";
            exit;
       }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

?>	