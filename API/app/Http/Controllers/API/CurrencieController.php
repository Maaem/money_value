<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currencie;

class CurrencieController extends Controller
{
    public function store(Request $request)
    {
        // use App\Models\Currencie;

        $data = $request->validate([
            'code' => 'required|string|max:3',
            'nom' => 'required|string|max:255',
        ]);

        $currencies = Currencie::create($data);

        return response()->json($currencies, 201);
    }
}