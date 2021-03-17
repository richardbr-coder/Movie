<div class="relative mt-3 md:mt-0">
    <input wire:model.debounce.100ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1
     focus:outline-none focus:shadow-outline" placeholder="search">
     <div class="div absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
     </div>
     @if (strlen($search) >= 2)
         <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
        @if ($searchResults->count() > 0)
             <ul>
                @foreach ($searchResults as $result)
                <li class="border-b border-gray-700">
                    <a href="{{ route('movies.show', $result['id']) }}" class="block 
                    hover:bg-gray-700 px-3 py-3 flex items-center">
                    @if ($result['poster_path'])
                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                    @else
                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                    @endif
                    <span class="ml-4">{{ $result['title'] }}</span>
                    </a>
                </li>
            @endforeach
            
        </ul>
            
        @else
            <div class="px-3 py-3">No results for "{{ $search }}"</div>

        @endif
       
     </div>
     @endif
     
</div>