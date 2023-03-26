@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-blue-500 opacity-50 text-white px-5 py-3 rounded-lg">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif