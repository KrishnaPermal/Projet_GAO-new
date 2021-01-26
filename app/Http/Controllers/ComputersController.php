<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttributionsResource;
use App\Http\Resources\ComputersResource;
use App\Models\AttributionsModel;
use App\Models\ComputersModel;
use App\Models\CustomersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComputersController extends Controller
{
    /*permet de récupérer tout les ordinateurs*/
    public function getComputers(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'dated' => 'required',
            ],
            [
                'required' => 'Le champs est requis',
            ]

        )->validate();

        $computersAttributions = ComputersModel::with(['attributions' => function ($query) use ($validator) {
            $query->where('dated', '=', $validator['dated'])->with(['customer']);
        }])->paginate(3);

        return ComputersResource::collection($computersAttributions);
    }
    /*permet de récupérer tout les ordinateurs*/



    /*permet d'ajouter les ordinateurs*/
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

    public function addAttribution(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_customers' => 'required',
                'id_computers' => 'required',
                'timetable' => 'required',
                'dated' => 'required',
            ],
            [
                'required' => 'Le champs est requis',
            ]
        )->validate();

        $customer = CustomersModel::where('id', '=', $validator['id_customers'])->first();
        $computer = ComputersModel::where('id', '=', $validator['id_computers'])->first();

        $attribution = new AttributionsModel;
        $attribution->timetable = $validator['timetable'];
        $attribution->dated = $validator['dated'];
        $attribution->customer()->associate($customer);
        $attribution->computer()->associate($computer);
        $attribution->save();

        return new AttributionsResource($attribution);
    }
}
