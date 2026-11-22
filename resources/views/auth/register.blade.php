<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Account | NOEH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f5f8f6] font-sans text-slate-800 antialiased">

    <main class="flex min-h-screen">

        <!-- Branding Panel -->
        <section class="relative hidden w-1/2 flex-col justify-between overflow-hidden bg-[#073b2b] p-12 text-white lg:flex xl:p-16">

            <!-- Decorative background -->
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

            <!-- Main branding content -->
            <div class="relative z-10 my-12 max-w-xl">

                <span class="inline-flex items-center gap-2 rounded-full border border-emerald-300/20 bg-white/10 px-4 py-2 text-xs font-semibold tracking-widest text-emerald-200">
                    <span class="h-2 w-2 rounded-full bg-lime-300"></span>
                    YOUR JOURNEY STARTS HERE
                </span>

                <h2 class="mt-7 text-5xl font-bold leading-[1.15] tracking-tight xl:text-6xl">
                    Discover more.
                    <span class="block text-emerald-300">Achieve more.</span>
                </h2>

                <p class="mt-6 max-w-md text-base leading-8 text-emerald-100/75">
                    Create your NOEH account and discover universities, academic programs, scholarships, and opportunities across Negros Occidental.
                </p>

                <div class="mt-10 space-y-5">

                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-emerald-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s8-4 8-11V5l-8-3-8 3v5c0 7 8 11 8 11z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Explore institutions</p>
                            <p class="text-sm text-emerald-100/60">Find schools that match your goals.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-emerald-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v12m-6-6h12M4 4h16v16H4z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Discover opportunities</p>
                            <p class="text-sm text-emerald-100/60">Explore programs and scholarships.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-emerald-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Plan your future</p>
                            <p class="text-sm text-emerald-100/60">Save and compare your choices.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="relative z-10 border-t border-white/10 pt-6">
                <p class="text-sm font-medium text-emerald-200">
                    One Platform. Every Opportunity. Your Future Starts Here.
                </p>
                <p class="mt-2 text-xs text-emerald-100/40">
                    &copy; {{ date('Y') }} Negros Occidental Education Hub
                </p>
            </div>

        </section>

        <!-- Registration Form -->
        <section class="flex w-full items-center justify-center px-5 py-10 sm:px-10 lg:w-1/2 lg:px-12 xl:px-20">

            <div class="w-full max-w-md">

                <!-- Mobile logo -->
                <a href="{{ url('/') }}" class="mb-10 flex items-center gap-3 lg:hidden">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-900 text-xl font-black text-white">
                        N
                    </div>
                    <div>
                        <h1 class="font-bold text-emerald-950">NOEH</h1>
                        <p class="text-xs text-slate-500">Negros Occidental Education Hub</p>
                    </div>
                </a>

                <div class="mb-8">
                    <p class="mb-3 text-xs font-bold uppercase tracking-[0.2em] text-emerald-700">
                        Get started today
                    </p>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                        Create your account
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-500">
                        Join NOEH and start exploring educational opportunities in Negros Occidental.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-semibold">Please review your information.</p>
                        <ul class="mt-2 list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                            Full name
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >

                        @error('name')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                            autocomplete="email"
                            placeholder="you@example.com"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >

                        @error('email')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                            Password
                        </label>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a strong password"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >

                        @error('password')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                            Confirm password
                        </label>

                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="Enter your password again"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="group flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-800 px-5 py-4 text-sm font-bold text-white shadow-lg shadow-emerald-900/10 transition duration-200 hover:-translate-y-0.5 hover:bg-emerald-900 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-emerald-600/20"
                    >
                        Create account
                        <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                        </svg>
                    </button>

                </form>

                <div class="my-7 flex items-center gap-4">
                    <div class="h-px flex-1 bg-slate-200"></div>
                    <span class="text-xs font-medium text-slate-400">OR</span>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>

                <p class="text-center text-sm text-slate-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-bold text-emerald-800 transition hover:text-emerald-600">
                        Sign in
                    </a>
                </p>

                <p class="mt-8 text-center text-xs leading-6 text-slate-400">
                    By creating an account, you agree to provide accurate information and use NOEH responsibly.
                </p>

                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}" class="text-sm font-medium text-slate-500 transition hover:text-emerald-800">
                        &larr; Back to homepage
                    </a>
                </div>

            </div>
        </section>

    </main>

</body>
</html>
