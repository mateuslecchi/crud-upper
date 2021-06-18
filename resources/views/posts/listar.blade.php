<x-app-layout>
    <x-slot name="header">
        <div class="flex ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Publicações Efetuadas') }}
            </h2>
            @include('components.nav-posts')
        </div>
    </x-slot>

    <div class="container mx-auto my-2">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">


                        @if ($message = Session::get('success'))
                        <div class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4" role="alert">
                            <p class="font-bold">
                                {{ $message }}
                            </p>
                        </div>
                        @endif

                        @if ($posts->isEmpty())
                        <p class="px-6 py-3 text-left text font-medium tracking-wider">Nenhum post cadastrado!</p>
                        @else

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text font-medium text-gray-500 uppercase tracking-wider">
                                        Título
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text font-medium text-gray-500 uppercase tracking-wider">
                                        Publicado em:
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text font-medium text-gray-500 uppercase tracking-wider">
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex">
                                            <div class="">
                                                <div class="text text-center font-medium text-gray-900">
                                                    {{ $post->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="text text-gray-900">
                                            {{ $post->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <form method="POST" action="{{ route('status') }}">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ $post->id }}">
                                            <button type="submit" class="py-2 px-4 text-center {{ $post->status === 1 ? 'bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2' : 'bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2'}}  rounded-lg ">
                                                {{ $post->status === 1 ? 'Online' : 'Offline'}}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="text text-gray-900">
                                            {{ $post->posted_at }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="inline-flex">
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
                                            <div class="flex mx-1">
                                                <form method="get" action="post/editar/{{ $post->id }}">
                                                    <button type="submit" class="py-2 px-4 inline bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                        Editar
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="flex mx-1">
                                                <form method="get" action="excluir/{{ $post->id }}">
                                                    <button type="submit" class="py-2 px-4 inline bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $posts->onEachSide(0)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>