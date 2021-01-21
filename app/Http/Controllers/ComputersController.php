<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComputersResource;
use App\Models\ComputersModel;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
        /*permet de récupérer tout les ordinateurs*/

        public function getComputers (Request $request)
        {
            $computer = ComputersModel::all();
               
            return ComputersResource::collection($computer);
    
        }
        
        /*permet de récupérer tout les ordinateurs*/
}
