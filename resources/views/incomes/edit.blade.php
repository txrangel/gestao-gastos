@extends('layouts.app')

@section('title', 'Editar Renda')

@section('content')
<div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
    <header class="py-2">
        <h2 class="text-lg font-medium text-black dark:text-neutral-100">
            {{ __('Editar Renda') }}
        </h2>
    </header>
    <form class="space-y-2"  action="{{ route('incomes.update', $income->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" :value="old('name', $income->name)" autocomplete="name" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="amount" :value="__('Valor')" />
            <x-text-input oninput="this.value = this.value.replace(/[^0-9.,]/g, '');" id="amount" name="amount" :value="old('amount', $income->amount)" autocomplete="amount" required/>
            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
        </div>
        <div>
            <x-input-label for="period_id" :value="__('Periodo')" />
            <select id="period_id" name="period_id" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($periods as $period)
                <option value="{{ $period->id }}" {{ $income->period_id == $period->id ? 'selected' : '' }}>{{ $period->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('period_id')" />
        </div>
        <div>
            <x-input-label for="recurring" :value="__('Fixa?')" />
            <select id="recurring" name="recurring" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="1" {{ $income->recurring ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !$income->recurring ? 'selected' : '' }}>Não</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('recurring')" />
        </div>
        <div>
            <x-input-label for="category_id" :value="__('Categoria')" />
            <select id="category_id" name="category_id" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($incomeCategories as $category)
                <option value="{{ $category->id }}" {{ $income->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</div>
@endsection