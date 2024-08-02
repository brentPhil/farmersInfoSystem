<div class="px-3">
    <!-- Toggle button -->

    <div class="w-full flex justify-end">
        <x-button
            type="button"
            icon-only
            sr-text="Toggle sidebar"
            variant="secondary"
            x-show="isSidebarOpen || isSidebarHovered"
            x-on:click="isSidebarOpen = !isSidebarOpen"
        >
            <x-icons.menu-fold-right
                x-show="!isSidebarOpen"
                aria-hidden="true"
                class="hidden w-6 h-6 lg:block"
            />

            <x-icons.menu-fold-left
                x-show="isSidebarOpen"
                aria-hidden="true"
                class="hidden w-6 h-6 lg:block"
            />

            <x-heroicon-o-x
                aria-hidden="true"
                class="w-6 h-6 lg:hidden"
            />
        </x-button>
    </div>

    <!-- Logo -->
    <div class="w-full text-center">
        <a
            href="{{ route('dashboard') }}"
            class="inline-flex w-10 items-center"
            :class="{'w-28': isSidebarOpen || isSidebarHovered,}"
        >
            <x-application-logo aria-hidden="true" />

            <span class="sr-only">Dashboard</span>
        </a>
        <h5 class="font-bold" x-show="open && (isSidebarOpen || isSidebarHovered)">
            Municipal Agriculture Office
        </h5>
    </div>

</div>
