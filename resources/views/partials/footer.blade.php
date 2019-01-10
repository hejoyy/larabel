{{-- <footer>
  <p>im footer. use me on other view</p>
</footer>
 --}}
@section('script')
  @parent
  <script type="text/javascript">
    alert("저는 조각 뷰의 'script' section");
  </script>
@endsection
