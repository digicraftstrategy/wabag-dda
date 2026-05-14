<div
    id="orchid-loader"
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-black transition-opacity duration-500"
>
    <!-- Diagonal brand background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-black"></div>
        <div class="absolute inset-0 orchid-diagonal"></div>
    </div>

    <!-- Loader content -->
    <div class="relative flex flex-col items-center justify-center">
        <div class="relative w-36 h-36 orchid-bloom">
            <!-- Top yellow petal -->
            <div class="orchid-petal orchid-top absolute left-1/2 top-3 w-14 h-24 -translate-x-1/2"></div>

            <!-- Bottom left yellow petal -->
            <div class="orchid-petal orchid-bottom-left absolute left-[26px] top-[58px] w-14 h-24"></div>

            <!-- Bottom right yellow petal -->
            <div class="orchid-petal orchid-bottom-right absolute right-[26px] top-[58px] w-14 h-24"></div>

            <!-- Left white petal -->
            <div class="orchid-petal orchid-left absolute left-[18px] top-[48px] w-16 h-12"></div>

            <!-- Right white petal -->
            <div class="orchid-petal orchid-right absolute right-[18px] top-[48px] w-16 h-12"></div>

            <!-- Center emblem -->
            <div class="orchid-center absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <div class="relative flex flex-col items-center">
                    <!-- Simple stylized knot -->
                    <div class="flex gap-1 mb-1">
                        <span class="block w-4 h-7 bg-white rounded-full border-2 border-gray-800 rotate-[-20deg]"></span>
                        <span class="block w-4 h-7 bg-white rounded-full border-2 border-gray-800"></span>
                        <span class="block w-4 h-7 bg-white rounded-full border-2 border-gray-800 rotate-[20deg]"></span>
                    </div>

                    <div class="w-5 h-5 bg-white border-2 border-gray-800 rounded-full -mt-2"></div>

                    <!-- Lower ornament -->
                    <div class="mt-1 w-7 h-9 bg-white border-2 border-gray-800 rounded-b-[18px] rounded-t-[10px] rotate-45 relative">
                        <div class="absolute inset-1 rounded-full border border-dotted border-gray-500 rotate-[-45deg]"></div>
                    </div>
                </div>
            </div>
        </div>

        <p class="mt-6 text-sm tracking-[0.3em] uppercase text-white/80">
            Loading
        </p>
    </div>
</div>

<style>
    .orchid-diagonal {
        background: linear-gradient(145deg, transparent 48%, #047857 48%);
    }

    .orchid-bloom {
        animation: orchidPulse 2.2s ease-in-out infinite;
    }

    .orchid-petal {
        opacity: 0;
        transform-origin: center;
    }

    .orchid-top {
        background: #facc15;
        clip-path: ellipse(38% 50% at 50% 50%);
        animation: bloomTop 2s ease-in-out infinite;
    }

    .orchid-bottom-left {
        background: #facc15;
        clip-path: ellipse(38% 50% at 50% 50%);
        transform: rotate(-35deg) scale(0.3);
        animation: bloomBottomLeft 2s ease-in-out infinite;
    }

    .orchid-bottom-right {
        background: #facc15;
        clip-path: ellipse(38% 50% at 50% 50%);
        transform: rotate(35deg) scale(0.3);
        animation: bloomBottomRight 2s ease-in-out infinite;
    }

    .orchid-left {
        background: #f8fafc;
        clip-path: ellipse(50% 40% at 50% 50%);
        transform: rotate(-18deg) scale(0.3);
        animation: bloomLeft 2s ease-in-out infinite;
    }

    .orchid-right {
        background: #f8fafc;
        clip-path: ellipse(50% 40% at 50% 50%);
        transform: rotate(18deg) scale(0.3);
        animation: bloomRight 2s ease-in-out infinite;
    }

    .orchid-center {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.4);
        animation: bloomCenter 2s ease-in-out infinite;
    }

    @keyframes bloomTop {
        0%, 8% {
            opacity: 0;
            transform: translateX(-50%) scale(0.2);
        }
        16%, 85% {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }
        100% {
            opacity: 0;
            transform: translateX(-50%) scale(0.8);
        }
    }

    @keyframes bloomBottomLeft {
        0%, 18% {
            opacity: 0;
            transform: rotate(-35deg) scale(0.2);
        }
        28%, 85% {
            opacity: 1;
            transform: rotate(-35deg) scale(1);
        }
        100% {
            opacity: 0;
            transform: rotate(-35deg) scale(0.8);
        }
    }

    @keyframes bloomBottomRight {
        0%, 28% {
            opacity: 0;
            transform: rotate(35deg) scale(0.2);
        }
        38%, 85% {
            opacity: 1;
            transform: rotate(35deg) scale(1);
        }
        100% {
            opacity: 0;
            transform: rotate(35deg) scale(0.8);
        }
    }

    @keyframes bloomLeft {
        0%, 38% {
            opacity: 0;
            transform: rotate(-18deg) scale(0.2);
        }
        48%, 85% {
            opacity: 1;
            transform: rotate(-18deg) scale(1);
        }
        100% {
            opacity: 0;
            transform: rotate(-18deg) scale(0.8);
        }
    }

    @keyframes bloomRight {
        0%, 48% {
            opacity: 0;
            transform: rotate(18deg) scale(0.2);
        }
        58%, 85% {
            opacity: 1;
            transform: rotate(18deg) scale(1);
        }
        100% {
            opacity: 0;
            transform: rotate(18deg) scale(0.8);
        }
    }

    @keyframes bloomCenter {
        0%, 58% {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.2);
        }
        70%, 88% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
        100% {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.85);
        }
    }

    @keyframes orchidPulse {
        0%, 70%, 100% {
            transform: scale(1);
        }
        80% {
            transform: scale(1.05);
        }
        90% {
            transform: scale(1.02);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('load', function () {
            const loader = document.getElementById('orchid-loader');

            if (loader) {
                loader.classList.add('opacity-0');

                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }
        });
    });
</script>