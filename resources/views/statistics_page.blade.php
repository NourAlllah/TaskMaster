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
        <tr>
          <td class="number">1</td>
          <td class="name">Lee Taeyong</td>
          <td class="points">
            258.244 
          </td>
        </tr>
        <tr>
          <td class="number">2</td>
          <td class="name">Mark Lee</td>
          <td class="points">258.242</td>
        </tr>
        <tr>
          <td class="number">3</td>
          <td class="name">Xiao Dejun</td>
          <td class="points">258.223</td>
        </tr>
        <tr>
          <td class="number">4</td>
          <td class="name">Qian Kun</td>
          <td class="points">258.212</td>
        </tr>
        <tr>
          <td class="number">5</td>
          <td class="name">Johnny Suh</td>
          <td class="points">258.208</td>
        </tr>
      </table>
     
    </div>
  </main>
@endsection