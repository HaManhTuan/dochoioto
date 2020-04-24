@extends('layouts.frontend.home')
@section('content')

<script>
  jQuery(document).ready(function($) {
    $("body").removeClass('home');
    $("body").addClass('page-category');
  });
</script>
@endsection