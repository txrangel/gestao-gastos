@extends('layouts.app')

@section('title', 'Criar Despesa')

@section('content')
<div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
    <header class="py-2">
        <h2 class="text-lg font-medium text-black dark:text-neutral-100">
            {{ __('Criar Despesa') }}
        </h2>
    </header>
    <form class="space-y-2"  action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" autocomplete="name" :value="old('name')" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="amount" :value="__('Valor')" />
            <x-text-input oninput="this.value = this.value.replace(/[^0-9.,]/g, '');" id="amount" name="amount" autocomplete="amount" :value="old('amount')" required/>
            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
        </div>
        <div>
            <x-input-label for="recurring" :value="__('Fixa?')" />
            <select id="recurring" name="recurring" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('recurring')" required>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('recurring')" />
        </div>
        <div>
            <x-input-label for="category_id" :value="__('Categoria')" />
            <select id="category_id" name="category_id" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('category_id')" required>
                @foreach ($expenseCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>
        <div>
            <x-input-label for="pot_id" :value="__('Pote')" />
            <select id="pot_id" name="pot_id" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('pot_id')" required>
                @foreach ($pots as $pot)
                <option value="{{ $pot->id }}">{{ $pot->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('pot_id')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</div>
@endsection