<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white shadow-md rounded-none p-6">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-6">Register</h2>

            @if(session('error'))
                <div class="bg-red-100 text-red-700 text-sm p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" id="first_name" required
                           class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                </div>

                <div class="mb-4">
                    <label for="middle_name" class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name"
                           class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" id="last_name" required
                           class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                </div>

                <div class="mb-4">
                    <label for="ext_name" class="block text-sm font-medium text-gray-700 mb-1">Extension Name</label>
                    <input type="text" name="ext_name" id="ext_name"
                           class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                </div>

                <div class="mb-4">
                    <label for="department_id" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                    <select name="department_id" id="department_id" required
                            class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                        <option value="" disabled selected>Select a department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                    <input type="email" name="email" id="email" required
                           class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 border border-gray-300 bg-white text-gray-900 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                </div>

                <div class="mb-6">
                    <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Profile Photo (optional)</label>
                    <input type="file" name="photo_photo" id="photo_photo" accept="image/*"
                           class="w-full text-sm text-gray-700">
                </div>

                <button type="submit"
                        class="w-full bg-black text-white py-2 font-medium hover:bg-gray-800 transition-colors">
                    Register
                </button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-sm text-black underline hover:text-gray-700">
                    Already have an account? Login
                </a>
            </div>
        </div>
    </div>
</body>
</html>
