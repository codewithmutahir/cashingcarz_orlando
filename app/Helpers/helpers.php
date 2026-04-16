<?php

use App\Models\Category;

// Helper functions (add these to your helpers file or create them)
if (!function_exists('getCarName')) {
    function getCarName($referral)
    {
        if (isset($referral->car_name)) {
            return $referral->car_name;
        }
        
        if (isset($referral->car)) {
            return $referral->car->name ?? 'Unknown Car';
        }
        
        return 'Unknown Car';
    }
}

if (!function_exists('getStatusColor')) {
    function getStatusColor($status)
    {
        switch (strtolower($status)) {
            case 'approved':
            case 'completed':
                return 'success';
            case 'pending':
                return 'warning';
            case 'rejected':
            case 'cancelled':
                return 'danger';
            default:
                return 'secondary';
        }
    }
}