@extends('layout.layout')

@section('header')
    <title>Statistics</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/statistics.css') }}">
@endsection

@section('content')
<main>
    <h1 id="title">Rank</h1>

    <div id="leaderboard">
      <table>

        @foreach ($ranks as $index => $rank)
            <tr>
                <td class="number">{{(int)$index + 1}}</td>
                <td class="name">{{$rank->name}}</td>
                <td class="points">{{$rank->number_of_tasks}} 
                    @if ($rank->number_of_tasks == 1 || $rank->number_of_tasks > 10 )
                        - task
                    @else
                        - tasks
                    @endif
                     
                </td>
            </tr>
        @endforeach
        
      </table>
     
    </div>
  </main>
@endsection