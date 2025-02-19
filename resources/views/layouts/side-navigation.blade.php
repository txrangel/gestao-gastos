{{-- <!-- Botão para abrir/fechar o menu -->
<input type="checkbox" id="menu-toggle" class="hidden peer">

<label for="menu-toggle" class="fixed left-0 top-0 p-2 block md:hidden z-50 cursor-pointer">
    <div class="p-4 flex items-center justify-center transition-all duration-300 ease-in-out h-10 w-10 bg-neutral-800 text-white rounded-md">
        <i class="fa-solid fa-bars"></i>
    </div>
</label> --}}

<!-- Sidebar -->
<aside class="bg-black text-white h-full fixed left-0 top-0 overflow-y-auto transition-all duration-300 ease-in-out w-12 peer-checked:w-60 md:w-60">
    <div class="p-4 flex items-center justify-between">
        <h2 class="text-2xl font-bold hidden md:block">Menu</h2>
    </div>
    <nav class="">
        <ul>
            <!-- Link para a home -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('dashboard') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-house"></i>
                    <span class="hidden peer-checked:inline md:inline">Home</span>
                </a>
            </li>

            <!-- Link para Categorias de Renda -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('income_categories.index') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-tags"></i>
                    <span class="hidden peer-checked:inline md:inline">Categorias de Renda</span>
                </a>
            </li>

            <!-- Link para Rendas -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('periods.index') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="hidden peer-checked:inline md:inline">Periodos</span>
                </a>
            </li>

            <!-- Link para Rendas -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('incomes.index') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    <span class="hidden peer-checked:inline md:inline">Rendas</span>
                </a>
            </li>

            <!-- Link para Categorias de Despesa -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('expense_categories.index') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-tags"></i>
                    <span class="hidden peer-checked:inline md:inline">Categorias de Despesa</span>
                </a>
            </li>

            <!-- Link para Potes -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('pots.index') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-box-open"></i>
                    <span class="hidden peer-checked:inline md:inline">Potes</span>
                </a>
            </li>

            <!-- Link para Despesas -->
            <li class="p-2 hover:bg-neutral-800 flex items-center">
                <a href="{{ route('expenses.index') }}" class="block flex items-center space-x-2 w-full">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <span class="hidden peer-checked:inline md:inline">Despesas</span>
                </a>
            </li>

            <!-- Divisor -->
            <div class="border-t border-neutral-200 dark:border-neutral-600">
                <!-- Link para o perfil do usuário -->
                <li class="p-2 hover:bg-neutral-800 flex items-center">
                    <a href="{{ route('profile.edit') }}" class="block flex items-center space-x-2 w-full">
                        <i class="fa-solid fa-user"></i>
                        <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                    </a>
                </li>

                <!-- Link para logout -->
                <li class="p-2 hover:bg-neutral-800 flex items-center">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a href="{{ route('logout') }}" class="block flex items-center space-x-2 w-full" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="hidden md:inline">Sair</span>
                        </a>
                    </form>
                </li>
            </div>
        </ul>
    </nav>
</aside>