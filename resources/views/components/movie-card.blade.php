<div>
    <div class="mt-8">
        <a href="{{ route('movies.show', $movie['id']) }}">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $movie['title'] }}</a>
            <div class="flex items-center text-gray-400 text-sm">
                <div class="flex items-center text-gray-400 mt-1">
                    <svg class="fill-current text-yellow-500 w-6" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M0 0h24v24H0z" fill="none"/><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                </div>
            </div>
            <div class="text-gray-400 text-sm">
                @foreach ($movie['genre_ids'] as $genre)
                    {{ $genres->get($genre) }}@if (!$loop->last),@endif
                @endforeach
            </div>
        </div>
    </div>
</div>