<x-layout :pageTitle="$pageTitle">
@if (session('message'))
    <div class="alert">
        {{ session('message') }}
    </div>
@endif
<div class="card">
    <h5 class="card-header">Login</h5>
    <div class="card-body">
        <x-users.loginForm/>
    </div>
</div>

</x-layout>