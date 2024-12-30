<?php

namespace App\Http\Controllers\Plans;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Listar os planos existentes.
     */
    public function index()
    {
        $plans = Plan::where('user_id', auth()->id())->get();
        return view('dashboard', compact('plans'));
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
        $additionalServices = Plan::additionalServices();
        $extras = Plan::extras();

        return view('plans.create', compact('additionalServices', 'extras'));
    }


    /**
     * Mostrar o formulário para editar um plano.
     */
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $additionalServices = Plan::additionalServices();
        $extras = Plan::extras();

        return view('plans.edit', compact('plan', 'additionalServices', 'extras'));
    }

    /**
     * Guardar o plano submetido.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'estimated_value' => 'required|numeric|min:0',
            'ceremony_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'religion' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'extras' => 'nullable|array',
            'contacts' => 'nullable|array',
            'final_observations' => 'nullable|string',
        ]);

        $plan = Plan::findOrFail($id);
        $plan->update([
            'name' => $validatedData['name'],
            'birth_date' => $validatedData['birth_date'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'estimated_value' => $validatedData['estimated_value'],
            'ceremony_type' => $validatedData['ceremony_type'],
            'location' => $validatedData['location'],
            'religion' => $validatedData['religion'],
            'services' => json_encode($request->input('services', [])),
            'extras' => json_encode($request->input('extras', [])),
            'contacts' => json_encode($request->input('contacts', [])),
            'final_observations' => $validatedData['final_observations'],
        ]);

        return redirect()->route('plans.index')->with('success', 'Plano atualizado com sucesso!');
    }

    /**
     * Guardar o plano submetido.
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'estimated_value' => 'required|numeric|min:0',
            'ceremony_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'religion' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'extras' => 'nullable|array',
            'contacts' => 'nullable|array',
            'final_observations' => 'nullable|string',
        ]);

        Plan::create([
            'user_id' => auth()->id(),
            'name' => $validatedData['name'],
            'birth_date' => $validatedData['birth_date'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'estimated_value' => $validatedData['estimated_value'],
            'ceremony_type' => $validatedData['ceremony_type'],
            'location' => $validatedData['location'],
            'religion' => $validatedData['religion'],
            'services' => json_encode($request->input('services', [])),
            'extras' => json_encode($request->input('extras', [])),
            'contacts' => json_encode($request->input('contacts', [])),
            'final_observations' => $validatedData['final_observations'],
            'status' => Plan::EM_REVISAO,
            'is_paid' => false,
            'final_value' => null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Plano criado com sucesso!');
    }

    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return view('plans.show', compact('plan'));
    }
}
