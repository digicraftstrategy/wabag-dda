<div
    id="orchid-loader"
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-black transition-opacity duration-500"
>
    <!-- Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-black"></div>
        <div class="absolute inset-0 orchid-loader-diagonal"></div>
    </div>

    <!-- Loader -->
    <div class="relative flex flex-col items-center justify-center">
        <div class="relative w-36 h-36 orchid-bloom-loader">
            <!-- Top yellow petal -->
            <div class="orchid-petal orchid-top absolute left-1/2 top-2 w-14 h-24 -translate-x-1/2"></div>

            <!-- Bottom left yellow petal -->
            <div class="orchid-petal orchid-bottom-left absolute left-[28px] top-[58px] w-14 h-24"></div>

            <!-- Bottom right yellow petal -->
            <div class="orchid-petal orchid-bottom-right absolute right-[28px] top-[58px] w-14 h-24"></div>

            <!-- Left white petal -->
            <div class="orchid-petal orchid-left absolute left-[18px] top-[44px] w-16 h-12"></div>

            <!-- Right white petal -->
            <div class="orchid-petal orchid-right absolute right-[18px] top-[44px] w-16 h-12"></div>

            <!-- Center emblem -->
            <div class="orchid-center absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <div class="relative flex flex-col items-center">
                    <div class="flex gap-[2px] mb-1">
                        <span class="block w-4 h-7 bg-white rounded-full border-2 border-gray-800 rotate-[-18deg]"></span>
                        <span class="block w-4 h-7 bg-white rounded-full border-2 border-gray-800"></span>
                        <span class="block w-4 h-7 bg-white rounded-full border-2 border-gray-800 rotate-[18deg]"></span>
                    </div>

                    <div class="w-5 h-5 bg-white border-2 border-gray-800 rounded-full -mt-2"></div>

                    <div class="mt-1 w-7 h-9 bg-white border-2 border-gray-800 rounded-b-[18px] rounded-t-[10px] rotate-45 relative">
                        <div class="absolute inset-1 rounded-full border border-dotted border-gray-500 rotate-[-45deg]"></div>
                    </div>
                </div>
            </div>
        </div>

        <p class="mt-5 text-sm tracking-[0.28em] uppercase text-white/80">
            Loading
        </p>
    </div>
</div>