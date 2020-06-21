@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="insert" action="{{ action('ContentController@store') }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <select class="form-control form-control-sm" name="category">
                            @foreach($categories as $value) 
                                <option value="{{ $value->category_en }}">{{ $value->category_tr }}</option>
                            @endforeach
                        </select>
                        <div class="custom-control custom-radio mt-2">
                            <input type="radio" id="radio_tr" value="tr"  name="lang" class="custom-control-input">
                            <label class="custom-control-label" for="radio_tr">TR</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="radio_en" value="en"  name="lang" class="custom-control-input">
                            <label class="custom-control-label" for="radio_en">EN</label>
                        </div>
                        <div class="form-group mt-2">
                            <label for="input_title">Title</label>
                            <input class="form-control" name="title" id="input_title" type="text">
                        </div>
                        <div class="form-group mt-2">
                            <label for="textarea_content">Content</label>
                            <textarea class="form-control" name="content" id="textarea_content" rows="3"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" id="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>

$( document ).ready(function() {
    $( "#submit" ).click(function( event ) {
        event.preventDefault();

        $( "#insert" ).submit();

        // var values = {};
        // $.each($('#insert').serializeArray(), function(i, field) {
        //     values[field.name] = field.value;
        // });
        // console.log('values', values)
    });
});

</script>


