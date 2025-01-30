<?php

return [
    'routeMiddleware' => [
        // ...
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ],
];
?>