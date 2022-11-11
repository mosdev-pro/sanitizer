<?php

namespace Mosdev\Sanitizer;

use Illuminate\Pipeline\Pipeline;

class Sanitizer
{
    public function __construct(public string $value) { }

    /**
     * Clear value with pipes.
     *
     * @param  array  $pipes
     * @return string
     */
    public function sanitize(array $pipes): string
    {
        $mapPipes = collect($pipes)->map(fn($pipe) => $this->mapSanitizeKeyToPipe($pipe))->toArray();

        app(Pipeline::class)
            ->send($this->value)
            ->through($mapPipes)
            ->then(fn ($value) => $this->value = $value);

        return $this->value;
    }

    /**
     * Find pipes by keys
     *
     * @param string $key
     * @throws \Exception
     * @return string
     */
    private function mapSanitizeKeyToPipe(string $key): string
    {
        if (!$pipe = data_get(config('sanitizer'), 'rules.' . $key)) {
            throw new \Exception('Unknown sanitizer pipe');
        }

        return $pipe;
    }
}
