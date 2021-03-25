@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="w-64 md:w-96">
                <span class="ml-1 text-gray-400">{{ 'Length: ' . $movie['runtime'] . 'mins' }}</span>
            </div>
            
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400">
                    <svg class="fill-current text-yellow-500 w-6" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M0 0h24v24H0z" fill="none"/><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ 'Released: ' . \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span> 
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last),@endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}    
                </p>
                <br>
                <div class="mt12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex flex-col md:flex-row mt-4">
                        
                            @foreach ($movie['credits']['crew'] as $crew)
                                @if($loop->index < 2)
                                    <div class="mr-8 "> 
                                        <div>{{ $crew['name'] }}</div>
                                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                    </div>
                                    
                                @else
                                    @break
                                @endif
                            @endforeach


                            <div>
                                <p>Produced by </p>
                                @foreach ($movie['production_companies'] as $production)
                                    @if($loop->index < 5)
                                        <div class="mr-8"> 
                                            <div class="text-gray-400">{{ $production['name'] }}</div>
                                        
                                        </div>    
                                    @else
                                        @break
                                    @endif
                                @endforeach
                            </div>

                            <div>
                                <p class="mr-8">Languages </p>
                                @foreach ($movie['spoken_languages'] as $lang)
                                    @if($loop->index < 5)
                                        <div class="mr-8"> 
                                            <div class="text-gray-400">{{ $lang['english_name'] }}</div>
                                        </div>    
                                    @else
                                        @break
                                    @endif
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

                
            </div>
        </div>
        
    </div><!-- end movie info -->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h1 class="text-4xl font-semibold">Cast</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="cast member" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="text-gray-400 text-sm">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div><!-- end movie Cast -->

    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h1 class="text-4xl font-semibold">Images</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-8">
                        <a href="#">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="image" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        </div>
                    @else
                        @break    
                    @endif
                @endforeach
                
                
            </div>
        </div>
    </div><!-- end movie images -->

@endsection