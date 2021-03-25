@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $movie['poster_path'] }}" alt="parasite" class="w-64 md:w-96">
                <span class="ml-1 text-gray-400">{{ 'Length: ' . $movie['runtime'] . 'mins' }}</span>
            </div>
            
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400">
                    <svg class="fill-current text-yellow-500 w-6" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M0 0h24v24H0z" fill="none"/><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span> 
                    <span>
                        {{ $movie['genres'] }}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}    
                </p>
                <br>
                <div class="mt12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex flex-col md:flex-row mt-4">
                        
                            @foreach ($movie['crew'] as $crew)
                                <div class="mr-8 "> 
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endforeach


                            <div>
                                <p>Produced by </p>
                                @foreach ($movie['production_companies'] as $production)
                                    <div class="mr-8"> 
                                        <div class="text-gray-400">{{ $production['name'] }}</div>
                                    
                                    </div>    
                                @endforeach
                            </div>

                            <div>
                                <p class="mr-8">Languages </p>
                                @foreach ($movie['spoken_languages'] as $lang)
                                    <div class="mr-8"> 
                                        <div class="text-gray-400">{{ $lang['english_name'] }}</div>
                                    </div>   
                                @endforeach
                            </div>
                            
                            <div>
                                
                                <p class="mr-8">Gross revenue</p>
                                @if ($movie['revenue'] > 0)
                                    <span class="text-gray-400">{{ number_format($movie['revenue'], 2) . 'USD' }}</span>
                                
                                @else
                                    <p class="ml-1 text-gray-400">not given</p>
                                @endif
                            </div>

                            
                            
                    </div>
                </div>


                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" 
                        class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 
                        transistion ease-in-out duration-150">
                        <?xml version="1.0"?><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"></path></svg>
                        <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif

                {{-- below is the code to play the your video right on the app
                    I didnt have time to get the alpine js working for this
                    fix it soon...right now the video will link our to a youtube video --}}
                {{-- <div x-data="{ isOpen: false }">
                    @if (count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>

                        <template x-if="isOpen">
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isOpen = false"
                                                @keydown.escape.window="isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endif


                </div> --}}
                

                
                
                

                
            </div>
        </div>
        
    </div><!-- end movie info -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h1 class="text-4xl font-semibold">Cast</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                
                @foreach ($movie['cast'] as $cast)
                        <div class="mt-8">
                            <a href="{{ route('actors.show', $cast['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="cast member" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="text-gray-400 text-sm">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div><!-- end movie Cast -->

    <div class="movie-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images'] as $image)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end movie-images -->
@endsection