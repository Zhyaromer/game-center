@auth
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="flex h-screen">

        <aside class="w-64 bg-white shadow-md fixed top-0 left-0 h-full z-40">
            <div class="p-6 font-bold text-lg text-red-600 border-b">Admin Panel</div>

            <nav class="mt-4 px-2 space-y-1">
                <div x-data="{ open: false }" class="space-y-1" x-init="$watch('open', val => val ? $refs.menu.classList.remove('hidden') : $refs.menu.classList.add('hidden'))">
                    <button @click="open = !open" class="flex justify-between items-center w-full px-3 py-2 text-left hover:bg-red-100 rounded">
                        <span class="font-semibold text-gray-700">Users</span>
                        <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-ref="menu" class="pl-4 space-y-1 hidden">
                        <a href="{{ route('admin.users.index') }}"
                            class="block px-2 py-1 text-sm rounded hover:bg-red-100 {{ request()->routeIs('admin.users.index') ? 'bg-red-100 font-medium text-red-600' : '' }}">
                            Show Users
                        </a>
                        <a href="{{ route('admin.users.create') }}"
                            class="block px-2 py-1 text-sm rounded hover:bg-red-100 {{ request()->routeIs('admin.users.create') ? 'bg-red-100 font-medium text-red-600' : '' }}">
                            Create User
                        </a>
                    </div>
                </div>

                <div x-data="{ open: false }" class="space-y-1" x-init="$watch('open', val => val ? $refs.menu.classList.remove('hidden') : $refs.menu.classList.add('hidden'))">
                    <button @click="open = !open" class="flex justify-between items-center w-full px-3 py-2 text-left hover:bg-red-100 rounded">
                        <span class="font-semibold text-gray-700">stations</span>
                        <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-ref="menu" class="pl-4 space-y-1 hidden">
                        <a href="{{ route('admin.stations.index') }}"
                            class="block px-2 py-1 text-sm rounded hover:bg-red-100 {{ request()->routeIs('admin.stations.index') ? 'bg-red-100 font-medium text-red-600' : '' }}">
                            Show stations
                        </a>
                        <a href="{{ route('admin.stations.create') }}"
                            class="block px-2 py-1 text-sm rounded hover:bg-red-100 {{ request()->routeIs('admin.stations.create') ? 'bg-red-100 font-medium text-red-600' : '' }}">
                            Create station
                        </a>
                    </div>
                </div>

                <a href="#"
                    class="block px-3 py-2 rounded hover:bg-red-100 font-semibold text-gray-700">
                   dashboard
                </a>
            </nav>
        </aside>

        <div class="flex-1 ml-64 flex flex-col min-h-screen">

            <header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
                <div class="text-xl font-semibold">admin/users</div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->email }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-6">
                @if (session()->has('message'))
                <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session()->get('message') }}
                </div>
                @endif

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-2 rounded mb-2">
                    {{ $error }}
                </div>
                @endforeach
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        const deleteItem = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    setTimeout(() => {
                        document.getElementById(id).submit();
                    }, 800);
                }
            });
        }
    </script>
</body>

</html>
@endauth
