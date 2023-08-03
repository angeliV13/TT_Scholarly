<?php

function examCacheWrite($cacheName, $content){
    $cacheFile  = "cache" . DIRECTORY_SEPARATOR . sha1($cacheName);
    $handle     = fopen($cacheFile, 'a');

    fwrite($handle, $content);
    fclose($handle);

    return 0;
}

function examCacheRead($cacheName, $maxAge = 0, $deleteExpired = true){
    $cacheFile = "cache" . DIRECTORY_SEPARATOR . sha1($cacheName);
    if(file_exists($cacheFile)){
        if($maxAge == 0 || (time() - filemtime($cacheFile)) <= $maxAge){
            return file_get_contents($cacheFile);
        }
        elseif($deleteExpired){
            unlink($cacheFile);
        }
    }
    return NULL;
}