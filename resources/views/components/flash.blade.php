@if(session()->has('success'))
<div 
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    class="py-3 px-4 fixed bg-blue-500 text-white right-0 bottom-0 mb-5 mr-3 rounded-full">
    <p>{{ session('success') }}</p>
</div>
@endif