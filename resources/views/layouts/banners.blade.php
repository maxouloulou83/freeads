
@if (session('error'))
    <div class="relative bg-red-600" x-data="{ closedError: false }" x-show="!closedError">
        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="inline">
                        {{ session('error') }}
                    </span>
                </p>
            </div>
            <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">

                <button type="button" @click="closedError = true"
                        class="flex p-2 rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-500 transition ease-in-out duration-150"
                        aria-label="Dismiss">
                    <!-- Heroicon name: x -->
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif

@if (session('alert'))
    <div class="relative bg-orange-600" x-data="{ closedAlert: false }" x-show="!closedAlert">
        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="inline">
                        {{ session('alert') }}
                    </span>
                </p>
            </div>
            <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                <button type="button" @click="closedAlert = true"
                        class="flex p-2 rounded-md hover:bg-orange-500 focus:outline-none focus:bg-orange-500 transition ease-in-out duration-150"
                        aria-label="Dismiss">
                    <!-- Heroicon name: x -->
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="relative bg-green-600" x-data="{ success: false }" x-show="!success">
        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="inline">
                        {{ session('success') }}
                    </span>
                </p>
            </div>
            <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                <button type="button" @click="success = true"
                        class="flex p-2 rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-500 transition ease-in-out duration-150"
                        aria-label="Dismiss">
                    <!-- Heroicon name: x -->
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif
