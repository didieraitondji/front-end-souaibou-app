<nav
    id="nav-bar"
    class="w-[90%] mx-auto font-poppins px-2 flex items-center justify-between h-full">
    <a href="/" class="flex items-center">
        <img
            src="/assets/images/logo.png"
            alt="SOUAÏBOU DIST"
            class="w-[60px] p-2 rounded-full" />
        <span class="font-bold text-blue text-2xl ml-3 border-b-8 border-blue">SOUAÏBOU DIST</span>
    </a>

    <ul class="md:hidden sm:hidden lg:flex gap-6 items-center">
        <li class="relative mx-3">
            <a href="/">Accueil </a>
            <span
                class="flex absolute h-0.5 w-full bg-gradient-to-r from-red-700 to-orange-500">
            </span>
        </li>
        <li class="mx-3">
            <a href="/catalogue/" class="font-bold"> Catalogue de Boissons </a>
        </li>

        <li class="mx-2 text-2xl text-blue" id="">
            <a href="/profil/" title="Consulter Panier"><i class="fa-solid fa-cart-shopping"></i></i></a>
        </li>
        <li class="mx-2 text-3xl text-blue hidden" id="connecter">
            <a href="/profil/" title="Consulter Profil"><i class="fa-regular fa-circle-user"></i></a>
        </li>
        <li class="mx-2" id="se_connecter">
            <a
                href="/login/"
                class="rounded-md bg-green border border-green hover:bg-transparent hover:text-black py-2 px-4 text-white">Se connecter</a>
        </li>
        <li class="" id="creer_un_compte">
            <a
                href="/register/"
                class="rounded-md bg-blue border border-blue hover:bg-transparent hover:text-black py-2 px-4 text-white">Créer un Compte</a>
        </li>
    </ul>

    <div class="sm:flex md:flex lg:hidden mx-4">
        <button id="hamberger" class="text-3xl" aria-label="Menu hamberger">
            <i class="bx bx-menu text-black"></i>
        </button>
    </div>
</nav>