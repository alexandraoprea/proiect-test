<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Button1') }}
        </h2>
    </x-slot>
    <div class="form-container">
        <form method="POST" action="{{ route('save-products') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!-- Need accommodation -->
            <div>
                <x-input-label for="need_accommodation" :value="__('Need accommodation')" />
                <input type="checkbox" id="need_accommodation" name="need_accommodation" value=1>
                <x-input-error :messages="$errors->get('need_accommodation')" class="mt-2" />
            </div>
            <!-- Expired At -->
             <div>
                <x-input-label for="expired_at" :value="__('Expired At')" />
                <input type="datetime-local" id="expired_at" name="expired_at" required>
                <x-input-error :messages="$errors->get('expired_at')" class="mt-2" />
            </div>
            <!-- Price -->
            <div>
                <x-input-label for="price" :value="__('Price (lei)')" />
                <x-text-input id="price" required class="block mt-1 w-full" type="number" min=0 step="0.01" name="price" :value=0 required autofocus autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <!-- Quantity -->
            <div>
                <x-input-label for="quantity" :value="__('Quantity')" />
                <x-text-input id="quantity" required class="block mt-1 w-full" type="number" min=0 step="1" name="quantity" :value=0 required autofocus autocomplete="quantity" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <!-- Type -->
            <div>
                <x-input-label for="type" :value="__('Type')" />
                <select id="type" required class="block mt-1 w-full" name="type">
                    <option value="type1">Type 1 </option>
                    <option value="type2">Type 2 </option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="ms-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
