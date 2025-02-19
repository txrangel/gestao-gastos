@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
    <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
    <div class="p-6 text-black dark:text-neutral-100">
        {{ __("You're logged in!") }}
    </div>
</div>
@endsection
