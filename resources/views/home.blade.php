
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Escola FP Informàtica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full p-6">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">
            Gestió Escola FP Informàtica
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('modules.index') }}"
               class="block bg-blue-600 text-white text-center py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                Gestió de Mòduls
            </a>
            <a href="{{ route('units.index') }}"
               class="block border border-gray-800 text-gray-800 text-center py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition">
                Gestió UFs
            </a>
            <a href="{{ route('teachers.index') }}"
               class="block bg-green-600 text-white text-center py-4 rounded-lg text-lg font-semibold hover:bg-green-700 transition">
                Gestió de Professors
            </a>
            <a href="{{ route('students.index') }}"
               class="block bg-yellow-400 text-gray-900 text-center py-4 rounded-lg text-lg font-semibold hover:bg-yellow-500 transition">
                Gestió d'Alumnes
            </a>
            <a href="{{ route('assessments.index') }}"
               class="block bg-red-600 text-white text-center py-4 rounded-lg text-lg font-semibold hover:bg-red-700 transition">
                Gestió d'Avaluacions
            </a>
        </div>
    </div>
</body>
</html>
