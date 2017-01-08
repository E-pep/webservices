@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                
            <div class="panel panel-default">
                <div class="panel-heading">code of the week</div>

                <div class="panel-body">

                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title">{{ $codeweek->title }}</h3>
                    </div>

                    <div class="panel-body">
                    <a href="viewcode/{{ $codeweek->id}}">
                    <img src="pic/{{ $codeweek->id }}" class="img-responsive center-block">
                    </a>
                    </div>

                    <table class="table table-striped">

                        <tr class="success">
                            <td >likes:</td>
                            <td>{{ $codeweek->likes }}</td>
                            <td>

                           @if( $codeweek->likestable->where('userID', Auth::user()->id)->first() == NULL)
                           <?php $testlik = 2; ?>

                           @else
                           <?php $testlik = $codeweek->likestable->where('userID', Auth::user()->id)->first()->like; ?>

                           @endif

                           @if( $testlik != 1)
                            <form action="newcode/like" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="codeID" value= {{ $codeweek->id }}> 
                                <button type="submit" class="btn btn-default pull-right">like</button>
                            </form>
                           @endif
                            </td>
                            </tr>

                        <tr class="danger">
                            <td>dislikes:</td>
                            <td>{{ $codeweek->dislikes }}</td>
                            <td>
                            @if( $testlik != 0)
                                <form action="newcode/dislike" method="POST">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="codeID" value= {{ $codeweek->id }}> 
                                    <button type="submit" class="btn btn-default pull-right">dislike</button>
                                </form>
                            @endif
                            </td>
                        </tr>

                    </table>
                </div>
                </div>
            </div>     



            <div class="panel panel-default" style="margin-top: 25%;">
                <div class="panel-heading">code of the month</div>

                <div class="panel-body">

                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title">{{ $codemonth->title }}</h3>
                    </div>

                    <div class="panel-body">
                    <a href="viewcode/{{ $codemonth->id}}">
                    <img src="pic/{{ $codemonth->id }}" class="img-responsive center-block">
                    </a>
                    </div>

                    <table class="table table-striped">

                        <tr class="success">
                            <td >likes:</td>
                            <td>{{ $codemonth->likes }}</td>
                            <td>

                           @if( $codemonth->likestable->where('userID', Auth::user()->id)->first() == NULL)
                           <?php $testlik = 2; ?>

                           @else
                           <?php $testlik = $codemonth->likestable->where('userID', Auth::user()->id)->first()->like; ?>

                           @endif

                           @if( $testlik != 1)
                            <form action="newcode/like" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="codeID" value= {{ $codemonth->id }}> 
                                <button type="submit" class="btn btn-default pull-right">like</button>
                            </form>
                           @endif
                            </td>
                            </tr>

                        <tr class="danger">
                            <td>dislikes:</td>
                            <td>{{ $codemonth->dislikes }}</td>
                            <td>
                            @if( $testlik != 0)
                                <form action="newcode/dislike" method="POST">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="codeID" value= {{ $codemonth->id }}> 
                                    <button type="submit" class="btn btn-default pull-right">dislike</button>
                                </form>
                            @endif
                            </td>
                        </tr>

                    </table>
                </div>
                </div>
            </div>  



                <div class="panel panel-default" style="margin-top: 25%;">
                <div class="panel-heading">most beautiful code of all time</div>

                <div class="panel-body">

                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title">{{ $codeall->title }}</h3>
                    </div>

                    <div class="panel-body">
                    <a href="viewcode/{{ $codeall->id}}">
                    <img src="pic/{{ $codeall->id }}" class="img-responsive center-block">
                    </a>
                    </div>

                    <table class="table table-striped">

                        <tr class="success">
                            <td >likes:</td>
                            <td>{{ $codeall->likes }}</td>
                            <td>

                           @if( $codeall->likestable->where('userID', Auth::user()->id)->first() == NULL)
                           <?php $testlik = 2; ?>

                           @else
                           <?php $testlik = $codeall->likestable->where('userID', Auth::user()->id)->first()->like; ?>

                           @endif

                           @if( $testlik != 1)
                            <form action="newcode/like" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="codeID" value= {{ $codeall->id }}> 
                                <button type="submit" class="btn btn-default pull-right">like</button>
                            </form>
                           @endif
                            </td>
                            </tr>

                        <tr class="danger">
                            <td>dislikes:</td>
                            <td>{{ $codeall->dislikes }}</td>
                            <td>
                            @if( $testlik != 0)
                                <form action="newcode/dislike" method="POST">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="codeID" value= {{ $codeall->id }}> 
                                    <button type="submit" class="btn btn-default pull-right">dislike</button>
                                </form>
                            @endif
                            </td>
                        </tr>

                    </table>
                </div>
                </div>
            </div>   
 




        </div>
    </div>
</div>

@endsection

