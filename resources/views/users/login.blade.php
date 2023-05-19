<x-layout :pageTitle="$pageTitle">
@if (session('message'))
    <div class="alert">
        {{ session('message') }}
    </div>
@endif

    <x-users.loginForm/>
</x-layout>