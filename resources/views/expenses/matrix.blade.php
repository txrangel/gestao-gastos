@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Matriz de Gastos</h1>
    <table class="table">
        <thead class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
            <tr>
                <th>Pote</th>
                <th>Categoria</th>
                <th>Gasto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
            <tr>
                <td>{{ $expense->pot->name }}</td>
                <td>{{ $expense->category->name }}</td>
                <td>{{ $expense->name }} - R$ {{ number_format($expense->amount, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $expenses->links() }}
    </div>
</div>
@endsection