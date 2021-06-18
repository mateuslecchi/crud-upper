<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Post') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-2">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('salvar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Salvar
                    </button>
                </div>
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="w-full md:w-1/2">
                                <label for="type" class="block text-sm font-medium text-gray-700">Tipo de publicação:</label>
                                <select name="type" id="type" required autofocus class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="0" selected disabled hidden>Escolha o tipo :)</option>
                                    <option value="1">Notícia</option>
                                    <option value="2">Decreto</option>
                                    <option value="3">Lei</option>
                                    <option value="4">Comunicado</option>
                                </select>
                            </div>

                            <div class="w-full lg:w-1/2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
                                <input type="text" name="title" id="title" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="w-1/2">
                                <label for="cover" class="block text-sm font-medium text-gray-700">Capa:</label>
                                <input type="file" name="cover" id="cover" accept="image/*" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="">
                                <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo:</label>
                                <textarea name="content" id="content" rows="25" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    Insira o conteúdo aqui.
                                </textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @include('components.tinymce')
</x-app-layout>