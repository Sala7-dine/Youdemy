<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Non Trouvée | Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="max-w-xl w-full px-4">
        <div class="text-center">
            <!-- Image d'erreur 404 -->
            <div class="mb-8">
                <svg class="mx-auto h-40 w-40 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Message d'erreur -->
            <div class="mb-8">
                <h1 class="text-6xl font-bold text-sky-600 mb-4">404</h1>
                <h2 class="text-3xl font-semibold text-gray-900 mb-2">Page Non Trouvée</h2>
                <p class="text-gray-600">
                    Désolé, la page que vous recherchez semble avoir disparu dans le cyberespace.
                </p>
            </div>

            <!-- Boutons d'action -->
            <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-center sm:space-x-4">
                <a href="/" 
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                    Retour à l'accueil
                </a>
                <button onclick="window.history.back()" 
                        class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                    Page précédente
                </button>
            </div>

            <!-- Message supplémentaire -->
            <p class="mt-8 text-sm text-gray-500">
                Si vous pensez qu'il s'agit d'une erreur, veuillez 
                <a href="/contact" class="text-sky-600 hover:text-sky-500">nous contacter</a>.
            </p>
        </div>

        <!-- Animation de fond (optionnelle) -->
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]" aria-hidden="true">
                <div class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-sky-200 to-sky-400 opacity-20"></div>
            </div>
        </div>
    </div>

    <!-- Message de copyright -->
    <div class="absolute bottom-4 w-full text-center text-gray-500 text-sm">
        &copy; <?= date('Y') ?> Youdemy. Tous droits réservés.
    </div>
</body>
</html>
