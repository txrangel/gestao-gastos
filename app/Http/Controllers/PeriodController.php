<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Services\PeriodService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PeriodController extends Controller
{
    protected $service;

    public function __construct(PeriodService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $periods = $this->service->getPaginate();
        return view('periods.index', compact(['periods']));
    }

    public function create(): View
    {
        return view('periods.create');
    }

    public function edit(int $id): View
    {
        $period = $this->service->findById($id);
        return view('periods.edit', compact('period'));
    }

    public function store(PeriodRequest $request): RedirectResponse
    {
        try {
            $this->service->create($request->all());
            return redirect()->route('periods.index')->with('success', 'periode criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function update(PeriodRequest $request, int $id): RedirectResponse
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('periods.index')->with('success', 'periode atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->service->delete($id);
            return redirect()->route('periods.index')->with('success', 'periode excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
