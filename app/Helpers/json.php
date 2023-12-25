<?php

if (!function_exists('states')) {
    function states(): array
    {
        try {
            $path = base_path('storage/josn/states.json');
            $json = file_get_contents($path);
            return json_decode($json, true);
        } catch (Exception $e) {
            return [];
        }
    }
}


if (!function_exists('cities')) {
    function cities(): array
    {
        try {
            $path = base_path('storage/josn/cities.json');
            $json = file_get_contents($path);
            return json_decode($json, true);
        } catch (Exception $e) {
            return [];
        }
    }
}

if (!function_exists('units')) {
    function units(): array
    {
        try {
            $path = base_path('storage/josn/units.json');
            $json = file_get_contents($path);
            return json_decode($json, true);
        } catch (Exception $e) {
            return [];
        }
    }
}

if (!function_exists('packingSizes')) {
    function packingSizes(): array
    {
        try {
            $path = base_path('storage/josn/packingSize.json');
            $json = file_get_contents($path);
            return json_decode($json, true);
        } catch (Exception $e) {
            return [];
        }
    }
}
