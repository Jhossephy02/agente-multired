protected $routeMiddleware = [
    // ...
    'auth' => \App\Http\Middleware\Authenticate::class,
    // agrega esta línea:
    'role' => \App\Http\Middleware\EnsureRole::class,
];
