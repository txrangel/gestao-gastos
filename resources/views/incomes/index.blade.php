@extends('layouts.app')

@section('title', 'Rendas')

@section('content')
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <header class="py-2">
            <h2 class="text-lg font-medium text-black dark:text-neutral-100">
                {{ __('Rendas') }}
            </h2>
            <a href="{{ route('incomes.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 mt-2">Nova
                Renda</a>
        </header>
        <section class="relative overflow-auto">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500 dark:text-neutral-400">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Nome</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Valor</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Período</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Fixa</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Categoria</th>
                        <th scope="col" class="px-6 py-3 tracking-wider flex justify-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incomes as $income)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'dark:bg-neutral-200 dark:bg-neutral-700' : 'bg-neutral-200 dark:bg-black' }} border-b dark:border-neutral-600">
                            <td class="px-6 py-4">{{ $income->id }}</td>
                            <td class="px-6 py-4">{{ $income->name }}</td>
                            <td class="px-6 py-4">R$ {{ number_format($income->amount, 2, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $income->period->number_months }}</td>
                            <td class="px-6 py-4">{{ $income->recurring ? 'Sim' : 'Não' }}</td>
                            <td class="px-6 py-4">{{ $income->category->name }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-4">
                                <a href="{{ route('incomes.edit', $income->id) }}"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">{{ __('Editar') }}</a>
                                <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 dark:text-red-500 hover:underline">{{ __('Excluir') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <div class="mt-4">
            {{ $incomes->links() }}
        </div>
    </div>
@endsection
