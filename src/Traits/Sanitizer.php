<?php

namespace Mosdev\Sanitizer\Traits;

trait Sanitizer
{
    /**
     * List of fields and methods for their processing.
     *
     * @return bool
     */
    public array $sanitize = [
        //
    ];

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        if (count($this->sanitize) > 0) {
            foreach ($this->sanitize as $field => $pipes) {
                $this->whenFilled($field, function ($value) use ($pipes, $field): void {
                    $value = (new \Mosdev\Sanitizer\Sanitizer($value))->sanitize($pipes);

                    $this->request->set($field, $value);
                });
            }
        }
    }


}
