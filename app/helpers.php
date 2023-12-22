<?php

if (!function_exists('indonesian_date')) {
    function indonesian_date(\Illuminate\Support\Carbon $date): string
    {
        $months = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        return $date->get('day') . " " . $months[$date->get('month')] . " " . $date->get('year');
    }
}
