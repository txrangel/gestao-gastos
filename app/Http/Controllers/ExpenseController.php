<?php

namespace App\Http\Controllers;

use App\Services\ExpenseCategoryService;
use App\Services\ExpenseService;
use App\Http\Requests\ExpenseRequest;
use App\Services\PotService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    protected $service;

    public function __construct(ExpenseService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $expenses = $this->service->getPaginate();
        return view('expenses.index', compact('expenses'));
    }
    public function show(): View
    {
        $expenses = $this->service->getPaginate();
        return view('expenses.matrix', compact('expenses'));
    }

    public function create(ExpenseCategoryService $expenseCategoryService,PotService $potService): View
    {
        $pots = $potService->getAllPots();
        $expenseCategories = $expenseCategoryService->getAllExpenseCategories();
        return view('expenses.create', compact(['expenseCategories','pots']));
    }

    public function edit(int $id,ExpenseCategoryService $expenseCategoryService,PotService $potService): View
    {
        $pots = $potService->getAllPots();
        $expenseCategories = $expenseCategoryService->getAllExpenseCategories();
        $expense = $this->service->findById($id);
        return view('expenses.edit', compact(['expense','expenseCategories','pots']));
    }

    public function store(ExpenseRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->route('expenses.index')->with('success', 'Despesa criada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(ExpenseRequest $request, int $id): RedirectResponse
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('expenses.index')->with('success', 'Despesa atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->service->delete($id);
            return redirect()->route('expenses.index')->with('success', 'Despesa excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}