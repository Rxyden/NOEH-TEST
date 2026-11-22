<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Dashboard | NOEH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f5f8f6] font-sans text-slate-800 antialiased">

<div class="min-h-screen lg:flex">

    <!-- Mobile Header -->
    <header class="sticky top-0 z-30 flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4 lg:hidden">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-900 text-lg font-black text-white">N</div>
            <div>
                <p class="font-bold text-emerald-950">NOEH</p>
                <p class="text-[10px] text-slate-500">Education Hub</p>
            </div>
        </a>

        <button id="mobileMenuButton" type="button" aria-label="Open navigation menu"
            aria-controls="sidebar" aria-expanded="false"
            class="rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0">

        <!-- Brand -->
        <div class="flex items-center gap-3 border-b border-slate-100 px-7 py-6">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-900 text-2xl font-black text-white shadow-lg shadow-emerald-900/15">
                N
            </div>
            <div>
                <h1 class="text-xl font-extrabold tracking-tight text-emerald-950">NOEH</h1>
                <p class="text-[11px] font-medium text-slate-500">Negros Occidental Education Hub</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-7 overflow-y-auto px-5 py-7">

            <div>
                <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">
                    Main Menu
                </p>

                <div class="space-y-1">
                    <a href="{{ route('user.dashboard') }}"
                       class="flex items-center gap-3 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-900">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10.5L12 3l9 7.5V21H3V10.5z"/>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ url('/institutions') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5h6v5M9 9h.01M15 9h.01M9 12h.01M15 12h.01"/>
                        </svg>
                        Institutions
                    </a>

                    <a href="{{ url('/programs') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5.5A2.5 2.5 0 016.5 3H20v16H6.5A2.5 2.5 0 014 16.5v-11zM4 16.5A2.5 2.5 0 016.5 14H20"/>
                        </svg>
                        Academic Programs
                    </a>

                    <a href="{{ url('/admissions') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8M8 11h8M8 15h5M5 3h14v18H5z"/>
                        </svg>
                        Admissions
                    </a>

                    <a href="{{ url('/scholarships') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l2.5 5.5L20 11l-5.5 2.5L12 19l-2.5-5.5L4 11l5.5-2.5L12 3z"/>
                        </svg>
                        Scholarships
                    </a>
                </div>
            </div>

            <div>
                <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">
                    My Activities
                </p>

                <div class="space-y-1">
                    <a href="{{ url('/favorites') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.8 8.7c0 5.5-8.8 11-8.8 11s-8.8-5.5-8.8-11A4.7 4.7 0 0112 6.2a4.7 4.7 0 018.8 2.5z"/>
                        </svg>
                        My Favorites
                    </a>

                    <a href="{{ url('/comparisons') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5h6v14H4zM14 5h6v14h-6zM10 9h4M10 15h4"/>
                        </svg>
                        Comparisons
                    </a>

                    <a href="{{ url('/notifications') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-50 hover:text-emerald-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9a6 6 0 00-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/>
                        </svg>
                        Notifications
                    </a>
                </div>
            </div>

        </nav>

        <!-- User Profile / Logout -->
        <div class="border-t border-slate-100 p-5">
            <div class="mb-4 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-900">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="truncate text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500">Registered User</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-slate-500 transition hover:bg-red-50 hover:text-red-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 17l5-5-5-5M15 12H3m9-9h7a2 2 0 012 2v14a2 2 0 01-2 2h-7"/>
                    </svg>
                    Sign out
                </button>
            </form>
        </div>

    </aside>

    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 z-30 hidden bg-slate-950/40 lg:hidden"></div>

    <!-- Main Content -->
    <main class="min-w-0 flex-1">

        <!-- Top Navigation -->
        <header class="hidden h-[82px] items-center justify-between border-b border-slate-200 bg-white px-8 lg:flex xl:px-12">
            <div>
                <p class="text-sm font-semibold text-slate-800">User Dashboard</p>
                <p class="text-xs text-slate-400">Your education journey starts here.</p>
            </div>

            <div class="flex items-center gap-5">
                <a href="{{ url('/notifications') }}"
                   aria-label="Notifications"
                   class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-emerald-50 hover:text-emerald-800">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9a6 6 0 00-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/>
                    </svg>
                </a>

                <div class="h-8 w-px bg-slate-200"></div>

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-900">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400">Registered User</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="mx-auto max-w-[1500px] space-y-8 px-5 py-8 sm:px-8 lg:px-10 lg:py-10 xl:px-12">

            <!-- Welcome Banner -->
            <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#064e3b] via-[#087052] to-[#0f766e] p-7 text-white shadow-xl shadow-emerald-950/10 sm:p-10">

                <div class="absolute -right-16 -top-24 h-72 w-72 rounded-full bg-emerald-300/10"></div>
                <div class="absolute -bottom-32 right-40 h-72 w-72 rounded-full bg-lime-300/10"></div>

                <div class="relative z-10 max-w-2xl">
                    <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-emerald-100">
                        Negros Occidental Education Hub
                    </span>

                    <h2 class="mt-5 text-3xl font-extrabold tracking-tight sm:text-4xl">
                        Welcome back, {{ auth()->user()->name }}!
                    </h2>

                    <p class="mt-4 max-w-xl text-sm leading-7 text-emerald-50/80 sm:text-base">
                        Explore educational institutions, discover academic programs, and find opportunities that can help shape your future.
                    </p>

                    <a href="{{ url('/institutions') }}"
                       class="mt-7 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3.5 text-sm font-bold text-emerald-900 shadow-lg transition hover:-translate-y-0.5 hover:bg-emerald-50">
                        Explore institutions
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="pointer-events-none absolute bottom-0 right-8 hidden opacity-20 md:block">
                    <svg class="h-64 w-64" viewBox="0 0 200 200" fill="none">
                        <path d="M100 20L180 65V145L100 190L20 145V65L100 20Z" stroke="white" stroke-width="2"/>
                        <path d="M55 80H145V145H55V80Z" stroke="white" stroke-width="3"/>
                        <path d="M70 65L100 45L130 65M80 95H120M80 110H120M80 125H120" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
            </section>

            <!-- Section Heading -->
            <section>
                <div class="mb-5">
                    <h3 class="text-xl font-extrabold tracking-tight text-slate-900">Explore NOEH</h3>
                    <p class="mt-1 text-sm text-slate-500">Everything you need to plan your educational journey.</p>
                </div>

                <!-- Quick Access Cards -->
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    <a href="{{ url('/institutions') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-900/5">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-800 transition group-hover:bg-emerald-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5h6v5M9 9h.01M15 9h.01"/>
                            </svg>
                        </div>
                        <h4 class="mt-5 font-bold text-slate-800">Institutions</h4>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Discover colleges and universities in Negros Occidental.</p>
                        <span class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-emerald-800">
                            Explore <span aria-hidden="true">→</span>
                        </span>
                    </a>

                    <a href="{{ url('/programs') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg hover:shadow-blue-900/5">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-800 transition group-hover:bg-blue-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5.5A2.5 2.5 0 016.5 3H20v16H6.5A2.5 2.5 0 014 16.5v-11zM4 16.5A2.5 2.5 0 016.5 14H20"/>
                            </svg>
                        </div>
                        <h4 class="mt-5 font-bold text-slate-800">Academic Programs</h4>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Find courses and degrees that match your interests.</p>
                        <span class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-blue-800">
                            Browse programs <span aria-hidden="true">→</span>
                        </span>
                    </a>

                    <a href="{{ url('/admissions') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-200 hover:-translate-y-1 hover:border-violet-200 hover:shadow-lg hover:shadow-violet-900/5">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-50 text-violet-800 transition group-hover:bg-violet-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8M8 11h8M8 15h5M5 3h14v18H5z"/>
                            </svg>
                        </div>
                        <h4 class="mt-5 font-bold text-slate-800">Admissions</h4>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Review admission requirements and application details.</p>
                        <span class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-violet-800">
                            View admissions <span aria-hidden="true">→</span>
                        </span>
                    </a>

                    <a href="{{ url('/scholarships') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-5 transition duration-200 hover:-translate-y-1 hover:border-amber-200 hover:shadow-lg hover:shadow-amber-900/5">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-800 transition group-hover:bg-amber-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l2.5 5.5L20 11l-5.5 2.5L12 19l-2.5-5.5L4 11l5.5-2.5L12 3z"/>
                            </svg>
                        </div>
                        <h4 class="mt-5 font-bold text-slate-800">Scholarships</h4>
                        <p class="mt-2 text-sm leading-6 text-slate-500">Explore financial assistance and scholarship opportunities.</p>
                        <span class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-amber-800">
                            Find scholarships <span aria-hidden="true">→</span>
                        </span>
                    </a>

                </div>
            </section>

            <!-- Bottom Sections -->
            <section class="grid gap-6 xl:grid-cols-3">

                <!-- Getting Started -->
                <div class="rounded-2xl border border-slate-200 bg-white p-6 xl:col-span-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-extrabold text-slate-900">Start your journey</h3>
                            <p class="mt-1 text-sm text-slate-500">A few steps to make the most of NOEH.</p>
                        </div>
                        <span class="rounded-lg bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-800">
                            Getting started
                        </span>
                    </div>

                    <div class="mt-6 grid gap-5 sm:grid-cols-3">

                        <div>
                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-800">01</div>
                            <h4 class="text-sm font-bold text-slate-800">Discover schools</h4>
                            <p class="mt-2 text-xs leading-5 text-slate-500">Explore available institutions across the province.</p>
                        </div>

                        <div>
                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 font-bold text-blue-800">02</div>
                            <h4 class="text-sm font-bold text-slate-800">Compare programs</h4>
                            <p class="mt-2 text-xs leading-5 text-slate-500">Review academic programs and your choices.</p>
                        </div>

                        <div>
                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 font-bold text-amber-800">03</div>
                            <h4 class="text-sm font-bold text-slate-800">Find opportunities</h4>
                            <p class="mt-2 text-xs leading-5 text-slate-500">Check admission information and scholarships.</p>
                        </div>

                    </div>
                </div>

                <!-- NOEH Information -->
                <div class="rounded-2xl border border-emerald-100 bg-emerald-50/70 p-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-emerald-800 shadow-sm">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 16v-4m0-4h.01M22 12a10 10 0 11-20 0 10 10 0 0120 0z"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 font-extrabold text-emerald-950">About NOEH</h3>
                    <p class="mt-2 text-sm leading-6 text-emerald-900/70">
                        NOEH brings educational information together in one platform to help students discover schools, programs, admissions, and scholarships.
                    </p>

                    <a href="{{ url('/') }}"
                       class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-emerald-900 hover:text-emerald-700">
                        Learn more <span aria-hidden="true">→</span>
                    </a>
                </div>

            </section>

            <!-- Footer -->
            <footer class="border-t border-slate-200 pt-6 text-center sm:flex sm:items-center sm:justify-between sm:text-left">
                <p class="text-xs text-slate-400">
                    &copy; {{ date('Y') }} NOEH. All rights reserved.
                </p>
                <p class="mt-2 text-xs font-medium text-slate-400 sm:mt-0">
                    One Platform. Every Opportunity. Your Future Starts Here.
                </p>
            </footer>

        </div>
    </main>
</div>

<!-- Mobile Sidebar Script -->
<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const menuButton = document.getElementById('mobileMenuButton');

    if (!sidebar || !overlay || !menuButton) {
        throw new Error('Dashboard navigation elements are missing.');
    }

    function openMenu() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        menuButton.setAttribute('aria-expanded', 'true');
    }

    function closeMenu() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        menuButton.setAttribute('aria-expanded', 'false');
    }

    menuButton.addEventListener('click', openMenu);
    overlay.addEventListener('click', closeMenu);

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });
</script>

</body>
</html>
