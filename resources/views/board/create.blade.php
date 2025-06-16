<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Create Board') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Pass Title Board to create") }}
                        </p>

                        <div class="mt-6">
                            <form method="post" action="{{ route('board.store') }}" class="space-y-6">
                                @csrf
                                <div>
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>