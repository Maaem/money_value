<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaireController extends Controller
{
    // Méthode pour afficher la liste des paires
    public function index()
    {
        $paires = Pair::all();
        return response()->json($paires, 200);
    }

    // Méthode pour afficher une paire spécifique par son ID
    public function show($id)
    {
        $paire = Pair::findOrFail($id);
        return response()->json($paire, 200);
    }

    // Méthode pour créer une nouvelle paire
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currencie_source_id' => 'required|exists:currencies,id',
            'currencie_cible_id' => 'required|exists:currencies,id',
            'taux_conversion' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $paire = Pair::create($request->all());
        return response()->json(['message' => 'Paire créée avec succès.', 'data' => $paire], 201);
    }

    // Méthode pour mettre à jour une paire existante
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'currencie_source_id' => 'exists:currencies,id',
            'currencie_cible_id' => 'exists:currencies,id',
            'taux_conversion' => 'numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $paire = Pair::findOrFail($id);
        $paire->update($request->all());

        return response()->json(['message' => 'Paire mise à jour avec succès.', 'data' => $paire], 200);
    }

    // Méthode pour supprimer une paire
    public function destroy($id)
    {
        $paire = Pair::findOrFail($id);
        $paire->delete();

        return response()->json(['message' => 'Paire supprimée avec succès.'], 200);
    }
}


