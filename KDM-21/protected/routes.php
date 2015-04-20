<?php

return [

    '/index' => '///',


    '/news/archive/<1>' => '/News/Index/Archive(year=<1>)',
    '/news/topics/<1>' => '/News/Index/NewsByTopic(id=<1>)',
    '/news/<1>' => '/News/Index/Story(id=<1>)',
    '/news/archives/' => '/News/Index/Archives',

    '/pages/<3>/<2>/<1>' => '/Pages/Index/PageByUrl(url=<1>)',
    '/pages/<2>/<1>' => '/Pages/Index/PageByUrl(url=<1>)',
    '/pages/<1>' => '/Pages/Index/PageByUrl(url=<1>)',

    '/gallery/albums/<1>' => '/Gallery/Index/AlbumByUrl(url=<1>)',

];