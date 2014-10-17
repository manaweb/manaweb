<?php

$whereAmI = dirname(realpath(__FILE__)). DIRECTORY_SEPARATOR;
 
set_include_path(
    implode(
        PATH_SEPARATOR,
        // Retorna o array sem dados duplicados
        array_unique(
            array_merge(
                array(
                    $whereAmI . 'site/',
                ),
                explode(PATH_SEPARATOR, get_include_path())
            )
        )
    )
);
 
spl_autoload_register(
    function ($qname)
    {
        $qname2path = stream_resolve_include_path(
            str_replace('\\', DIRECTORY_SEPARATOR, $qname) . '.php');
 
        if ($qname2path !== false) {
            require $qname2path;
        }
    }
);