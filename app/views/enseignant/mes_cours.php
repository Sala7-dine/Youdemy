<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Cours | Youdemy</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Inclure le sidebar ici -->
    <?php include __DIR__  . '/../layouts/sidebar.php'; ?>





    <main class="lg:ml-[250px]">

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


        <div class="p-8">

            <div class="mb-8 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Gestion des Cours</h1>
                <button onclick="openModal()" class="bg-sky-600 text-white px-4 py-2 rounded-lg hover:bg-sky-700 transition-colors flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    Nouveau Cours
                </button>
            </div>

            <!-- Filtres et Recherche -->
            <div class="bg-white p-4 rounded-xl shadow-sm mb-6">
                <div class="flex flex-wrap gap-4 items-center justify-between">
                    <div class="flex gap-4 items-center">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher un cours..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-sky-500">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <select class="border rounded-lg px-4 py-2 focus:outline-none focus:border-sky-500">
                            <option value="">Toutes les catégories</option>
                            <option value="web">Développement Web</option>
                            <option value="mobile">Développement Mobile</option>
                            <option value="design">Design</option>
                        </select>
                    </div>
                    <div class="flex gap-4">
                        <select class="border rounded-lg px-4 py-2 focus:outline-none focus:border-sky-500">
                            <option value="">Statut</option>
                            <option value="active">Actif</option>
                            <option value="draft">Brouillon</option>
                            <option value="review">En révision</option>
                        </select>
                        <select class="border rounded-lg px-4 py-2 focus:outline-none focus:border-sky-500">
                            <option value="">Trier par</option>
                            <option value="recent">Plus récent</option>
                            <option value="oldest">Plus ancien</option>
                            <option value="popular">Plus populaire</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Liste des Cours -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cours</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Étudiants</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-lg bg-sky-100 flex items-center justify-center text-sky-600">
                                        <i class="fas fa-laptop-code"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Introduction à React</div>
                                        <div class="text-sm text-gray-500">Mis à jour il y a 2 jours</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Développement Web
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">49.99 €</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Actif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">28</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex gap-3">
                                    <button onclick="editCourse(1)" class="text-sky-600 hover:text-sky-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteCourse(1)" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Autres lignes de cours... -->
                    </tbody>
                </table>
            </div>

            <!-- Modal Ajout/Modification de Cours -->
            <div id="courseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
                <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900" id="modalTitle">Nouveau Cours</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form id="courseForm" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Titre du cours</label>
                            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                                <select name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                    <option value="web">Développement Web</option>
                                    <option value="mobile">Développement Mobile</option>
                                    <option value="design">Design</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Prix</label>
                                <input type="number" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                            </div>
                        </div>
                        <div class="flex justify-end gap-4">
                            <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                                Annuler
                            </button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-sky-600 rounded-md hover:bg-sky-700">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>



    </main>

    <script>
        function openModal() {
            document.getElementById('courseModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('courseModal').classList.add('hidden');
        }

        function editCourse(id) {
            // Logique pour éditer un cours
            openModal();
            document.getElementById('modalTitle').textContent = 'Modifier le Cours';
            // Remplir le formulaire avec les données du cours
        }

        function deleteCourse(id) {
            if(confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')) {
                // Logique pour supprimer un cours
            }
        }

        document.getElementById('courseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Logique pour sauvegarder le cours
            closeModal();
        });
    </script>
</body>
</html>