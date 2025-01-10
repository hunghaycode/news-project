<?php
// format new tag

use App\Models\Language;
use App\Models\Setting;

function formatTags(array $tags): String
{
    return implode(',', $tags);
}

function setActive(array $route)
{
   if (is_array($route)) {
      foreach ($route as $r) {
         if (request()->routeIs($r)) {
            return 'active';
         }
      }
   }
}
function truncate(string $test, int $limit = 50): String
{
    return \Str::limit($test, $limit, '...');
}

// //get select language from section
// function getLanguage(): string
// {
//     if (session()->has('language')) {
//         return session('language');
//     } else {
//         try {
//             $language = Language::where('default', 1)->first();
//             setLanguage($language->lang);
//             return $language->lang;
//         } catch (\Throwable $th) {
//             setLanguage('en');
//             return $language->lang;
//         }
//     }
// }
// // set language code  in session
// function setLanguage(string $code): void
// {
//     session(['language' => $code]);
// }
// //
// function truncate(string $test, int $limit = 50): String
// {
//     return \Str::limit($test, $limit, '...');
// }

// function convertToKFormat(int $number): String
// {
//     if ($number < 1000) {
//         return $number;
//     } elseif ($number < 1000000) {
//         return round($number / 1000, 1) . 'K'; //3400/1000 =3,4k
//     } else {
//         return round($number / 1000000, 1) . 'M';
//     }
// }
// function setSidebarActive(array $routes): ?string
// {
//     foreach ($routes as $route) {
//         if (request()->routeIs($route)) {
//             return 'active';
//         }
//     }
//     return '';
// }
// function getSetting($key)
// {
//     $data = Setting::where('key', $key)->first();
//     return $data->value;
// }
// // check permission
// function canAccess(array $permissions){

//     $permission = auth()->guard('admin')->user()->hasAnyPermission($permissions);
//     $superAdmin = auth()->guard('admin')->user()->hasRole('Super Admin');
 
//     if($permission || $superAdmin){
//      return true;
//     }else {
//      return false;
//     }
 
//  }
// // get admin role

//  function getRole()  {
//     $role = auth()->guard('admin')->user()->getRoleNames();
//     return $role->first();
//  }
//  // check  user permission
//  function checkPermission(string $permission)  {
//     return auth()->guard('admin')->user()->hasPermissionTo($permission);
//  }