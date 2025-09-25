<?php

namespace App\Helpers;

class FilterHelper
{
    public static function buildFilters(array $filters = []): string
    {
        $query = [];

        if (!empty($filters['keyword'])) {
            $query['keyword'] = $filters['keyword'];
        }

        if (!empty($filters['location'])) {
            $query['location'] = $filters['location'];
        }

        foreach (['categories', 'job_types', 'experiences', 'educations'] as $filterKey) {
            if (!empty($filters[$filterKey]) && is_array($filters[$filterKey])) {
                foreach ($filters[$filterKey] as $val) {
                    $query[$filterKey][] = $val;
                }
            }
        }

        return http_build_query($query);
    }
}
