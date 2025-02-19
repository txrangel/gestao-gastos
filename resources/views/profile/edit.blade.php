<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-neutral-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-neutral-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-neutral-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="space-y-2">
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>
    <div class="p-4 dark:bg-neutral-200 dark:bg-neutral-800 shadow sm:rounded-lg space-y-4">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection