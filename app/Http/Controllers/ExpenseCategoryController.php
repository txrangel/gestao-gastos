<?php

namespace App\Http\Controllers;

use App\Services\ExpenseCategoryService;
use App\Http\Requests\ExpenseCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExpenseCategoryController extends Controller
{
    protected $service;

    public function __construct(ExpenseCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $expenseCategories = $this->service->getPaginate();
        return view('expense_categories.index', compact('expenseCategories'));
    }

    public function create(): View
    {
        return view('expense_categories.create');
    }

    public function edit(int $id): View
    {
        $expenseCategory = $this->service->findById($id);
        return view('expense_categories.edit', compact('expenseCategory'));
    }

    public function store(ExpenseCategoryRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->route('expense_categories.index')->with('success', 'Categoria de despesa criada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(ExpenseCategoryRequest $request, int $id): RedirectResponse
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('expense_categories.index')->with('success', 'Categoria de despesa atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->service->delete($id);
            return redirect()->route('expense_categories.index')->with('success', 'Categoria de despesa excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}