{{-- @if($itemCount = count($items))
  <p>{{$itemCount}} 종류의 과일</p>
@else
  <p>아무것도 없어</p>
@endif

<ul>
  @foreach($items as $item)
    <li>{{$item}}</li>
  @endforeach
</ul>

<ul>
  @forelse($items as $item)
    <li>{{$item}}</li>
  @empty
    <li>아무것도 없음</li>
  @endforelse
</ul> --}}

@extends('layouts/master')

@section('content')
  @include('partials/footer')
@endsection


@section('script')
  <script type="text/javascript">
    alert("저는 자식 뷰의 'script' section");
  </script>
@endsection
