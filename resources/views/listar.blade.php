<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários Cadastrados') }}
        </h2>
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

                        @if ($usuario->isEmpty())
                        <p>Nenhum usuário cadastrado!</p>
                        @else

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text font-medium text-gray-500 uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text font-medium text-gray-500 uppercase tracking-wider">
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($usuario as $usuarios)
                                <tr>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex">
                                            <div class="">
                                                <div class="text text-center font-medium text-gray-900">
                                                    {{ $usuarios->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap">
                                        <div class="text text-gray-900">
                                            {{ $usuarios->nome }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap text-center text-sm font-medium">
                                        <div class="inline-flex">
                                            <div class="flex mx-1">
                                                <form method="get" action="usuario/{{ $usuarios->id }}">
                                                    <button type="submit" class="py-2 px-4  bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                        Detalhes
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="flex mx-1">
                                                <form method="get" action="editar/{{ $usuarios->id }}">
                                                    <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                        Editar
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="flex mx-1">
                                                <form method="get" action="excluir/{{ $usuarios->id }}">
                                                    <button type="submit" class="py-2 px-4  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-sm text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
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
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $usuario->onEachSide(4)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>