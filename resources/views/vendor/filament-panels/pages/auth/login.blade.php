{{-- <div class="fi-simple-main-ctn"> --}}
    <x-filament-panels::page.simple>
        <div class="flex justify-center mb-0 mt-0">
            <img src="{{ asset('images/logo/flag.png') }}" alt="Wabag DDA Logo" class="h-16">
        </div>
        <div class="heading">
            <h1 class="text-3xl mt-0 font-bold text-center text-white">
                WABAG DISTRICT
            </h1>
            <p class="text-center text-gray-300 text-md mt-1">
                Development Authority
            </p>
        </div>

        @if (filament()->hasRegistration())
            <x-slot name="subheading">
                {{ __('filament-panels::pages/auth/login.actions.register.before') }}

                {{ $this->registerAction }}
            </x-slot>
        @endif

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

        {{-- <x-filament-panels::form id="form" wire:submit="authenticate">
            {{ $this->form }}

            <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament-panels::form> --}}
        <form
            method="POST"
            wire:submit.prevent="authenticate"
            x-data="{ isProcessing: false }"
            x-on:submit="if (isProcessing) $event.preventDefault()"
            x-on:form-processing-started="isProcessing = true"
            x-on:form-processing-finished="isProcessing = false"
            class="fi-form grid gap-y-6 bg-[#0329248d] border-0 border-gray-200 rounded-xl p-6 shadow-inner shadow-green-500/20 transition-all"
        >
            {{ $this->form }}

            <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </form>

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
        <div class="mt-2 text-center">
            <div class="hidden lg:block mb-6">
                    <p class="text-sm text-orange-600 font-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        Admin panel access is restricted to authorized users only.
                    </p>
                </div>

            <a
                href="/"
                class="inline-flex mb-4 items-center justify-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
            >
                <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Website
            </a>
        </div>
        <style>
        /* .fi-fo-field-wrp-label{
            color: #f1f1f1; /* Light gray 
        } */

        .fi-btn {
            background-color: #065f46; /* Dark green */
            color: white;
        }

        .fi-btn:hover {
            background-color: #047857;
        }
    </style>

    </x-filament-panels::page.simple>
{{-- </div> --}}

