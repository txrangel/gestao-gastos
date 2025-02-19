@extends('layouts.app')

@section('title', 'Editar Periodo')

@section('content')
<div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
    <header class="py-2">
        <h2 class="text-lg font-medium text-black dark:text-neutral-100">
            {{ __('Editar Periodo') }}
        </h2>
    </header>
    <form class="space-y-2"  action="{{ route('periods.update', $period->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" :value="old('name', $period->name)" autocomplete="name" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="number_months" :value="__('Qtd de Meses')" />
            <x-text-input oninput="this.value = this.value.replace(/[^0-9.,]/g, '');" id="number_months" name="number_months" :value="old('number_months', $period->number_months)" autocomplete="number_months" required/>
            <x-input-error class="mt-2" :messages="$errors->get('number_months')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</div>
@endsection