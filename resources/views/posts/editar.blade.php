<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Notícia') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-2">

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="text-right">
                <div class="inline-flex mb-2">
                    <div class="flex mx-1 inline">
                        <form method="POST" action="{{ route('status') }}">
                            @csrf
                            <input type="hidden" name="status" value="{{ $post->id }}">
                            <button type="submit" class="py-2 px-4 text-center {{ $post->status === 1 ? 'bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2' : 'bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2'}}  rounded-lg ">
                                @if($post->status ===1)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Online
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Offline
                                @endif
                            </button>
                        </form>
                    </div>
                    <div class="flex mx-1 inline">
                        <form method="POST" action="{{ route('destak') }}">
                            @csrf
                            <input type="hidden" name="destak" value="{{ $post->id }}">
                            <button type="submit" class="py-2 px-4 inline {{ $post->destak === 0 ? 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200' : 'bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200' }} text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                @if($post->destak ===1)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @endif
                                Destaque
                            </button>
                        </form>
                    </div>
                    <div class="flex mx-1 inline">
                        <form method="POST" action="#">
                            @csrf
                            <input type="hidden" name="status" value="{{ $post->id }}">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Anexos
                            </button>
                        </form>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex mx-1 inline">
                        <button type="button" onclick="toggleModal('modal-id')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Excluir
                        </button>
                    </div>
                    <div class="flex ml-9 inline">
                        <button form="editar_post" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
                <p class="font-bold">
                    {{ $message }}
                </p>
            </div>
            @endif
            <form id="editar_post" action="{{ route('editar',['id'=> $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="{{ $post->type }}">

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="flex">
                                <div class="w-full lg:w-1/2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
                                    <input type="text" name="title" id="title" required value="{{ $post->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="ml-5 w-1/3">
                                    <label for="posted_at" class="block text-sm font-medium text-gray-700">Data de Publicação:</label>
                                    <input type="datetime-local" name="posted_at" id="posted_at" value="{{ $post->posted_at }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-1/2">
                                    <label for="old_cover" class="block text-sm font-medium text-gray-700">Capa Atual:</label>
                                    <input type="hidden" name="old_cover" value="{{ $post->cover }}">
                                    <div class="flex flex-wrap">
                                        <div class="w-6/12 sm:w-4/12 px-4">
                                            <img src="{{ asset('storage/imagens/noticias/capas/'.$post->cover) }}" alt="..." class="shadow-lg rounded max-w-full h-auto align-middle border-none" />
                                        </div>
                                    </div>
                                </div>

                                <div class="ml-5 w-1/3">
                                    <label for="new_cover" class="block text-sm font-medium text-gray-700">Alteração de Capa:</label>
                                    <input type="file" name="new_cover" id="new_cover" accept="image/*" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo:</label>
                                <textarea name="content" id="content" rows="25" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                {{ $post->content }}
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

<!--modal para deletar notícia -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Deletar Notícia
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Você tem certeza que deseja excluir esta notícia? Todos os dados serão excluído. Essa ação não pode ser desfeita.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <form action="{{ route('excluir',['id' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Excluir
                    </button>
                </form>
                <button type="button" onclick="toggleModal('modal-id')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<script type="text/javascript">
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
</script>