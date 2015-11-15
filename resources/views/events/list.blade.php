@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List Events</div>

                    <div class="panel-body">
                       <table class="table table-hover">
                        @foreach($events as $p)
                            <tr>
                                <td>
                                    <a href="/events/edit/{{ $p->id }}"> <label>{{ $p->festival }}</label> </a>
                                </td>
                                <td>
                                    <label>{{ $p->startdate }} - {{ $p->enddate }}</label>
                                </td>
                                <td>
                                    <label>{{ $p->title }}</label>
                                </td>
                                {{--<td>--}}
                                    {{--<label>{{ $p->content }}</label>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection