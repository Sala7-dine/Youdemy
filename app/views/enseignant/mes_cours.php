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

    <?php include __DIR__  . '/../layouts/teacherSidebare.php'; ?>

    <main class="lg:ml-[250px]">
        <!-- Header -->
        <div class="bg-white shadow-sm">
            <div class="p-6">
                <h1 class="text-2xl font-semibold text-gray-800">Mes Cours</h1>
                <p class="text-gray-600 mt-1">Gérez vos cours et leur contenu</p>
            </div>
        </div>

        <div class="p-6">
            <!-- Actions Bar -->
            <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                <!-- Search Bar -->
                <div class="relative flex-1 max-w-md">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-sky-500" placeholder="Rechercher un cours...">
                </div>

                <!-- Add Button -->
                <button onclick="openModal()" class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un cours</span>
                </button>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="min-w-full align-middle">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Titre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catégorie
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tags
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date de création
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach($cours as $course): 
                                // Récupérer les tags du cours
                                $courseTags = $this->CoursModel->getCourseTags($course['id']);
                            ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= $course['id'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 rounded bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-book text-indigo-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($course['titre']) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <?= htmlspecialchars($course['categorie_nom']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-1">
                                        <?php foreach($courseTags as $tag): ?>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                                <?= htmlspecialchars($tag['nom']) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d/m/Y', strtotime($course['date_creation'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end gap-2">
                                        <!-- Bouton Update -->

                                        <form action="/dashboard/teacher/cours/edit" method="post">
                                            <input type="hidden" name="cours_id" value="<?= $course['id'] ?>">
                                            <button type="submit" name="submit" 
                                                    class="px-4 py-2 flex items-center justify-center rounded text-white text-sm tracking-wider font-medium border-none outline-none bg-green-600 hover:bg-green-700 active:bg-green-600">
                                                <span>Update</span>
                                            </button>
                                        </form>

                                        <!-- Formulaire de suppression -->
                                        <form action="/dashboard/teacher/cours/delete" method="POST" class="inline" 
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">
                                            <input type="hidden" name="cours_id" value="<?= $course['id'] ?>">
                                            <button type="submit" 
                                                    class="px-4 py-2 flex items-center justify-center rounded text-white text-sm tracking-wider font-medium border-none outline-none bg-red-600 hover:bg-red-700 active:bg-red-600">
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

         <!-- Modal d'ajout de cours -->
         <div id="courseModal" class="fixed inset-0 p-4 -m-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                
                <!-- Modal -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form id="courseForm" action="/dashboard/teacher/cours/add-cours" method="POST" enctype="multipart/form-data">
                        <!-- En-tête du modal -->
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Ajouter un nouveau cours
                                    </h3>
                                    <div class="mt-4 space-y-4">
                                        <!-- Titre -->
                                        <div>
                                            <label for="titre" class="block text-sm font-medium text-gray-700">
                                                Titre du cours
                                            </label>
                                            <input type="text" name="titre" id="titre" required
                                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg">
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <label for="description" class="block text-sm font-medium text-gray-700">
                                                Description
                                            </label>
                                            <textarea name="description" id="description" rows="2"
                                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg"></textarea>
                                        </div>

                                        <!-- Catégorie -->
                                        <div>
                                            <label for="categorie_id" class="block text-sm font-medium text-gray-700">
                                                Catégorie
                                            </label>
                                            <select name="categorie_id" id="categorie_id" required
                                                class="mt-1 block w-full py-4 px-3 border-none bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                                <?php foreach($categories as $categorie): ?>
                                                    <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['nom']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <!-- Type de contenu -->
                                        <div>
                                            <label for="content_type" class="block text-sm font-medium text-gray-700">
                                                Type de contenu
                                            </label>
                                            <select name="content_type" id="contentType" onchange="toggleContentFields()"
                                                class="mt-1 block w-full py-4 px-3 border-none bg-gray-100 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                                <option value="video">Vidéo</option>
                                                <option value="document">Document</option>
                                            </select>
                                        </div>

                                        <!-- Champs pour la vidéo -->
                                        <div id="videoFields">
                                            <div class="space-y-4">
                                                <div>
                                                    <label for="video_url" class="block text-sm font-medium text-gray-700">
                                                        URL de la vidéo
                                                    </label>
                                                    <input type="url" name="video_url" id="video_url"
                                                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div id="documentFields" style="display: none;">
                                            <label for="text" class="block text-sm font-medium text-gray-700">
                                                Content
                                            </label>
                                            <textarea name="text" id="text" rows="2"
                                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg"></textarea>
                                        </div>

                                        <!-- Ajouter cette section dans le formulaire du modal, juste après la section catégorie -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                                Tags
                                            </label>
                                            <div class="grid grid-cols-3 gap-2 max-h-32 overflow-y-auto p-2 border border-gray-300 rounded-md">
                                                <?php foreach($tags as $tag): ?>
                                                    <div class="flex items-center">
                                                        <input type="checkbox" 
                                                               name="tags[]" 
                                                               value="<?= $tag['id'] ?>" 
                                                               id="tag-<?= $tag['id'] ?>"
                                                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                                        <label for="tag-<?= $tag['id'] ?>" 
                                                               class="ml-2 block text-sm text-gray-900 truncate">
                                                            <?= htmlspecialchars($tag['nom']) ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-sky-600 text-base font-medium text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Enregistrer
                            </button>
                            <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Annuler
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
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('courseModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }


        function toggleContentFields() {
            const contentType = document.getElementById('contentType').value;
            const videoFields = document.getElementById('videoFields');
            const documentFields = document.getElementById('documentFields');
            
            if (contentType === 'video') {
                videoFields.style.display = 'block';
                documentFields.style.display = 'none';
            } else {
                videoFields.style.display = 'none';
                documentFields.style.display = 'block';
            }
        }

        if(<?= $modal ?>){
            openModal();
        }

    </script>
</body>
</html>