<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="card text-bg-info mb-3">
                        <div class="card-header">{{ $publicacion->user->name }}</div>
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $publicacion->titulo }}</b></h5>
                            <p class="card-text">{{ $publicacion->detalle }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Archivos</div>
                        <div class="card-body">
                            {{ $publicacion->multimedia }}
                            {{-- // $post = Post::find(1);
                            // foreach ($post->tags as $tag) {
                            //     // ...
                            // } --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>