<script src="{{ asset('js/slider.js') }}"></script>

<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="lg:-mx-6 lg:flex lg:items-center">
                <div class="relative lg:w-1/2 lg:mx-6 w-full h-96 rounded-lg lg:h-[36rem] overflow-hidden">
                    <!-- Wrapper для слайдера -->
                    <div class="relative w-full h-full">
                        @foreach ($car->photos as $index => $photo)
                            <img src="{{ asset('storage/photos/' . $photo->photo_path) }}" 
                                 alt="Car Image" 
                                 class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" 
                                 data-index="{{ $index }}">
                        @endforeach
                    </div>

                    <!-- Navigation buttons -->
                </div>

                <div class="mt-8 lg:w-1/2 lg:px-6 lg:mt-0">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white lg:text-3xl lg:w-96">
                        {{ $car->brand .' '. $car->model }}
                    </h1>
                    <p class="text-2xl font-semibold text-blue-500">{{ 'Year: '.$car->year }}</p>
                    <p class="max-w-lg mt-6 text-gray-500 dark:text-gray-400">
                        @php
                            $chunkSize = 100;
                            $text = $car->description;
                            $formattedText = wordwrap($text, $chunkSize, true);
                        @endphp
                        {!! nl2br(e($formattedText)) !!}
                    </p>

                    <h3 class="mt-6 text-lg font-medium text-blue-500">{{ 'Price: '.$car->price ."$"}}</h3>

                    <div class="flex items-center justify-between mt-12 lg:justify-start">
                        <button title="left arrow" id="prev" class="p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <button title="right arrow" id="next" class="p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:mx-6 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
