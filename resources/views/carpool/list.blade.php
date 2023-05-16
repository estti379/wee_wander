@foreach ($users as $user)
<li> <x-shareroad_card :user='$user'/></li> 
@endforeach