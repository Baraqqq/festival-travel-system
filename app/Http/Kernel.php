<?php

return [
    'routeMiddleware' => [
        // ...
        'auth' => \App\Http\Middleware\DisableAuth::class, // Vervang de standaard auth middleware
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    
    ],
];
?>