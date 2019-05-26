    @if (!empty($base_64_img))
        <img src="data:image/png;base64, {{$base_64_img}}" class="w-100" alt="a picture of the holiday home"/>
    @else
        <img src="/storage/{{ $post->image }}" class="w-100" alt="a picture of the holiday home">
    @endif
