<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Tags</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
    <div class="flex items-start">

      <?php include __DIR__ . "/../layouts/sidebar.php"; ?>

      <section class="main-content w-full px-8">

        <?php include __DIR__ . "/../layouts/dashboardHeader.php"; ?>

        <!-- Contenu principal -->
        <div class="p-6">

          <!-- Messages de succès/erreur -->
          <?php if(isset($_SESSION['success'])): ?>
              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                  <span class="block sm:inline"><?= $_SESSION['success'] ?></span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-green-500" role="button" onclick="this.parentElement.parentElement.remove()"
                          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <title>Fermer</title>
                          <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                      </svg>
                  </span>
              </div>
              <?php unset($_SESSION['success']); ?>
          <?php endif; ?>

          <?php if(isset($_SESSION['error'])): ?>
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                  <span class="block sm:inline"><?= $_SESSION['error'] ?></span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" onclick="this.parentElement.parentElement.remove()"
                          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <title>Fermer</title>
                          <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                      </svg>
                  </span>
              </div>
              <?php unset($_SESSION['error']); ?>
          <?php endif; ?>

          <!-- Barre d'actions -->
          <div class="flex justify-between items-center mb-6">
            <div class="relative">
              <input type="text" placeholder="Rechercher un tag..." 
                  class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500">
              <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <button type="button" id="ajoutBtn"
                class="px-4 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ajouter un tag
            </button>
          </div>

          <!-- Modal Ajouter Tag -->
          <div id="ajoutModalArticle" class="fixed inset-0 p-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
                  <div class="flex items-center">
                    <h3 class="text-sky-600 text-3xl font-bold flex-1 text-center w-full">Ajouter Tag</h3>
                    <div id="close1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 ml-2 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500" viewBox="0 0 320.591 320.591">
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                      </svg>
                    </div>
                  </div>

                  <form class="space-y-4 mt-8" action="/add-tag" method="post">
                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Nom</label>
                      <input type="text" name="nom" required placeholder="Titre de la catégorie" class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div class="flex justify-end gap-4 !mt-8">
                      <button type="button" id="annuler" class="px-6 py-3 rounded-lg text-gray-800 text-sm border-none outline-none tracking-wide bg-gray-200 hover:bg-gray-300">Annuler</button>
                      <button type="submit" name="submit" class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-sky-600 hover:bg-sky-700">Ajouter</button>
                    </div>
                  </form>
                </div>
              </div>

          <!-- Liste des tags -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="overflow-x-auto">
                  <table class="w-full text-left">
                      <thead class="bg-sky-600">
                          <tr>
                              <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                  Nom
                              </th>
                              <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                  Date de création
                              </th>
                              <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">
                                  Actions
                              </th>
                          </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200">
                          <?php if(isset($tags) && !empty($tags)): ?>
                              <?php foreach($tags as $tag): ?>
                                  <tr class="hover:bg-gray-50">
                                      <td class="px-6 py-4">
                                          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                              <?= htmlspecialchars($tag['nom']) ?>
                                          </span>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                          <?= date('d/m/Y', strtotime($tag['created_at'])) ?>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                          <form action="/delete-tag" method="POST" class="inline-block" 
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?');">
                                              <input type="hidden" name="tag_id" value="<?= $tag['id'] ?>">
                                              <button type="submit" class="text-red-600 hover:text-red-900">
                                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                  </svg>
                                              </button>
                                          </form>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          <?php else: ?>
                              <tr>
                                  <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                      <div class="flex flex-col items-center justify-center">
                                          <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                          </svg>
                                          <p class="text-lg">Aucun tag trouvé</p>
                                          <button onclick="document.getElementById('ajoutBtn').click()" 
                                              class="mt-4 px-4 py-2 bg-sky-600 text-white rounded-lg hover:bg-sky-700">
                                              Créer un tag
                                          </button>
                                      </div>
                                  </td>
                              </tr>
                          <?php endif; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </section>
    </div>
  </div>

  <script>
    const modal = document.getElementById('ajoutModalArticle');
    const openBtn = document.getElementById('ajoutBtn');
    const closeBtn = document.getElementById('close1');
    const annulerBtn = document.getElementById('annuler');

    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    function closeModal() {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    closeBtn.addEventListener('click', closeModal);
    annulerBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
  </script>

</body>

</html>