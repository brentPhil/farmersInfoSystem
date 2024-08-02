<main class="flex flex-col items-center flex-1 px-4 pt-6 sm:justify-center">
    <div>
        <a href="/">
            <x-application-logo class="w-20 h-20" />
        </a>
    </div>

    <div class="w-full px-6 py-4 my-6 overflow-hidden bg-white/30 rounded-md shadow-md sm:max-w-md dark:bg-dark-eval-1/40"
         style="border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(13.7px);
                -webkit-backdrop-filter: blur(13.7px);
                border: 1px solid rgba(255, 255, 255, 0.31);
                ">
        {{ $slot }}
    </div>
</main>
