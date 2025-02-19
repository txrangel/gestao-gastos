@extends('layouts.app')

@section('title', 'Categorias de Despesa')

@section('content')
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <header class="py-2">
            <h2 class="text-lg font-medium text-black dark:text-neutral-100">
                {{ __('Categorias de Despesa') }}
            </h2>
            <a href="{{ route('expense_categories.create') }}"
            class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 mt-2">Nova Categoria</a>
        </header>
        <section class="relative overflow-auto">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500 dark:text-neutral-400">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Nome</th>
                        <th scope="col" class="px-6 py-3 tracking-wider flex justify-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenseCategories as $category)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'dark:bg-neutral-200 dark:bg-neutral-700' : 'bg-neutral-200 dark:bg-black' }} border-b dark:border-neutral-600">
                            <td class="px-6 py-4">{{ $category->id }}</td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-4">
                                <a href="{{ route('expense_categories.edit', $category->id) }}"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">{{ __('Editar') }}</a>
                                <form action="{{ route('expense_categories.destroy', $category->id) }}" method="POST"
                                    class="inline">
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
            {{ $expenseCategories->links() }}
        </div>
    </div>
@endsection
