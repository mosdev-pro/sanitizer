<?php

namespace Mosdev\Sanitizer\Pipelines;

use Closure;

class Trim
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
        $content = str($content)->trim()->toString();

        return $next($content);
    }
}
