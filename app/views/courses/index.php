<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Plateforme d'apprentissage en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-sky-600 font-bold text-2xl">Youdemy</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-sky-600">Cours</a>
                    <a href="#" class="text-gray-600 hover:text-sky-600">Catégories</a>
                    <a href="#" class="text-gray-600 hover:text-sky-600">Enseignants</a>
                    <button class="bg-sky-600 text-white px-6 py-2 rounded-lg hover:bg-sky-700 transition">
                        Connexion
                    </button>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-600">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bannière Principale -->
    <section class="relative min-h-[80vh] pt-32 pb-20 bg-white overflow-hidden">
        <!-- Motif de fond géométrique -->
        <div class="absolute inset-0">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(0, 0, 0, 0.05)" stroke-width="0.5"/>
                    </pattern>
                    <pattern id="dots" width="30" height="30" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1" fill="rgba(0, 0, 0, 0.07)"/>
                        <circle cx="15" cy="15" r="1.5" fill="rgba(0, 0, 0, 0.08)"/>
                        <circle cx="28" cy="28" r="1" fill="rgba(0, 0, 0, 0.07)"/>
                    </pattern>
                    <pattern id="squares" width="40" height="40" patternUnits="userSpaceOnUse">
                        <rect width="8" height="8" fill="rgba(0, 0, 0, 0.04)"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
                <rect width="100%" height="100%" fill="url(#dots)"/>
                <rect width="100%" height="100%" fill="url(#squares)"/>
            </svg>
        </div>

        <div class="container mx-auto px-12 relative">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 mb-8">
                    <span class="text-blue-600 font-medium">La meilleure plateforme d'apprentissage</span>
                </div>
                
                <!-- Titre principal -->
                <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                    Revolutionnez votre apprentissage avec 
                    <span class="text-blue-600">Youdemy</span>
                </h1>

                <!-- Sous-titre -->
                <p class="text-xl text-gray-600 mb-12 mx-auto">
                    Découvrez des milliers de cours en ligne, développez vos compétences 
                    et construisez votre avenir professionnel dès aujourd'hui.
                </p>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#courses" 
                       class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition duration-300 shadow-lg">
                        Commencer maintenant
                    </a>
                    <a href="#demo" 
                       class="inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-blue-600 bg-blue-50 rounded-xl hover:bg-blue-100 transition duration-300">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalogue de Cours -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Catégories Populaires</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <i class="fas fa-code text-4xl text-sky-600 mb-4"></i>
                    <h3 class="font-semibold mb-2">Développement Web</h3>
                    <p class="text-gray-600">200+ cours</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <i class="fas fa-paint-brush text-4xl text-sky-600 mb-4"></i>
                    <h3 class="font-semibold mb-2">Design</h3>
                    <p class="text-gray-600">150+ cours</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <i class="fas fa-chart-line text-4xl text-sky-600 mb-4"></i>
                    <h3 class="font-semibold mb-2">Business</h3>
                    <p class="text-gray-600">300+ cours</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <i class="fas fa-language text-4xl text-sky-600 mb-4"></i>
                    <h3 class="font-semibold mb-2">Langues</h3>
                    <p class="text-gray-600">250+ cours</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fonctionnalités Clés -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Pourquoi Choisir Youdemy ?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <i class="fas fa-infinity text-5xl text-sky-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Accès illimité</h3>
                    <p class="text-gray-600">Accédez à tous nos cours, à tout moment et en illimité</p>
                </div>
                <div class="text-center p-6">
                    <i class="fas fa-chart-bar text-5xl text-sky-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Statistiques détaillées</h3>
                    <p class="text-gray-600">Suivez votre progression et analysez vos performances</p>
                </div>
                <div class="text-center p-6">
                    <i class="fas fa-certificate text-5xl text-sky-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Certification</h3>
                    <p class="text-gray-600">Obtenez des certificats reconnus à la fin de chaque cours</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Ce que disent nos étudiants</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://placehold.co/60x60" alt="Student" class="rounded-full">
                        <div class="ml-4">
                            <h4 class="font-semibold">Marie Dupont</h4>
                            <div class="text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Une expérience d'apprentissage incroyable. Les cours sont de très haute qualité."</p>
                </div>
                <!-- Répétez pour d'autres témoignages -->
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-sky-600 text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Rejoignez-nous dès aujourd'hui !</h2>
            <p class="text-xl mb-8">Commencez votre aventure éducative maintenant</p>
            <div class="space-x-4">
                <button class="bg-white text-sky-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Je suis étudiant
                </button>
                <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-sky-600 transition">
                    Je suis enseignant
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Youdemy</h3>
                    <p class="text-gray-400">Votre plateforme d'apprentissage en ligne</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">À propos</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                        <li><a href="#" class="hover:text-white">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-sky-400"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-sky-400"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-sky-400"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-sky-400"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>