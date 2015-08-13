@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List Pages</div>

                    <div class="panel-body">
                       <table class="table-hover">
                        @foreach($pages as $p)
                            <tr>
                                <td>
                                    <a href="/pages/edit/{{ $p->id }}"> <label>{{ $p->title }}</label> </a>
                                </td>
                                <td>
                                    <label>{{ $p->slug }}</label>
                                </td>
                                <td>
                                    <label>{{ $p->description }}</label>
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