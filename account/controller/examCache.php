<?php

require("../model/examCacheModel.php");

if (isset($_REQUEST['action'])) 
{
    $action = $_REQUEST['action'];

    switch ($action)
    {
        case 1:
            $page = "index.php?nav=examination_proper";
            $cacheMaxAge = 86400; //Equivalent to One Day

            $cachedData = examCacheRead($page, $cacheMaxAge, true);

            if($cachedData != NULL)
            {
                echo $cachedData;
            }
            else
            {
                ob_start();
                include($page);

                $page_content = ob_get_contents();

                examCacheWrite($page, $page_content);

                ob_end_flush();

            }

            break;
    }
}

?>