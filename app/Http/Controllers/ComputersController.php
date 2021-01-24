<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttributionsResource;
use App\Http\Resources\ComputersResource;
use App\Models\AttributionsModel;
use App\Models\ComputersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComputersController extends Controller
{
        /*permet de récupérer tout les ordinateurs*/
        public function getComputers (Request $request)
        {
            $computer = ComputersModel::all();
               
            return ComputersResource::collection($computer);
    
        }
        /*permet de récupérer tout les ordinateurs*/

        public function addComputer(Request $request)
        {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                ],
                [
                    'required' => 'Le champs est requis',
                ]
            )->validate();

            $computer = ComputersModel::create($validator);
            
            return new ComputersResource($computer);
        }

        public function getAttributions($id)
        {
            $attributions = AttributionsModel::where('id_computers', '=', $id)->get();
            return AttributionsResource::collection($attributions);
        }
}
