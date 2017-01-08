@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                
            <div class="panel panel-default">
                <div class="panel-heading">top 5 of the week</div>

                <div class="panel-body">
                    @foreach($codeweek as $code)
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

                        <tr class="success">
                            <td >likes:</td>
                            <td>{{ $code->likes }}</td>
                            <td>

                           @if( $code->likestable->where('userID', Auth::user()->id)->first() == NULL)
                           <?php $testlik = 2; ?>

                           @else
                           <?php $testlik = $code->likestable->where('userID', Auth::user()->id)->first()->like; ?>

                           @endif

                           @if( $testlik != 1)
                            <form action="newcode/like" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="codeID" value= {{ $code->id }}> 
                                <button type="submit" class="btn btn-default pull-right">like</button>
                            </form>
                           @endif
                            </td>
                            </tr>

                        <tr class="danger">
                            <td>dislikes:</td>
                            <td>{{ $code->dislikes }}</td>
                            <td>
                            @if( $testlik != 0)
                                <form action="newcode/dislike" method="POST">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="codeID" value= {{ $code->id }}> 
                                    <button type="submit" class="btn btn-default pull-right">dislike</button>
                                </form>
                            @endif
                            </td>
                        </tr>

                    </table>
                </div>
                @endforeach
                </div>
            </div>





                <div class="panel panel-default" style="margin-top: 25%;">
                <div class="panel-heading">top 5 of the month</div>

                <div class="panel-body">
                    @foreach($codemonth as $code)
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

                        <tr class="success">
                            <td >likes:</td>
                            <td>{{ $code->likes }}</td>
                            <td>

                           @if( $code->likestable->where('userID', Auth::user()->id)->first() == NULL)
                           <?php $testlik = 2; ?>

                           @else
                           <?php $testlik = $code->likestable->where('userID', Auth::user()->id)->first()->like; ?>

                           @endif

                           @if( $testlik != 1)
                            <form action="newcode/like" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="codeID" value= {{ $code->id }}> 
                                <button type="submit" class="btn btn-default pull-right">like</button>
                            </form>
                           @endif
                            </td>
                            </tr>

                        <tr class="danger">
                            <td>dislikes:</td>
                            <td>{{ $code->dislikes }}</td>
                            <td>
                            @if( $testlik != 0)
                                <form action="newcode/dislike" method="POST">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="codeID" value= {{ $code->id }}> 
                                    <button type="submit" class="btn btn-default pull-right">dislike</button>
                                </form>
                            @endif
                            </td>
                        </tr>

                    </table>
                </div>
                @endforeach
                </div>
            </div>



                            <div class="panel panel-default" style="margin-top: 25%;">
                <div class="panel-heading">top 5 of all time</div>

                <div class="panel-body">
                    @foreach($codeall as $code)
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

                        <tr class="success">
                            <td >likes:</td>
                            <td>{{ $code->likes }}</td>
                            <td>

                           @if( $code->likestable->where('userID', Auth::user()->id)->first() == NULL)
                           <?php $testlik = 2; ?>

                           @else
                           <?php $testlik = $code->likestable->where('userID', Auth::user()->id)->first()->like; ?>

                           @endif

                           @if( $testlik != 1)
                            <form action="newcode/like" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="codeID" value= {{ $code->id }}> 
                                <button type="submit" class="btn btn-default pull-right">like</button>
                            </form>
                           @endif
                            </td>
                            </tr>

                        <tr class="danger">
                            <td>dislikes:</td>
                            <td>{{ $code->dislikes }}</td>
                            <td>
                            @if( $testlik != 0)
                                <form action="newcode/dislike" method="POST">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="codeID" value= {{ $code->id }}> 
                                    <button type="submit" class="btn btn-default pull-right">dislike</button>
                                </form>
                            @endif
                            </td>
                        </tr>

                    </table>
                </div>
                @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection