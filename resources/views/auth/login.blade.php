<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In | NOEH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f5f8f6] font-sans text-slate-800 antialiased">

    <main class="flex min-h-screen">

        <!-- Branding Panel -->
        <section class="relative hidden w-1/2 flex-col justify-between overflow-hidden bg-[#073b2b] p-12 text-white lg:flex xl:p-16">

            <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-lime-400/10 blur-3xl"></div>

            <div class="absolute right-0 top-0 h-full w-full opacity-[0.06]"
                 style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 28px 28px;">
            </div>

            <!-- Logo -->
            <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-2xl font-black text-emerald-950 shadow-lg">
                    N
                </div>

                <div>
                    <h1 class="text-xl font-bold tracking-wide">NOEH</h1>
                    <p class="text-xs text-emerald-200">Negros Occidental Education Hub</p>
                </div>
            </a>

            <!-- Main content -->
            <div class="relative z-10 my-12 max-w-xl">

                <span class="inline-flex items-center gap-2 rounded-full border border-emerald-300/20 bg-white/10 px-4 py-2 text-xs font-semibold tracking-widest text-emerald-200">
                    <span class="h-2 w-2 rounded-full bg-lime-300"></span>
                    WELCOME BACK
                </span>

                <h2 class="mt-7 text-5xl font-bold leading-[1.15] tracking-tight xl:text-6xl">
                    Your future.
                    <span class="block text-emerald-300">Your next chapter.</span>
                </h2>

                <p class="mt-6 max-w-md text-base leading-8 text-emerald-100/75">
                    Continue your journey with NOEH. Discover educational opportunities and take the next step toward your goals.
                </p>

                <div class="mt-10 rounded-2xl border border-white/10 bg-white/[0.07] p-6 backdrop-blur-sm">
                    <p class="text-lg font-semibold leading-relaxed text-white">
                        "One Platform. Every Opportunity. Your Future Starts Here."
                    </p>
                    <p class="mt-3 text-sm text-emerald-200/60">
                        Negros Occidental Education Hub
                    </p>
                </div>

            </div>

            <div class="relative z-10 border-t border-white/10 pt-6">
                <p class="text-xs text-emerald-100/40">
                    &copy; {{ date('Y') }} Negros Occidental Education Hub
                </p>
            </div>

        </section>

        <!-- Login Form -->
        <section class="flex w-full items-center justify-center px-5 py-10 sm:px-10 lg:w-1/2 lg:px-12 xl:px-20">

            <div class="w-full max-w-md">

                <!-- Mobile logo -->
                <a href="{{ url('/') }}" class="mb-12 flex items-center gap-3 lg:hidden">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-900 text-xl font-black text-white">
                        N
                    </div>
                    <div>
                        <h1 class="font-bold text-emerald-950">NOEH</h1>
                        <p class="text-xs text-slate-500">Negros Occidental Education Hub</p>
                    </div>
                </a>

                <div class="mb-9">
                    <p class="mb-3 text-xs font-bold uppercase tracking-[0.2em] text-emerald-700">
                        Welcome to NOEH
                    </p>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                        Sign in to your account
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-500">
                        Enter your credentials to access your NOEH account.
                    </p>
                </div>

                <!-- Session status -->
                @if (session('status'))
                    <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation errors -->
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-semibold">Unable to sign in.</p>
                        <ul class="mt-2 list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <label for="password" class="block text-sm font-semibold text-slate-700">
                                Password
                            </label>

                            <a href="{{ route('password.request') }}"
                               class="text-xs font-semibold text-emerald-800 transition hover:text-emerald-600">
                                Forgot password?
                            </a>
                        </div>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center">
                        <label for="remember" class="flex cursor-pointer items-center gap-3 text-sm text-slate-600">
                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                value="1"
                                class="h-4 w-4 rounded border-slate-300 text-emerald-700 focus:ring-emerald-600"
                            >
                            Remember me
                        </label>
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="group flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-800 px-5 py-4 text-sm font-bold text-white shadow-lg shadow-emerald-900/10 transition duration-200 hover:-translate-y-0.5 hover:bg-emerald-900 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-emerald-600/20"
                    >
                        Sign in
                        <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                        </svg>
                    </button>

                </form>

                <div class="my-8 flex items-center gap-4">
                    <div class="h-px flex-1 bg-slate-200"></div>
                    <span class="text-xs font-medium text-slate-400">NEW TO NOEH?</span>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>

                <a href="{{ route('register') }}"
                   class="flex w-full items-center justify-center rounded-xl border border-emerald-800 bg-white px-5 py-3.5 text-sm font-bold text-emerald-900 transition hover:bg-emerald-50">
                    Create an account
                </a>

                <div class="mt-8 text-center">
                    <a href="{{ url('/') }}" class="text-sm font-medium text-slate-500 transition hover:text-emerald-800">
                        &larr; Back to homepage
                    </a>
                </div>

            </div>
        </section>

    </main>

</body>
</html>
