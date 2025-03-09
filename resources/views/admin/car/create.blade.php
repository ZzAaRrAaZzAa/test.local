<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create car:') }}
        </h2>
    </x-slot>
    <div class="pb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Include Card -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xll">
                
                    @include('admin.car.partials.form_create')
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
