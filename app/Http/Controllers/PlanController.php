<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Listar os planos existentes.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    /**
     * Obter um plano por ID.
     */
    public function getById($id) {
        $plan = Plan::findOrFail($id);
        return view('plans.show', compact('plan'));
    }

    /**
     * Mostrar o formulário para criar um novo plano.
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Guardar o plano submetido.
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'ceremony_type' => 'required|string',
            'location' => 'required|string',
            'final_observations' => 'nullable|string',
        ]);

        Plan::create($validatedData);

        return redirect()->route('plans.index')->with('success', 'Plano criado com sucesso!');
    }
}
