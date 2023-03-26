<!-- Hero -->
<section class="relative h-72 flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div
        class="absolute top-0 left-0 w-full h-full opacity-100 bg-no-repeat bg-center"
        style="background-image: url('images/keyboard.png')"
    ></div>

    <div class="z-10">
        {{-- <div><a class="flex"><img class="h-8" src="{{asset('images/logo-cs.png')}}" alt=""/></a></div> --}}
        <h1 class="text-6xl font-bold uppercase text-sky-700">
            CS-<span class="text-black">Gigs</span>
        </h1>
        <p class="text-2xl text-sky-700 font-bold my-4">
            Find or post CS jobs & projects
        </p>
        <div>
            @auth
                <a href="{{route('create')}}" class="inline-block border-2 border-sky-700 text-sky-700 py-2 px-4 rounded-xl  uppercase mt-2 hover:text-black hover:border-black" >Post a Gig</a>
            @endauth
                
            @guest
                <a href="/register" class="inline-block border-2 border-sky-700 text-sky-700 py-2 px-4 rounded-xl  uppercase mt-2 hover:text-black hover:border-black" >Sign Up to List a Gig</a>
            @endguest
        </div>
    </div>
</section>