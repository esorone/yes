{{-- Deze checkt : Session::flash('success', 'De activiteit is opgeslagen!'); 
Dus de naam is success en niet flash--}}

@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Succes:</strong> {{ Session::get('success') }}
    </div>
@endif

{{--@if(Session::has('flash_message'))--}}
    {{--<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>--}}
{{--@endif--}}
{{--@if(Session::has('flash_message_delete'))--}}
    {{--<div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_delete') !!}</em></div>--}}
{{--@endif--}}

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>OEPS:</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif