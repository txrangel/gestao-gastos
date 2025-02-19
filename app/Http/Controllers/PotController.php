<?php

namespace App\Http\Controllers;

use App\Services\IncomeService;
use App\Services\PotService;
use App\Http\Requests\PotRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PotController extends Controller
{
    protected $service;

    public function __construct(PotService $service)
    {
        $this->service = $service;
    }

    public function index(IncomeService $incomeService): View
    {
        $incomes = $incomeService->getAllIncomes();
        $totalIncome = $incomes->sum('amount');
        $pots = $this->service->getPaginate();
        return view('pots.index', compact(['pots','totalIncome']));
    }

    public function create(): View
    {
        return view('pots.create');
    }

    public function edit(int $id): View
    {
        $pot = $this->service->findById($id);
        return view('pots.edit', compact('pot'));
    }

    public function store(PotRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->route('pots.index')->with('success', 'Pote criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(PotRequest $request, int $id): RedirectResponse
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('pots.index')->with('success', 'Pote atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->service->delete($id);
            return redirect()->route('pots.index')->with('success', 'Pote excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}