<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Enseignant | Youdemy</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .card-gradient {
            background: linear-gradient(135deg, #082f49 0%,#0ea5e9 100%);
        }

        .nav-link:hover .icon-wrapper {
            background-color: #6366f1;
            color: white;
        }

        .icon-wrapper {
            transition: all 0.3s ease;
        }
        
    </style>
</head>
<body>
    <div class="flex h-screen bg-gray-100">

        
        <?php include __DIR__ . "/../layouts/teacherSidebare.php"; ?>

        

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard Enseignant</h2>
                        <p class="text-gray-600">Gérez vos cours et vos étudiants</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="p-2 text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                        <div class="w-10 h-10 rounded-full bg-sky-500 flex items-center justify-center text-white font-medium">
                            E
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-8">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Courses -->
                    <div class="card-gradient rounded-2xl p-6 text-white">
                        <div class="flex justify-between items-center mb-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <i class="fas fa-book-open text-xl"></i>
                            </div>
                            <span class="text-white/70">+12%</span>
                        </div>
                        <h3 class="text-3xl font-bold mb-1">15</h3>
                        <p class="text-white/70">Cours publiés</p>
                    </div>

                    <!-- Total Students -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <div class="p-3 bg-green-100 rounded-xl text-green-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <span class="text-green-600">+25%</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-1">458</h3>
                        <p class="text-gray-500">Étudiants inscrits</p>
                    </div>

                    <!-- Revenue -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <div class="p-3 bg-blue-100 rounded-xl text-blue-600">
                                <i class="fas fa-dollar-sign text-xl"></i>
                            </div>
                            <span class="text-blue-600">+18%</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-1">$2,845</h3>
                        <p class="text-gray-500">Revenus du mois</p>
                    </div>

                    <!-- Average Rating -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <div class="p-3 bg-yellow-100 rounded-xl text-yellow-600">
                                <i class="fas fa-star text-xl"></i>
                            </div>
                            <span class="text-yellow-600">+5%</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-1">4.8</h3>
                        <p class="text-gray-500">Note moyenne</p>
                    </div>
                </div>

                <!-- Remplacer la section des cartes par -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Tableau des Cours -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Liste des Cours</h3>
                            <a href="/mes-cours" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Voir tout</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Titre</th>
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Catégorie</th>
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Étudiants</th>
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-2 text-sm text-gray-800">Introduction à React</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">Développement Web</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">28</td>
                                        <td class="py-3 px-2">
                                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Actif</span>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-2 text-sm text-gray-800">JavaScript Avancé</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">Programmation</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">45</td>
                                        <td class="py-3 px-2">
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">En révision</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2 text-sm text-gray-800">UX Design Principles</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">Design</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">32</td>
                                        <td class="py-3 px-2">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Nouveau</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tableau des Étudiants -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Derniers Étudiants Inscrits</h3>
                            <a href="/etudiants" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Voir tout</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Étudiant</th>
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Cours</th>
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Date</th>
                                        <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Progrès</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-medium text-sm mr-3">
                                                    JD
                                                </div>
                                                <span class="text-sm text-gray-800">John Doe</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-2 text-sm text-gray-600">React Basics</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">23 Mars 2024</td>
                                        <td class="py-3 px-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 75%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-medium text-sm mr-3">
                                                    AS
                                                </div>
                                                <span class="text-sm text-gray-800">Alice Smith</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-2 text-sm text-gray-600">UX Design</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">22 Mars 2024</td>
                                        <td class="py-3 px-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 45%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-medium text-sm mr-3">
                                                    MB
                                                </div>
                                                <span class="text-sm text-gray-800">Mike Brown</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-2 text-sm text-gray-600">JavaScript</td>
                                        <td class="py-3 px-2 text-sm text-gray-600">21 Mars 2024</td>
                                        <td class="py-3 px-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 90%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>




    <script defer>
            document.addEventListener('DOMContentLoaded', () => {
                let sidebarToggleBtn = document.getElementById('toggle-sidebar');
                let sidebarCollapseMenu = document.getElementById('sidebar-collapse-menu');

                sidebarToggleBtn.addEventListener('click', () => {
                    if (!sidebarCollapseMenu.classList.contains('open')) {
                        sidebarCollapseMenu.classList.add('open');
                        sidebarCollapseMenu.style.cssText = 'width: 250px; visibility: visible; opacity: 1;';
                        sidebarToggleBtn.style.cssText = 'left: 236px;';
                    } else {
                        sidebarCollapseMenu.classList.remove('open');
                        sidebarCollapseMenu.style.cssText = 'width: 32px; visibility: hidden; opacity: 0;';
                        sidebarToggleBtn.style.cssText = 'left: 10px;';
                    }
                });
            });
        </script>
</body>
</html>