<?php

use App\Dtos\SessionData;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;

if (!function_exists('storage_exists')) {
  function storage_exists($file, $disk = 'public'): bool
  {
    if ($file == '') {
      return false;
    }

    return Storage::disk($disk)->exists($file);
  }
}

if (!function_exists('storage_url')) {
  function storage_url($file, $disk = 'public'): string
  {
    return Storage::url($file);
  }
}

// custom helpers

if (!function_exists("isNullOrEmpty")) {
  function isNullOrEmpty($var)
  {
    return (empty($var) || !isset($var));
  }
}

if (!function_exists('NullOrProp')) {
  function NullOrProp($var)
  {
    return (!isNullOrEmpty($var)) ? "'" . $var . "'" : 'null';
  }
}
