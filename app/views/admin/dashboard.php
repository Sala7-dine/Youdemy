<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

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

<body>

  <div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
    <div class="flex items-start">

      <?php include __DIR__ . "/../layouts/sidebar.php"; ?>

      <section class="main-content w-full px-8">

        <?php include __DIR__ . "/../layouts/dashboardHeader.php"; ?>

        <!--------------------------------------------------- DASHBOARD ---------------------------------------------------------------->

        <section id="dashboard" class="p-6">

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
        </section>

        <!------------------------------------------------ GESTION DES JEUX ------------------------------------------------------------->

        <section id="Game" class="flex flex-col items-center bg-gray-50 min-h-screen p-6 hidden">

          <div class="artcile w-full">

            <div class="flex justify-between py-10 px-1">

              <h1 class="text-gray-500 text-xl font-bold">All Games</h1>

              <div class="flex gap-4">

                <div class="relative font-[sans-serif] w-max">
                  <button type="button" id="dropdownToggle"
                    class="px-5 py-2.5 rounded text-white text-sm font-semibold border-none outline-none bg-sky-600 hover:bg-sky-700 active:bg-sky-600">
                    Filter by Title
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-white inline ml-3" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                        clip-rule="evenodd" data-original="#000000" />
                    </svg>
                  </button>

                  <ul id="dropdownMenu" class='absolute hidden shadow-lg bg-white py-2 z-[1000] min-w-full w-max rounded max-h-96 overflow-auto'>
                    <li class='py-2.5 px-5 hover:bg-sky-50 text-white text-sm cursor-pointer'>Facile</li>
                    <li class='py-2.5 px-5 hover:bg-sky-50 text-white text-sm cursor-pointer'>Moyenne</li>
                    <li class='py-2.5 px-5 hover:bg-sky-50 text-white text-sm cursor-pointer'>Difficile</li>
                  </ul>
                </div>
                <div class="relative font-[sans-serif] w-max">
                  <button type="button" id="dropdownToggle"
                    class="px-5 py-2.5 rounded text-white text-sm font-semibold border-none outline-none bg-sky-600 hover:bg-sky-700 active:bg-sky-600">
                    Filter by Date
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-white inline ml-3" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                        clip-rule="evenodd" data-original="#000000" />
                    </svg>
                  </button>

                </div>


                <div class="font-[sans-serif] w-max">
                  <button type="button" id="ajoutBtn"
                    class="flex justify-center items-center gap-2 px-5 py-2.5 rounded text-white text-sm font-medium border-none outline-none bg-green-600 hover:bg-green-700 active:bg-green-600">
                    <span>Ajouter Jeu</span>
                    <i class="fa fa-plus" style="font-size:16px"></i>
                  </button>
                </div>

              </div>

              <!-- Modal Ajouter Jeu -->

              <div id="ajoutModalArticle" class="fixed inset-0 p-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
                  <div class="flex items-center">
                    <h3 class="text-sky-600 text-3xl font-bold flex-1 text-center w-full">Ajouter Game</h3>

                    <div id="close1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 ml-2 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500"
                        viewBox="0 0 320.591 320.591">
                        <path
                          d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                          data-original="#000000"></path>
                        <path
                          d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                          data-original="#000000"></path>
                      </svg>
                    </div>

                  </div>

                  <form class="space-y-4 mt-8" action="admin.php" method="post" autocomplete="off">

                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Titre</label>
                      <input type="text" name="titre" placeholder="Saisir le titre..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Image</label>
                      <input type="text" name="image" placeholder="Saisir L'image..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Type</label>
                      <input type="text" name="type" placeholder="Saisir type..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">version</label>
                      <input type="text" name="version" placeholder="Saisir version..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Description</label>
                      <textarea placeholder='Saisir la description...' name="description"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" rows="3"></textarea>
                    </div>
                    <!-- ----------------------------------------------screenshots------------------------------------------ -->
                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Screenshot 1</label>
                      <input type="text" name="screenshot_1" placeholder="Saisir type..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>
                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Screenshot 2</label>
                      <input type="text" name="screenshot_2" placeholder="Saisir type..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>
                    <div>
                      <label class="text-gray-800 text-sm mb-2 block">Screenshot 3</label>
                      <input type="text" name="screenshot_3" placeholder="Saisir type..."
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-sky-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <!-- ------------------------------------------------------------------------------------------------------ -->

                    <div class="flex justify-end gap-4 !mt-8">
                      <button type="button" id="ajouteCancelQuiz"
                        class="px-6 py-3 rounded-lg text-gray-800 text-sm border-none outline-none tracking-wide bg-gray-200 hover:bg-gray-300">Cancel</button>
                      <button type="submit" id="ajoutQuizBtn" name="submit"
                        class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-sky-600 hover:bg-sky-700">Ajouter</button>
                    </div>


                  </form>
                </div>
              </div>

              <!-- Fin Ajout Article -->

            </div>

            <div class="bg-gray-100 md:px-10 px-4 py-12 font-[sans-serif]">
              <div class="max-w-5xl max-lg:max-w-3xl max-sm:max-w-sm mx-auto">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-sm:gap-8">


               

                    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full pb-6 max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto">

                      <div class="min-h-[240px]">
                        <img src="" class="w-[400px] h-[200px]" />
                      </div>

                      <div class="px-6">
                        <div class="flex justify-between mb-4">
                          <h2 class="text-md text-balck font-bold leading-relaxed hover:underline cursor-pointer ">fjizehjkfhzejf</h2>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">evjhzejvjrvjhbzerv</p>



                        <div class="flex gap-2">

                          <form action="updateJeu.php" method="POST">
                            <input type="hidden" name="jeu_id" value="">
                            <button type="submit" name="updateBtn" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-green-500 hover:bg-green-600 text-white text-[13px]">Update</button>
                          </form>

                          <form method="POST">
                            <input type="hidden" name="jeu_id" value="">
                            <button type="submit" name="deleteBtn" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-red-500 hover:bg-red-600 text-white text-[13px]">Delete</button>
                          </form>
                        </div>

                      </div>
                    </div>




                </div>
              </div>
            </div>
          </div>


        </section>
        <!--------------------------------------------- GESTION DES UTILISATER ---------------------------------------------------------->

        <section id="user" class="flex flex-col items-center bg-gray-50 min-h-screen p-6 hidden">
          <!-- Header -->
          <div class="w-full max-w-7xl bg-white shadow-lg rounded-lg p-6 space-y-6">
            <div class="flex justify-between items-center">
              <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                Gestion des Utilisateurs
              </h1>
              <div class="flex gap-4">
                <button class="flex items-center gap-2 px-5 py-2 bg-gray-200 text-gray-600 text-sm font-medium rounded-lg shadow hover:bg-gray-300 transition transform hover:scale-105">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" />
                  </svg>
                  Filtrer par Statut
                </button>
                <button class="flex items-center gap-2 px-5 py-2 bg-gray-200 text-gray-600 text-sm font-medium rounded-lg shadow hover:bg-gray-300 transition transform hover:scale-105">
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6" />
                  </svg>
                  Filtrer par Rôle
                </button>
              </div>
            </div>

            <!-- Table -->
            <div class="font-[sans-serif] overflow-x-auto">
              <table class="min-w-full bg-white">
              <thead class="whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-sm font-semibold text-black">
                            ID
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-black">
                            Name
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-black">
                            Email
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-black">
                            Role
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-black">
                            Status
                        </th>
                        <th class="p-4 text-left text-sm font-semibold text-black">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="whitespace-nowrap">
                    <?php if(isset($users) && !empty($users)): ?>
                        <?php foreach($users as $user): ?>
                            <tr class="odd:bg-gray-100">
                                <td class="p-4 text-md font-bold">
                                    <?= htmlspecialchars($user['id']) ?>
                                </td>
                                <td class="p-4 text-sm">
                                    <div class="flex items-center cursor-pointer w-max">
                                        <img src='https://readymadeui.com/profile_4.webp' class="w-9 h-9 rounded-full shrink-0" />
                                        <div class="ml-4">
                                            <p class="text-sm text-black"><?= htmlspecialchars($user['nom']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-black">
                                    <?= htmlspecialchars($user['email']) ?>
                                </td>
                                <td class="p-4 text-sm text-black">
                                    <span class="px-3 py-1 rounded-full <?= $user['role'] === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' ?>">
                                        <?= htmlspecialchars($user['role']) ?>
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-black">
                                    <form action="/update-status" method="POST">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <select name="status" onchange="this.form.submit()" class="mt-1 block w-full p-2 border rounded-md bg-white text-gray-700 focus:ring focus:ring-sky-300">
                                            <option value="active" <?= $user['status'] === 'active' ? 'selected' : '' ?>>
                                                Active
                                            </option>
                                            <option value="inactive" <?= $user['status'] === 'inactive' ? 'selected' : '' ?>>
                                                Inactive
                                            </option>
                                            <option value="pending" <?= $user['status'] === 'pending' ? 'selected' : '' ?>>
                                                En attente
                                            </option>
                                            <option value="suspendu" <?= $user['status'] === 'suspendu' ? 'selected' : '' ?>>
                                                Bloqué
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td class="p-4">
                                    <form action="/delete-user" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <button type="submit" name="delete" class="px-4 py-2 flex items-center justify-center rounded text-white text-sm tracking-wider font-medium border-none outline-none bg-red-600 hover:bg-red-700 active:bg-red-600">
                                            <span class="border-r border-white pr-3">Delete</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11px" fill="currentColor" class="ml-3 inline" viewBox="0 0 320.591 320.591">
                                                <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000" />
                                                <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">Aucun utilisateur trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>

        <!----------------------------------------------- GESTION DES CONTENU ----------------------------------------------------------->

      </section>
    </div>
  </div>





  <script>
    // let dashboardBtn = document.getElementById("dashboardBtn");
    // let dashboard = document.getElementById("dashboard");
    // let user = document.getElementById("user");
    // let userBtn = document.getElementById("userBtn");
    // let Game = document.getElementById("Game");
    // let GameBtn = document.getElementById("GameBtn");


    // dashboardBtn.addEventListener("click", () => {

    //   dashboard.style.display = "flex";
    //   user.style.display = "none";
    //   Game.style.display = "none";

    // });


    // userBtn.addEventListener("click", () => {

    //   user.style.display = "flex";
    //   dashboard.style.display = "none";
    //   Game.style.display = "none";

    // });

    // GameBtn.addEventListener("click", () => {

    //   Game.style.display = "flex";
    //   dashboard.style.display = "none";
    //   user.style.display = "none";

    // });

    // userBtn.addEventListener("click", () => {

    //   user.style.display = "flex";
    //   dashboard.style.display = "none";
    //   Game.style.display = "none";

    // });

    let artcile = document.querySelector(".artcile");

    let ajoutModalArticle = document.getElementById("ajoutModalArticle");
    let ajoutBtn = document.getElementById("ajoutBtn");
    let clsoe1 = document.getElementById("close1");

    ajoutBtn.addEventListener("click", () => {

      ajoutModalArticle.classList.remove("hidden");
      ajoutModalArticle.classList.add("flex");

    });


    close1.addEventListener("click", () => {

      ajoutModalArticle.classList.remove("flex");
      ajoutModalArticle.classList.add("hidden");

    });
  </script>

</body>

</html>