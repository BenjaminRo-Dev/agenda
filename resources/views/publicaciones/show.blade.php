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
                    @if ($publicacion->multimedia->count() > 0)
                        
                        <div class="card text-bg-info">
                            <div class="card-header">Archivos</div>
                            <div class="row card-body m-1">
                                @foreach ($publicacion->multimedia as $file)
                                {{-- Si el archivo termina en jpg, png, jpeg, gif, svg, bmp, webp, se mostrará como imagen, de lo contrario se mostrará como un enlace para descargar el archivo. --}}
                                    @if (preg_match('/\.(jpg|png|jpeg|gif|svg|bmp|webp)$/i', $file->url))
                                        <div class="card col-sm-4 p-2">
                                            <div class="row-1">
                                                <img src="{{asset($file->url)}}" class="img-fluid rounded mx-auto d-block" style="height: 200px;">
                                                <a href="{{asset($file->url)}}" class="btn btn-primary" download><i class="bi bi-download"></i></a>
                                                <a href="{{asset($file->url)}}" class="btn btn-primary" target="_blank"><i class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                                    @elseif (preg_match('/\.(mp4)$/i', $file->url))
                                        <div class="card col-sm-4 p-2">
                                            <div class="row-2" >
                                                <img src="{{asset('images/video.png')}}" class="img-fluid rounded mx-auto d-block" style="height: 200px;">
                                                <a href="{{asset($file->url)}}" class="btn btn-primary" target="_blank"><i class="bi bi-play-circle"></i></a>
                                                <a href="{{asset($file->url)}}" class="btn btn-primary" download><i class="bi bi-download"></i></a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card col-sm-4 p-2">
                                            <div class="row-1" >
                                                <img src="{{asset('images/pdf.png')}}" class="img-fluid rounded mx-auto d-block" style="height: 200px;">
                                                <a href="{{asset($file->url)}}" class="btn btn-primary" download><i class="bi bi-download"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>