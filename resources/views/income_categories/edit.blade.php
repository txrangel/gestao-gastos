@extends('layouts.app')

@section('title', 'Editar Categoria de Renda')

@section('content')
<div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
    <header class="py-2">
        <h2 class="text-lg font-medium text-black dark:text-neutral-100">
            {{ __('Editar Categoria de Renda') }}
        </h2>
    </header>
    <form class="space-y-2"  action="{{ route('income_categories.update', $incomeCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" :value="old('name', $incomeCategory->name)" autocomplete="name" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</div>
@endsection