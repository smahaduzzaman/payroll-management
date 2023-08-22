<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Management Software</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-900 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <a href="#" class="text-xl font-semibold">Payroll Management</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('user-types.index') }}">User Types</a></li>
                <li><a href="{{ route('leave-categories.index') }}">Leave Categories</a></li>
                <li><a href="{{ route('employees.index') }}">Employees</a></li>
                <li><a href="{{ route('leave-requests.index') }}">Leave Requests</a></li>
                <li>
                    <a
                    href="{{ route('logout') }}"
                    class="bg-white text-blue-900 px-3 py-1 rounded font-semibold"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                </form>

            </ul>
        </div>
    </nav>
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

    <footer class="bg-gray-900 p-4 text-white mt-6">
        <div class="container mx-auto">
            <p class="text-center">
                @ Payroll Management Software
            </p>
        </div>
    </footer>

</body>

</html>
