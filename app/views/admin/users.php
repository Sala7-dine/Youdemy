<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
    <div class="flex items-start">

      <?php include __DIR__ . "/../layouts/sidebar.php"; ?>

      <section class="main-content w-full px-8">

        <?php include __DIR__ . "/../layouts/dashboardHeader.php"; ?>

        <!--------------------------------------------- GESTION DES UTILISATER ---------------------------------------------------------->

        <section id="user" class="flex flex-col items-center bg-gray-50 min-h-screen p-6">
          <!-- Header -->
          <div class="w-full max-w-7xl bg-white shadow-sm rounded-lg p-6 space-y-6">
            <div class="flex justify-between items-center">
              <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                Gestion des Utilisateurs
              </h1>
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
                            Username
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
                                        <!-- <img src='https://readymadeui.com/profile_4.webp' class="w-9 h-9 rounded-full shrink-0" /> -->
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


</body>

</html>