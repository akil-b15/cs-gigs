<x-layout>

    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>
        <div class="mb-3"><a href="{{route('create')}}" class="top-1/3 bg-sky-200 text-black py-2 px-5 mb-5">Post Job</a></div>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                
                @foreach ($listings as $listing)  
                
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="show.html">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <form method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete Gig</button>
                        </form>
                    </td>
                </tr>

                @endForeach

                @else 
                <tr class="border-gray-300">
                    <td class="px-4 py-8 botder-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings</p>
                    </td>
                </tr>
                @endunless
                
            </tbody>
        </table>
    </x-card>
</x-layout>