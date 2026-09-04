<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'User Panel') — Webzone Expertz Notepad
    </title>

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

    <!-- ========================================================= -->
    <!-- HEADER -->
    <!-- ========================================================= -->

    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">

        <div class="w-full px-4 sm:px-6 lg:px-8">

            <div class="h-16 flex items-center justify-between gap-4">

                <!-- Logo / Brand -->
                <a href="{{ route('user.dashboard') }}"
                   class="flex items-center gap-3 shrink-0">

                    <!-- Logo -->
                    <div class="w-9 h-9 rounded-lg bg-blue-600
                                flex items-center justify-center
                                text-white font-bold text-sm">
                        WE
                    </div>

                    <!-- Brand -->
                    <div class="leading-tight">

                        <div class="font-bold text-slate-900">
                            Webzone Expertz
                        </div>

                        <div class="text-xs text-slate-500">
                            Notepad
                        </div>

                    </div>

                </a>


                <!-- ================================================= -->
                <!-- DESKTOP NAVIGATION -->
                <!-- ================================================= -->

                <nav class="hidden md:flex items-center gap-1">

                    <!-- Dashboard -->
                    <a href="{{ route('user.dashboard') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('user.dashboard')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        Dashboard

                    </a>


                    <!-- My Notepads -->
                    <a href="{{ route('user.notepads.index') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('user.notepads.index')
                            || request()->routeIs('user.notepads.show')
                            || request()->routeIs('user.notepads.edit')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        My Notepads

                    </a>


                    <!-- Create Notepad -->
                    <a href="{{ route('user.notepads.create') }}"
                       class="px-3 py-2 rounded-lg text-sm font-medium transition
                       {{ request()->routeIs('user.notepads.create')
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        Create Notepad

                    </a>

                </nav>


                <!-- ================================================= -->
                <!-- USER PROFILE -->
                <!-- ================================================= -->

                <div class="flex items-center gap-3 shrink-0">

                    <!-- User Name -->
                    <div class="hidden sm:block text-right">

                        <div class="text-sm font-medium text-slate-800">
                            {{ Auth::guard('web')->user()->name }}
                        </div>

                        <div class="text-xs text-slate-500">
                            User
                        </div>

                    </div>


                    <!-- Avatar -->
                    {{-- <div class="w-9 h-9 rounded-full
                                bg-slate-100
                                border border-slate-200
                                flex items-center justify-center
                                text-sm font-semibold
                                text-slate-700">

                        {{ strtoupper(substr(Auth::guard('web')->user()->name, 0, 1)) }}

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


    <!-- ========================================================= -->
    <!-- MOBILE NAVIGATION -->
    <!-- ========================================================= -->

    <div class="md:hidden bg-white border-b border-slate-200">

        <div class="w-full px-4 py-2
                    flex gap-1 overflow-x-auto">

            <!-- Dashboard -->
            <a href="{{ route('user.dashboard') }}"
               class="px-3 py-2 rounded-lg
                      text-sm whitespace-nowrap
               {{ request()->routeIs('user.dashboard')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                Dashboard

            </a>


            <!-- My Notepads -->
            <a href="{{ route('user.notepads.index') }}"
               class="px-3 py-2 rounded-lg
                      text-sm whitespace-nowrap
               {{ request()->routeIs('user.notepads.index')
                    || request()->routeIs('user.notepads.show')
                    || request()->routeIs('user.notepads.edit')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                My Notepads

            </a>


            <!-- Create Notepad -->
            <a href="{{ route('user.notepads.create') }}"
               class="px-3 py-2 rounded-lg
                      text-sm whitespace-nowrap
               {{ request()->routeIs('user.notepads.create')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-600 hover:bg-slate-100' }}">

                Create Notepad

            </a>

        </div>

    </div>


    <!-- ========================================================= -->
    <!-- PAGE HEADER -->
    <!-- ========================================================= -->

    <div class="w-full bg-white border-b border-slate-200">

        <div class="w-full px-4 sm:px-6 lg:px-8 py-5">

            <div>

                <h1 class="text-xl font-semibold text-slate-900">

                    @yield('heading', 'Dashboard')

                </h1>

                @hasSection('subheading')

                    <p class="mt-1 text-sm text-slate-500">

                        @yield('subheading')

                    </p>

                @endif

            </div>

        </div>

    </div>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="w-full px-4 sm:px-6 lg:px-8 py-6">

        <!-- Success Message -->
        @if (session('success'))

            <div class="mb-5 rounded-lg
                        bg-emerald-50
                        border border-emerald-200
                        text-emerald-800
                        px-4 py-3 text-sm">

                <div class="flex items-start gap-2">

                    <span class="font-semibold">
                        Success:
                    </span>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            </div>

        @endif


        <!-- Error Messages -->
        @if ($errors->any())

            <div class="mb-5 rounded-lg
                        bg-red-50
                        border border-red-200
                        text-red-800
                        px-4 py-3 text-sm">

                <div class="font-semibold mb-2">
                    Please fix the following errors:
                </div>

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


    <!-- ========================================================= -->
    <!-- FOOTER -->
    <!-- ========================================================= -->

    {{-- <footer class="border-t border-slate-200 bg-white mt-10">

        <div class="w-full px-4 sm:px-6 lg:px-8
                    py-4 text-center text-xs text-slate-500">

            © {{ date('Y') }} Webzone Expertz.
            All rights reserved.

        </div>

    </footer> --}}


</body>

</html>