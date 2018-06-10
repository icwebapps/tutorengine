@extends('layout')

@section('title', 'Dashboard')

@section('content')

@component('header')
  @slot('title') Dashboard @endslot
  @slot('text') <div class="page-title page-dark">Welcome {{ explode(" ", Auth::user()->name)[0] }}</div> @endslot
@endcomponent

<div class="main">
  @component('sidebar', ["selected"=>"dashboard"])
  @endcomponent
  
  <div class="width-fill flex-rows">
    <div class="dashboard-headers">
      <div class="dashboard-header-item dashboard-item-long">Progress</div>
      <div class="dashboard-header-item">Assignments</div>
      <div class="dashboard-header-item">Lessons</div>
    </div>
    <div class="dashboard-panels">
      <div class="dashboard-panel-item dashboard-item-long">
        <div class="subject-performance rating-excellent">
          <div class="subject-performance-name">Chemistry</div>
          <div class="circle over50 subject-performance-circle">
            <span>95%</span>
            <div class="slice">
              <div class="bar" style="transform: rotate(342deg);"></div>
              <div class="fill"></div>
            </div>
          </div>
          <div class="subject-performance-caption">
            Performance:
            <div class="subject-performance-rating">Excellent</div>
          </div>
        </div>
        <div class="subject-performance rating-ok">
          <div class="subject-performance-name">Mathematics</div>
          <div class="circle over50 subject-performance-circle">
            <span>65%</span>
            <div class="slice">
              <div class="bar" style="transform: rotate(234deg);"></div>
              <div class="fill"></div>
            </div>
          </div>
          <div class="subject-performance-caption">
            Performance:
            <div class="subject-performance-rating">OK</div>
          </div>
        </div>
        <div class="subject-performance rating-improvement">
          <div class="subject-performance-name">Further Mathematics</div>
          <div class="circle subject-performance-circle">
            <span>43%</span>
            <div class="slice">
              <div class="bar" style="transform: rotate(154deg);"></div>
              <div class="fill"></div>
            </div>
          </div>
          <div class="subject-performance-caption">
            Performance:
            <div class="subject-performance-rating">Improvement</div>
          </div>
        </div>
        <div class="subject-performance rating-good">
          <div class="subject-performance-name">Physics</div>
          <div class="circle over50 subject-performance-circle">
            <span>85%</span>
            <div class="slice">
              <div class="bar" style="transform: rotate(306deg);"></div>
              <div class="fill"></div>
            </div>
          </div>
          <div class="subject-performance-caption">
            Performance:
            <div class="subject-performance-rating">Good</div>
          </div>
        </div>
      </div>

      <div id="assignment-widget"></div>


      <div class="dashboard-panel-item">
        <div class="card accent-red">
          <div class="card-left">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
              <path
                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"
                d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24.984375 6.9863281 A 1.0001 1.0001 0 0 0 24 8 L 24 22.173828 A 3 3 0 0 0 22 25 A 3 3 0 0 0 22.294922 26.291016 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 23.708984 27.705078 A 3 3 0 0 0 25 28 A 3 3 0 0 0 28 25 A 3 3 0 0 0 26 22.175781 L 26 8 A 1.0001 1.0001 0 0 0 24.984375 6.9863281 z"
                font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible"/>
            </svg>
            11:00
          </div>
          <div class="card-middle">
            <div class="card-title">Jason Lipowicz</div>
            <div class="card-sub">1 Hacker Way, Mill Hill</div>
            <div class="card-text">GCSE Maths / Further Maths</div>
          </div>
          <div class="card-right">
            <img src="images/jasonlipowicz.png" class="card-graphic"/>
          </div>
        </div>

        <div class="card accent-red">
          <div class="card-left">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
              <path
                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"
                d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24.984375 6.9863281 A 1.0001 1.0001 0 0 0 24 8 L 24 22.173828 A 3 3 0 0 0 22 25 A 3 3 0 0 0 22.294922 26.291016 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 23.708984 27.705078 A 3 3 0 0 0 25 28 A 3 3 0 0 0 28 25 A 3 3 0 0 0 26 22.175781 L 26 8 A 1.0001 1.0001 0 0 0 24.984375 6.9863281 z"
                font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible"/>
            </svg>
            11:00
          </div>
          <div class="card-middle">
            <div class="card-title">Jason Lipowicz</div>
            <div class="card-sub">1 Hacker Way, Mill Hill</div>
            <div class="card-text">GCSE Maths / Further Maths</div>
          </div>
          <div class="card-right">
            <img src="images/jasonlipowicz.png" class="card-graphic"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
