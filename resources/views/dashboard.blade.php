<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div> --}}
            <div class="grid lg:grid-cols-3 gap-4">

                <div class="card card-body flex items-center">
                    <div class="flex-1">
                        <div class="card-header__title mb-2">Current Target</div>
                        <div class="text-2xl">$12,920</div>
                        <div class="flex items-center text-sm font-semibold text-success">31.5% <i class="material-icons"
                                style="font-size:16px;">arrow_upward</i></div>
                    </div>
                    <div><i class="material-icons text-primary ml-3" style="font-size:48px;">gps_fixed</i></div>
                </div>
                <div class="card card-body flex items-center">
                    <div class="flex-1">
                        <div class="card-header__title mb-2">Earnings</div>
                        <div class="text-2xl">$3,642</div>
                        <div class="flex items-center text-sm font-semibold text-success">51.5% <i
                                class="material-icons" style="font-size:16px;">arrow_upward</i></div>
                    </div>
                    <div><i class="material-icons text-success ml-3" style="font-size:48px;">monetization_on</i></div>
                </div>
                <div class="card card-body flex items-center">
                    <div class="flex-1">
                        <div class="card-header__title mb-2">Website Traffic</div>
                        <div class="text-2xl">8,391</div>
                        <div class="flex items-center text-sm font-semibold text-danger">3.5% <i class="material-icons"
                                style="font-size:16px;">arrow_downward</i></div>
                    </div>
                    <div><i class="material-icons text-secondary ml-3" style="font-size:48px;">perm_identity</i></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
