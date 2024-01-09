<form method="POST" action="{{ route('guest-confirmation') }}">
    @csrf
    <!-- code -->            
    <x-input-label for="code" :value="__('Codul invitatiei')" />
        <x-text-input id="code" class="block mt-1 w-full" type="number" name="code" :value="old('code')" min=0 required autofocus autocomplete="code" />
        <x-input-error :messages="$errors->get('code')" class="mt-2" />
    <!-- Nume -->
    <div>
        <x-input-label for="name" :value="__('Nume')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- confirmation -->
    <x-input-label for="confirmation" :value="__('Confirmari')" />
        <select id="confirmation" required class="block mt-1 w-full" name="confirmation">
            <option value="da">DA</option>
            <option value="nu">NU</option>
        </select>
    <x-input-error :messages="$errors->get('confirmation')" class="mt-2" />

    <!-- food_preferences -->
    <div>
        <x-input-label for="food_preferences" :value="__('Food_preferences')" />
        <textarea id="food_preferences" class="block mt-1 w-full" type="text" name="food_preferences" :value="old('food_preferences')" autofocus autocomplete="food_preferences"></textarea>
        <x-input-error :messages="$errors->get('food_preferences')" class="mt-2" />
    </div>

    <!-- Need accommodation -->
    <x-input-label for="need_accommodation" :value="__('Aveti nevoie de cazare')" />
        <select id="type" required class="block mt-1 w-full" name="need_accommodation">
            <option value="1">DA</option>
            <option value="0">NU</option>
        </select>
    <x-input-error :messages="$errors->get('type')" class="mt-2" />

        <!-- adults_number -->
        <div>
        <x-input-label for="adults_number" :value="__('Numarul_adultilor')" />
        <x-text-input id="adults_number" required class="block mt-1 w-full" type="number" min=0 step="1" name="adults_number" :value=0 required autofocus autocomplete="adults_number" />
        <x-input-error :messages="$errors->get('adults_number')" class="mt-2" />
    </div>
        <!-- kids_number -->
        <div>
        <x-input-label for="kids_number" :value="__('Numarul_copiilor')" />
        <x-text-input id="kids_number" required class="block mt-1 w-full" type="number" min=0 step="1" name="kids_number" :value=0 required autofocus autocomplete="kids_number" />
        <x-input-error :messages="$errors->get('kids_number')" class="mt-2" />
    </div>
    
    <div>
        <x-primary-button class="ms-4">
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>
