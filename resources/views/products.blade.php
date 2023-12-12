<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="content">
        <a href="/button1" class="btn btn-danger">Button1</a>
        <a href="/button2" class="btn btn-primary">Button2</a>
        <a href="/button3"  class="btn btn-secondary">Button3</a>
        <a href="/button4"  class="btn btn-secondary">Button4</a>
    </div>
</x-app-layout>
