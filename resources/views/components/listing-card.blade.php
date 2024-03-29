@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 h-48 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) :
                                    asset('images/images.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{route('single.listing', $listing->id)}}">{{$listing->title}}</a>
                {{-- {{route('single_listing', $listing->id)}} ----/////----/listings/{{$listing->id}}--}}
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

            <x-listing-tags :tagsCsv="$listing->tags" />
                
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>  