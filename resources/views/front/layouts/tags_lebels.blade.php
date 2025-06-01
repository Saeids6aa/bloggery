  @if ($post->tags->isEmpty())
      No tags
  @else
      @foreach ($post->tags as $tag)
          {{ $tag->name }}@if (!$loop->last)
              ,
          @endif
      @endforeach
  @endif
