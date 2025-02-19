<?php

namespace App\Http\Controllers;

use App\Services\IncomeCategoryService;
use App\Http\Requests\IncomeCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IncomeCategoryController extends Controller
{
    protected $service;

    public function __construct(IncomeCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $incomeCategories = $this->service->getPaginate();
        return view('income_categories.index', compact('incomeCategories'));
    }

    public function create(): View
    {
        return view('income_categories.create');
    }

    public function edit(int $id): View
    {
        $incomeCategory = $this->service->findById($id);
        return view('income_categories.edit', compact('incomeCategory'));
    }

    public function store(IncomeCategoryRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->route('income_categories.index')->with('success', 'Categoria de renda criada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(IncomeCategoryRequest $request, int $id): RedirectResponse
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('income_categories.index')->with('success', 'Categoria de renda atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->service->delete($id);
            return redirect()->route('income_categories.index')->with('success', 'Categoria de renda excluída com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
