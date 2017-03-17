<<h1>This is Test Page</h1>
@if(count($beatles>0))
@foreach($beatles as $value)
	{{$value}}
@else
<h1> Sorry, nothing to show ... <h1>
@endforeach()
@endif