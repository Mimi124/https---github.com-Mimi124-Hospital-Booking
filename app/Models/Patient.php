<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model

{

    public function handle($request, $next){
        $patient = Auth::patient();
        if (Auth::check()) {
            if ($patient->patient->name == 'Patient' || $patient->isAdmin()) {
                return $next($request);
            }
        }
        redirect('/');
    }

    use HasFactory;
}
