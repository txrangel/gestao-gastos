@extends('layouts.app')

@section('title', 'Potes')

@section('content')
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <header class="py-2">
            <h2 class="text-lg font-medium text-black dark:text-neutral-100">
                {{ __('Potes') }}
            </h2>
            <p class="text-md font-medium text-black dark:text-neutral-100">
                {{ __('Soma dos Percentuais') }}:
                <span class="{{ $pots->sum('limit_percentage')> 100 ? 'text-red-600' : 'text-green-600' }} font-bold">
                    {{ $pots->sum('limit_percentage') }}%
                </span>
            </p>
            <a href="{{ route('pots.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 mt-2">Novo
                Pote</a>
        </header>
        <section class="relative overflow-auto">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500 dark:text-neutral-400">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Nome</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Limite (%)</th>
                        <th scope="col" class="px-6 py-3 tracking-wider">Valor</th>
                        <th scope="col" class="px-6 py-3 tracking-wider flex justify-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pots as $pot)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'dark:bg-neutral-200 dark:bg-neutral-700' : 'bg-neutral-200 dark:bg-black' }} border-b dark:border-neutral-600">
                            <td class="px-6 py-4">{{ $pot->id }}</td>
                            <td class="px-6 py-4">{{ $pot->name }}</td>
                            <td class="px-6 py-4">{{ $pot->limit_percentage }}%</td>
                            <td class="px-6 py-4 font-bold text-white">R$ {{ number_format($totalIncome * ($pot->limit_percentage / 100), 2, ',', '.') }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-4">
                                <a href="{{ route('pots.edit', $pot->id) }}"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">{{ __('Editar') }}</a>
                                <form action="{{ route('pots.destroy', $pot->id) }}" method="POST" class="inline">
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
            {{ $pots->links() }}
        </div>
    </div>
@endsection
