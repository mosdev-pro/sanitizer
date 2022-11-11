<?php

namespace Mosdev\Sanitizer\Pipelines;

use Closure;

class Numeric
{
    /**
     * Handle an incoming request.
     *
     * @param  string $content
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(string $content, Closure $next): mixed
    {
        $content = preg_replace('/\D/', '', $content);

        return $next($content);
    }
}
