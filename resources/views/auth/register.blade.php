
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Account | NOEH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-800">

    <main class="flex min-h-screen">

        <!-- Left Branding Panel -->
        <section class="relative hidden w-1/2 flex-col justify-between overflow-hidden bg-emerald-950 p-12 text-white lg:flex">

            <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-emerald-800/40 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-green-500/20 blur-3xl"></div>

            <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white text-xl font-bold text-emerald-900">
                    N
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-wide">NOEH</h1>
                    <p class="text-xs text-emerald-200">Negros Occidental Education Hub</p>
                </div>
            </a>

            <div class="relative z-10 max-w-lg">
                <span class="mb-5 inline-block rounded-full border border-emerald-400/30 bg-emerald-800/40 px-4 py-2 text-xs font-semibold tracking-wider text-emerald-200">
                    START YOUR JOURNEY
                </span>

                <h2 class="text-5xl font-bold leading-tight">
                    Your Future.
                    <span class="text-emerald-300">Your Opportunities.</span>
                </h2>

                <p class="mt-6 max-w-md text-lg leading-relaxed text-emerald-100/80">
                    Create your NOEH account and explore universities, academic programs, scholarships, and educational opportunities across Negros Occidental.
                </p>

                <div class="mt-8 space-y-4 text-sm text-emerald-100/90">
                    <p class="flex items-center gap-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-700">✓</span>
                        Discover universities and colleges
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-700">✓</span>
                        Save your favorite institutions
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-700">✓</span>
                        Compare academic opportunities
                    </p>
                </div>
            </div>

            <div class="relative z-10">
                <p class="text-sm font-medium text-emerald-200">
                    One Platform. Every Opportunity. Your Future Starts Here.
                </p>
                <p class="mt-2 text-xs text-emerald-400">
                    &copy; {{ date('Y') }} Negros Occidental Education Hub
                </p>
            </div>
        </section>

        <!-- Registration Form -->
        <section class="flex w-full items-center justify-center px-6 py-12 lg:w-1/2 lg:px-16">

            <div class="w-full max-w-md">

                <a href="{{ url('/') }}" class="mb-8 flex items-center gap-3 lg:hidden">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-900 text-lg font-bold text-white">
                        N
                    </div>
                    <div>
                        <h1 class="font-bold text-emerald-950">NOEH</h1>
                        <p class="text-xs text-slate-500">Negros Occidental Education Hub</p>
                    </div>
                </a>

                <div class="mb-7">
                    <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-emerald-700">
                        Join NOEH
                    </p>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                        Create your account
                    </h2>

                    <p class="mt-3 text-sm leading-relaxed text-slate-500">
                        Get started and explore educational opportunities in Negros Occidental.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-semibold">Please check the following:</p>
                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                            Full Name
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
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                            Email Address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

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
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                        <p class="mt-2 text-xs text-slate-400">
                            Use a password that is difficult for others to guess.
                        </p>
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                            Confirm Password
                        </label>

                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="Re-enter your password"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-emerald-800 px-5 py-4 text-sm font-bold text-white shadow-lg shadow-emerald-900/10 transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-600/20"
                    >
                        Create Account
                    </button>
                </form>

                <div class="my-7 flex items-center gap-4">
                    <div class="h-px flex-1 bg-slate-200"></div>
                    <span class="text-xs font-medium uppercase tracking-wider text-slate-400">Already registered?</span>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>

                <a href="{{ route('login') }}"
                   class="flex w-full items-center justify-center rounded-xl border border-emerald-800 px-5 py-3.5 text-sm font-bold text-emerald-900 transition hover:bg-emerald-50">
                    Sign In Instead
                </a>

                <p class="mt-7 text-center text-xs leading-relaxed text-slate-400">
                    By creating an account, you agree to provide accurate information and use NOEH responsibly.
                </p>

                <p class="mt-5 text-center text-sm text-slate-500">
                    <a href="{{ url('/') }}" class="font-semibold text-emerald-700 hover:text-emerald-900">
                        &larr; Back to Home
                    </a>
                </p>

            </div>
        </section>
    </main>

</body>
</html>
