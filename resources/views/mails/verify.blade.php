<h1>Hello {{$data->name}}</h1>
<a href="{{route('verifi_email', ['id' => $data->id])}}">Xác thực</a>