<?php
if (!function_exists('generateFormModel')) {
    function generateFormModel(...$options)
    {
        $models = [];
        foreach ($options as $option) {
            $models[] = [
                'id' => $option[0],
                'name' => $option[1]
            ];
        }

        return (object)$models;
    }
}

