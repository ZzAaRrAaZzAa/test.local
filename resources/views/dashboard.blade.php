<x-app-layout>
    <x-slot name="header">
    </x-slot>
    
    <section class="container px-4 mx-auto">
        <div class="flex justify-between items-center gap-x-3">
            <div>
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Your Cars</h2>
            </div>
        </div>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-4 gap-y-3 my-6">
            @foreach ($cars as $car)
                <div class="relative w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
                    <!-- SHOW Button -->
                    <a href="{{ route('cars.show', ['id' => $car->id]) }}"
                        class="absolute top-2 right-2 px-3 py-1 text-sm font-semibold text-white bg-blue-500 rounded hover:bg-blue-600 transition-colors">
                        SHOW
                    </a>
                    
                    <div>
                        <a class="mt-2 text-lg font-semibold text-gray-800 dark:text-white block">{{ $car->brand . ' ' . $car->model }}</a>
                        <a class="mt-2 text-lg font-semibold text-gray-800 dark:text-white block">{{ $car->price }}$</a>
                    </div>
                </div>
            @endforeach
        </section>
    </section>
</x-app-layout>
