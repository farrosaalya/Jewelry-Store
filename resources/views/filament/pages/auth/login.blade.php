@php
    $hasLogo = true;
@endphp

<x-filament-panels::page.simple>
    <div class="w-full flex flex-col items-center justify-center min-h-screen">
        <div class="w-full max-w-md space-y-8 px-4">
            <div class="text-center space-y-2">
                <h2 class="text-3xl font-playfair font-semibold tracking-tight text-gold-400">
                    Jewelry Store
                </h2>
                <p class="text-sm font-medium text-white/60">
                    Admin Dashboard
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-navy-900/50 to-navy-800/50 rounded-2xl backdrop-blur-sm"></div>
                
                <div class="relative bg-white/5 rounded-2xl border border-white/10 shadow-2xl p-8">
                    <div class="space-y-4">
                        <div class="text-center">
                            <h2 class="text-xl font-medium tracking-tight text-white">
                                Welcome Back
                            </h2>
                            <p class="mt-2 text-sm text-white/60">
                                Please sign in to your account
                            </p>
                        </div>
                        
                        <form wire:submit.prevent="authenticate" class="space-y-6">
                            {{ $this->form }}

                            <x-filament::button 
                                type="submit"
                                class="w-full bg-gold-400 hover:bg-gold-500 text-navy-900 font-medium"
                            >
                                Sign in
                            </x-filament::button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <p class="text-sm text-white/50">
                    &copy; {{ date('Y') }} Jewelry Store. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</x-filament-panels::page.simple>

@push('styles')
<style>
    body {
        @apply bg-gradient-to-br from-navy-900 to-navy-800;
    }

    .fi-simple-layout {
        @apply min-h-screen bg-none;
    }

    .fi-simple-main {
        @apply p-0;
    }

    .fi-input-wrp {
        @apply bg-white/5 border-white/10 rounded-lg transition-colors duration-200 !important;
    }

    .fi-input-wrp:focus-within {
        @apply border-gold-400/50 ring-1 ring-gold-400/20 !important;
    }

    .fi-input {
        @apply bg-transparent text-white placeholder-white/30 !important;
    }

    .fi-input:focus {
        @apply ring-0 !important;
    }

    .fi-label {
        @apply text-white/70 font-medium !important;
    }

    .fi-password-input-suffix {
        @apply text-white/50 hover:text-white/70 transition-colors duration-200 !important;
    }

    /* Checkbox styling */
    .fi-checkbox-input {
        @apply text-gold-400 border-white/20 bg-white/5 !important;
    }

    .fi-checkbox-label {
        @apply text-white/70 !important;
    }
</style>
@endpush 