<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center bg-no-repeat backdrop-blur-sm" style="background-image: url('/images/school.webp')">

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-sm bg-white shadow-md rounded-none p-6">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">Login</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 text-sm p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <input type="email" name="email" id="email" required autofocus
                           class="w-full px-3 py-2 border border-gray-300 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black bg-white text-gray-900">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black bg-white text-gray-900">
                </div>

                <button type="submit"
                        class="w-full bg-black text-white py-2 font-medium hover:bg-gray-800 transition-colors">
                    Login
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-sm text-black underline hover:text-gray-700">
                    Don't have an account? Register
                </a>
            </div>
        </div>
    </div>
</body>
</html>
