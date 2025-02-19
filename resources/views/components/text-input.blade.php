@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border dark:border-neutral-700 dark:bg-black dark:text-neutral-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600 focus:border-indigo-500  focus:ring-indigo-500 rounded-md shadow-sm']) }}>
