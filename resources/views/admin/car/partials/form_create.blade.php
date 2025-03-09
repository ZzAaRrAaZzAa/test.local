<section>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.car.store') }}">
        @csrf

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg grid grid-cols-1" x-data>
            <!-- brand model year price -->
            <div class="mt-4 mx-4 flex gap-4">
                <div class="w-1/4">
                    <x-inputs.label-input for="brand" :value="__('Brand')" />
                    <x-inputs.text-input id="brand" class="block mt-1 w-full" type="text" name="brand" required autofocus autocomplete="brand" />
                    <x-inputs.error-input :messages="$errors->get('brand')" class="mt-2" />
                </div>
            
                <div class="w-1/4">
                    <x-inputs.label-input for="model" :value="__('Model')" />
                    <x-inputs.text-input id="model" class="block mt-1 w-full" type="text" name="model" required autofocus autocomplete="model" />
                    <x-inputs.error-input :messages="$errors->get('model')" class="mt-2" />    
                </div>
                <div class="w-1/4">
                    <x-inputs.label-input for="year" :value="__('Year')" />
                    <x-inputs.text-input id="year" class="block mt-1 w-full" type="text" name="year" required autofocus autocomplete="year" />
                    <x-inputs.error-input :messages="$errors->get('year')" class="mt-2" />    
                </div>
                <div class="w-1/4">
                    <x-inputs.label-input for="price" :value="__('Price')" />
                    <x-inputs.text-input id="price" class="block mt-1 w-full" type="text" name="price" required autofocus autocomplete="price" />
                    <x-inputs.error-input :messages="$errors->get('price')" class="mt-2" />    
                </div>
            </div>

            <!-- Description -->
            <div class="mt-4 mx-4">
                <x-inputs.label-input for="description" :value="__('Description')" />
                <textarea placeholder="..." id="description" name="description" required autofocus autocomplete="description" class="block mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-4 h-32 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"></textarea>
                <x-inputs.error-input :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
        
        <!-- File Input -->
        <input type="file" name="images[]" multiple class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300" />

        <div class="flex items-center justify-center mt-4">
            <x-buttons.primary-button class="ms-4">
                {{ __('Create') }}
            </x-buttons.primary-button>
        </div>
    </form>
</section>
