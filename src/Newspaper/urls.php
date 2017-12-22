<?php
return array(
        /*
         * کار با دنبال‌کننده‌ها
         */
        array(
        'regex' => '#^/follower/new$#',
        'model' => 'Newspaper_Views_Follower',
        'method' => 'create',
        'http-method' => array(
            'POST'
        )
    ),
    array(
        'regex' => '#^/follower/find$#',
        'model' => 'Newspaper_Views_Follower',
        'method' => 'find',
        'http-method' => array(
            'GET'
        )
    ),
    array(
        'regex' => '#^/follower/(\d+)$#',
        'model' => 'Newspaper_Views_Follower',
        'method' => 'get',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        )
    ),
    array(
        'regex' => '#^/follower/(\d+)$#',
        'model' => 'Newspaper_Views_Follower',
        'method' => 'update',
        'http-method' => 'POST',
        'precond' => array(
            'User_Precondition::ownerRequired'
        )
    ),
    array(
        'regex' => '#^/follower/(\d+)$#',
        'model' => 'Newspaper_Views_Follower',
        'method' => 'delete',
        'http-method' => 'DELETE',
        'precond' => array(
            'User_Precondition::ownerRequired'
        )
    )
);