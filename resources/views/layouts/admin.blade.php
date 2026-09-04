<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Panel') — Webzone Expertz Notepad</title>

    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <style>
        body, html{
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
    </style> --}}
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen">

    <!-- Header -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">

        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-16 flex items-center justify-between">

                <!-- Logo / Brand -->
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3">

                    <div class="w-9 h-9 rounded-lg bg-blue-600
                                flex items-center justify-center
                                text-white font-bold text-sm">
                        WE
                    </div>

                    <div class="leading-tight">
                        <div class="font-bold text-slate-900">
                            Webzone Expertz
                        </div>

                        <div class="text-xs text-slate-500">
                            Notepad
                        </div>
                    </div>

                </a>


                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-1">

                    <a href="{{ route('admin.dashboard') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium
                       {{ request()->routeIs('admin.dashboard')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium
                       {{ request()->routeIs('admin.users.*')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Users
                    </a>

                    <a href="{{ route('admin.notepads.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium
                       {{ request()->routeIs('admin.notepads.index')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Notepads
                    </a>

                    <a href="{{ route('admin.notepads.create') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium
                       {{ request()->routeIs('admin.notepads.create')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Create Notepad
                    </a>

                    <a href="{{ route('admin.deleted-data') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium
                       {{ request()->routeIs('admin.deleted-data')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        Deleted Data
                    </a>

                </nav>


                <!-- Admin Profile -->
                <div class="flex items-center gap-3">

                    <div class="hidden sm:block text-right">

                        <div class="text-sm font-medium text-slate-800">
                            {{ Auth::guard('admin')->user()->name }}
                        </div>

                        <div class="text-xs text-slate-500">
                            Administrator
                        </div>

                    </div>


                    <!-- Avatar -->
                    {{-- <div class="w-9 h-9 rounded-full bg-slate-100
                                border border-slate-200
                                flex items-center justify-center
                                text-sm font-semibold text-slate-700">

                        {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}

                    </div> --}}


                    <!-- Logout -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                    
                        <button type="submit"
                                class="inline-flex items-center gap-2
                                       px-4 py-2
                                       bg-red-50
                                       hover:bg-red-500
                                       text-red-600
                                       hover:text-white
                                       border border-red-200
                                       hover:border-red-500
                                       text-sm font-medium
                                       rounded-lg
                                       transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
                            </svg>
                    
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </header>


    <!-- Mobile Navigation -->
    <div class="md:hidden bg-white border-b border-slate-200">

        <div class="max-w-[1600px] mx-auto px-4 py-2
                    flex gap-1 overflow-x-auto">

            <a href="{{ route('admin.dashboard') }}"
               class="px-3 py-2 rounded-lg text-sm whitespace-nowrap
               {{ request()->routeIs('admin.dashboard')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                Dashboard

            </a>


            <a href="{{ route('admin.users.index') }}"
               class="px-3 py-2 rounded-lg text-sm whitespace-nowrap
               {{ request()->routeIs('admin.users.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                Users

            </a>


            <a href="{{ route('admin.notepads.index') }}"
               class="px-3 py-2 rounded-lg text-sm whitespace-nowrap
               {{ request()->routeIs('admin.notepads.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                Notepads

            </a>


            <a href="{{ route('admin.notepads.create') }}"
               class="px-3 py-2 rounded-lg text-sm whitespace-nowrap
               {{ request()->routeIs('admin.notepads.create')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                Create Notepad

            </a>

        </div>

    </div>


    <!-- Page Header -->
    <div class="bg-white border-b border-slate-200">

        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-5">

            <h1 class="text-xl font-semibold text-slate-900">

                @yield('heading', 'Dashboard')

            </h1>

        </div>

    </div>


    <!-- Main Content -->
    <main class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- Success Message -->
        @if (session('success'))

            <div class="mb-5 rounded-lg
                        bg-emerald-50
                        border border-emerald-200
                        text-emerald-800
                        px-4 py-3 text-sm">

                {{ session('success') }}

            </div>

        @endif


        <!-- Error Messages -->
        @if ($errors->any())

            <div class="mb-5 rounded-lg
                        bg-red-50
                        border border-red-200
                        text-red-800
                        px-4 py-3 text-sm">

                <ul class="list-disc list-inside space-y-1">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- Page Content -->
        @yield('content')

    </main>


    <!-- Footer -->
    {{-- <footer class="border-t border-slate-200 bg-white mt-10">

        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8
                    py-4 text-center text-xs text-slate-500">

            © {{ date('Y') }} Webzone Expertz.
            All rights reserved.

        </div>

    </footer> --}}

</body>

</html>