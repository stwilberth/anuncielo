<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class CronCtrl extends Controller
{
    public function clearCache()
    {
        // Verificar si el usuario está autenticado y tiene el ID igual a 1
        if (Auth::check() && Auth::user()->id === 1) {
            // Limpiar la caché
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            return "Cache is cleared";
        } else {
            // Si el usuario no está autorizado, retornar un mensaje de error o redirigirlo a otra página
            abort(403, 'Unauthorized action.');
        }
    }
}
