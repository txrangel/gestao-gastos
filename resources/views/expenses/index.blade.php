@extends('layouts.app')

@section('title', 'Despesas')

@section('content')
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <header class="py-2">
            <h2 class="text-lg font-medium text-black dark:text-neutral-100">
                {{ __('Despesas') }}
            </h2>
            <a href="{{ route('expenses.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 mt-2">Nova
                Despesa</a>
            <a href="{{ route('expenses.matrix') }}" class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 mt-2">Matrix</a>
        </header>
        <section class="relative overflow-auto">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500 dark:text-neutral-400">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Nome</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Valor</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Fixa</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Categoria</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Pote</th>
                        <th scope="col" class="px-6 py-3 tracking-wider flex justify-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'dark:bg-neutral-200 dark:bg-neutral-700' : 'bg-neutral-200 dark:bg-black' }} border-b dark:border-neutral-600">
                            <td class="px-6 py-4">{{ $expense->id }}</td>
                            <td class="px-6 py-4">{{ $expense->name }}</td>
                            <td class="px-6 py-4">R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $expense->recurring ? 'Sim' : 'Não' }}</td>
                            <td class="px-6 py-4">{{ $expense->category->name }}</td>
                            <td class="px-6 py-4">{{ $expense->pot->name }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-4">
                                <a href="{{ route('expenses.edit', $expense->id) }}"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">{{ __('Editar') }}</a>
                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="inline">
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
            {{ $expenses->links() }}
        </div>
    </div>
@endsection
