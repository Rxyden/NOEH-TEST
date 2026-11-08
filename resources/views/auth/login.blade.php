
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | NOEH</title>
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
                    YOUR EDUCATION STARTS HERE
                </span>

                <h2 class="text-5xl font-bold leading-tight">
                    Discover Your Future.
                    <span class="text-emerald-300">Find the Right School.</span>
                </h2>

                <p class="mt-6 max-w-md text-lg leading-relaxed text-emerald-100/80">
                    Explore universities, discover academic programs, and find educational opportunities across Negros Occidental—all in one platform.
                </p>
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

        <!-- Login Form -->
        <section class="flex w-full items-center justify-center px-6 py-12 lg:w-1/2 lg:px-16">

            <div class="w-full max-w-md">

                <a href="{{ url('/') }}" class="mb-12 flex items-center gap-3 lg:hidden">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-900 text-lg font-bold text-white">
                        N
                    </div>
                    <div>
                        <h1 class="font-bold text-emerald-950">NOEH</h1>
                        <p class="text-xs text-slate-500">Negros Occidental Education Hub</p>
                    </div>
                </a>

                <div class="mb-8">
                    <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-emerald-700">
                        Welcome Back
                    </p>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                        Sign in to your account
                    </h2>

                    <p class="mt-3 text-sm leading-relaxed text-slate-500">
                        Access your saved schools, comparisons, and educational opportunities.
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <p class="font-semibold">Unable to sign in.</p>
                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf

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
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <label for="password" class="text-sm font-semibold text-slate-700">
                                Password
                            </label>

                            <a href="{{ route('password.request') }}"
                               class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">
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
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-emerald-600 focus:ring-4 focus:ring-emerald-600/10"
                        >
                    </div>

                    <label class="flex cursor-pointer items-center gap-3">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="h-4 w-4 rounded border-slate-300 accent-emerald-700"
                        >
                        <span class="text-sm text-slate-600">Remember me</span>
                    </label>

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-emerald-800 px-5 py-4 text-sm font-bold text-white shadow-lg shadow-emerald-900/10 transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-600/20"
                    >
                        Sign In
                    </button>
                </form>

                <div class="my-8 flex items-center gap-4">
                    <div class="h-px flex-1 bg-slate-200"></div>
                    <span class="text-xs font-medium uppercase tracking-wider text-slate-400">New to NOEH?</span>
                    <div class="h-px flex-1 bg-slate-200"></div>
                </div>

                <a href="{{ route('register') }}"
                   class="flex w-full items-center justify-center rounded-xl border border-emerald-800 px-5 py-3.5 text-sm font-bold text-emerald-900 transition hover:bg-emerald-50">
                    Create an Account
                </a>

                <p class="mt-8 text-center text-xs leading-relaxed text-slate-400">
                    By continuing, you agree to use NOEH responsibly and provide accurate account information.
                </p>

                <p class="mt-6 text-center text-sm text-slate-500">
                    <a href="{{ url('/') }}" class="font-semibold text-emerald-700 hover:text-emerald-900">
                        &larr; Back to Home
                    </a>
                </p>

            </div>
        </section>
    </main>

</body>
</html>
