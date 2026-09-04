<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webzone Notepad CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class="min-h-screen bg-slate-950 text-white">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="max-w-lg w-full text-center">
            <p class="text-4xl uppercase font-bold text-blue-300 mb-3">Webzone Expertz</p>
            <h1 class="text-sm font-bold mb-3">Notepad CRM</h1>
            <p class="text-slate-400 mb-10">Manage leads, callbacks, and sales notes with separate Admin and User access.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('admin.login') }}"
                   class="inline-flex justify-center bg-blue-600 hover:bg-blue-500 px-6 py-3 rounded-lg font-medium">
                    Admin Login
                </a>
                <a href="{{ route('user.login') }}"
                   class="inline-flex justify-center bg-white/10 hover:bg-white/15 border border-white/20 px-6 py-3 rounded-lg font-medium">
                    User Login
                </a>
                </div>
        </div>
    </div>
    </body>
</html>
