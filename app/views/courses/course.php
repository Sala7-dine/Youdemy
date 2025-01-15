<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Catalogue des Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-100 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center flex-1">
                    <a href="#" class="text-indigo-600 font-bold text-2xl">Youdemy</a>
                    <div class="hidden md:flex items-center ml-10 flex-1">
                        <div class="relative flex-1 max-w-2xl">
                            <input type="text" placeholder="Rechercher un cours..." 
                                   class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:border-indingo-500 focus:ring-2 focus:ring-indigo-200">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center ml-6 space-x-6">
                        <a href="#" class="text-gray-600 hover:text-indigo-600">Accueil</a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">Mes Cours</a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600">Profil</a>
                        <button class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition">
                            Connexion
                        </button>
                    </div>
                </div>
                <button class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="pt-16">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Filtres -->
                <div class="md:w-1/4">
                    <div class="bg-white rounded-xl border border-gray-100 p-6">
                        <h2 class="font-bold text-lg mb-4">Filtres</h2>
                        
                        <!-- Catégories -->
                        <div class="mb-6">
                            <h3 class="font-semibold mb-3">Catégories</h3>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                                    <span class="ml-2 group-hover:text-indigo-600">Technologie</span>
                                </label>
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                                    <span class="ml-2 group-hover:text-indigo-600">Design</span>
                                </label>
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                                    <span class="ml-2 group-hover:text-indigo-600">Marketing</span>
                                </label>
                            </div>
                        </div>

                        <!-- Niveau -->
                        <div class="mb-6">
                            <h3 class="font-semibold mb-3">Niveau</h3>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                                    <span class="ml-2 group-hover:text-indigo-600">Débutant</span>
                                </label>
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                                    <span class="ml-2 group-hover:text-indigo-600">Intermédiaire</span>
                                </label>
                                <label class="flex items-center cursor-pointer group">
                                    <input type="checkbox" class="form-checkbox text-indigo-600 rounded">
                                    <span class="ml-2 group-hover:text-indigo-600">Avancé</span>
                                </label>
                            </div>
                        </div>

                        <!-- Tags populaires -->
                        <div class="mb-6">
                            <h3 class="font-semibold mb-3">Tags populaires</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm hover:bg-indigo-100 cursor-pointer transition">
                                    JavaScript
                                </span>
                                <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm hover:bg-indigo-100 cursor-pointer transition">
                                    Photoshop
                                </span>
                                <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm hover:bg-indigo-100 cursor-pointer transition">
                                    Marketing Digital
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liste des Cours -->
                <div class="md:w-3/4">
                    <!-- Options d'affichage -->
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center space-x-4">
                            <button class="text-indigo-600 hover:text-indigo-800 transition">
                                <i class="fas fa-th-large text-xl"></i>
                            </button>
                            <button class="text-gray-400 hover:text-indigo-600 transition">
                                <i class="fas fa-list text-xl"></i>
                            </button>
                        </div>
                        <select class="border border-gray-200 rounded-full px-4 py-2 focus:outline-none focus:border-indigo-500">
                            <option>Trier par popularité</option>
                            <option>Les mieux notés</option>
                            <option>Plus récents</option>
                        </select>
                    </div>

                    <!-- Grille des cours -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Carte de cours -->
                        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden group">
                            <div class="relative">
                                <img src="https://placehold.co/400x225" alt="Course thumbnail" class="w-full h-48 object-cover">
                                <div class="absolute top-4 left-4">
                                    <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-sm">
                                        Populaire
                                    </span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="absolute bottom-4 left-4 right-4">
                                        <button class="w-full bg-white text-indigo-600 px-6 py-2 rounded-full hover:bg-indigo-50 transition">
                                            En savoir plus
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm text-indigo-600 font-medium">Développement Web</span>
                                    <div class="flex items-center text-indigo-600">
                                        <i class="fas fa-clock mr-1"></i>
                                        <span class="text-sm">20h</span>
                                    </div>
                                </div>
                                <h3 class="font-bold text-xl mb-2 group-hover:text-indigo-600 transition">Introduction au JavaScript Moderne</h3>
                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    Apprenez les fondamentaux de JavaScript ES6+ et les concepts avancés pour devenir un développeur frontend performant.
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt="Instructor" class="rounded-full ring-2 ring-gray-50">
                                        <span class="ml-2 text-sm font-medium">Par John Doe</span>
                                    </div>
                                    <div class="flex items-center bg-green-50 px-3 py-1 rounded-full">
                                        <div class="text-yellow-400 mr-1">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-sm font-medium">4.8</span>
                                        <span class="text-gray-500 text-sm ml-1">(2.5k)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Répéter pour plus de cours -->
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            <button class="px-4 py-2 border border-gray-200 rounded-full hover:bg-gray-50 transition">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-full">1</button>
                            <button class="px-4 py-2 border border-gray-200 rounded-full hover:bg-gray-50 transition">2</button>
                            <button class="px-4 py-2 border border-gray-200 rounded-full hover:bg-gray-50 transition">3</button>
                            <button class="px-4 py-2 border border-gray-200 rounded-full hover:bg-gray-50 transition">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner CTA -->
    <div class="fixed bottom-0 w-full bg-gradient-to-r from-indigo-600 to-indigo-800 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <p class="text-lg">Découvrez plus de 10 000 cours en vous inscrivant gratuitement !</p>
            <button class="bg-white text-indigo-600 px-6 py-2 rounded-full hover:bg-indigo-50 transition">
                S'inscrire
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Youdemy</h3>
                    <p class="text-gray-400">Votre plateforme d'apprentissage en ligne</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Liens utiles</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Centre d'aide</a></li>
                        <li><a href="#" class="hover:text-white transition">Conditions d'utilisation</a></li>
                        <li><a href="#" class="hover:text-white transition">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Communauté</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Forum</a></li>
                        <li><a href="#" class="hover:text-white transition">Affiliés</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-indigo-400 transition"><i class="fab fa-facebook text-xl"></i></a>
                        <a href="#" class="hover:text-indigo-400 transition"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="hover:text-indigo-400 transition"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="hover:text-indigo-400 transition"><i class="fab fa-linkedin text-xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>