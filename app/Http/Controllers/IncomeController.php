<?php

namespace App\Http\Controllers;

use App\Services\IncomeCategoryService;
use App\Services\IncomeService;
use App\Http\Requests\IncomeRequest;
use App\Services\PeriodService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IncomeController extends Controller
{
    protected $service;

    public function __construct(IncomeService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $incomes = $this->service->getPaginate();
        return view('incomes.index', compact('incomes'));
    }

    public function create(IncomeCategoryService $incomeCategoryService,PeriodService $periodService): View
    {
        $periods = $periodService->getAllPeriods();
        $incomeCategories = $incomeCategoryService->getAllIncomeCategories();
        return view('incomes.create', compact(['incomeCategories','periods']));
    }

    public function edit(int $id,IncomeCategoryService $incomeCategoryService,PeriodService $periodService): View
    {
        $periods = $periodService->getAllPeriods();
        $incomeCategories = $incomeCategoryService->getAllIncomeCategories();
        $income = $this->service->findById($id);
        return view('incomes.edit', compact(['income','incomeCategories','periods']));
    }

    public function store(IncomeRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->route('incomes.index')->with('success', 'Renda criada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(IncomeRequest $request, int $id): RedirectResponse
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('incomes.index')->with('success', 'Renda atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->service->delete($id);
            return redirect()->route('incomes.index')->with('success', 'Renda excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}