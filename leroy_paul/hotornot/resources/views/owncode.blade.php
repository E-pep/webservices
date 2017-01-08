@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <div class="panel panel-default">
                <div class="panel-heading">Add new code to library</div>
                    <div class="panel-body">
                         
                        <form action="owncode/addcode" method="POST" enctype="multipart/form-data">
                             
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                             <div class="form-group">


                                 <div class="form-group">
                                     <label for="title">title</label>
                                     <input type="text" class="form-control" name="title" id="title" placeholder={{"title"}}>
                                 </div>

                                 <div class="form-group">
                                     <label for="proglang">program language</label>
                                     <input type="text" class="form-control" id="proglang" name="proglang" placeholder="proglang">
                                 </div>

                                 <div class="form-group">
                                     <label for="IDE">IDE</label>
                                     <input type="text" class="form-control" id="IDE" name="IDE" placeholder="IDE">
                                 </div>

                                 <div class="form-group">
                                     <label for="besch">description</label>
                                     <textarea class="form-control" name="besch" rows="3"></textarea>
                                 </div>                                

                                 <label for="exampleInputFile">File input</label>
                                 <input type="file" id="exampleInputFile" name="fileinput">

                             </div>

                             <button type="submit" class="btn btn-default">Submit</button>
                        </form>


                    </div>

                        @if(count($errors))
                        <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                        @endif
                </div>



                @foreach($codes as $code)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title">{{ $code->title }}</h3>
                    </div>

                    <div class="panel-body">
                    <a href="viewcode/{{ $code->id}}">
                    <img src="pic/{{ $code->id }}" class="img-responsive center-block">
                    </a>
                    </div>

                    <table class="table table-striped">
                        <tr class="success"><td >likes:</td><td>{{ $code->likes }}</td></tr>
                        <tr class="danger"><td>dislikes:</td><td>{{ $code->dislikes }}</td></tr>
                    </table>
                </div>
                @endforeach
                {{$codes->render()}}
            </div>
        </div>
    </div>
</div>
@endsection