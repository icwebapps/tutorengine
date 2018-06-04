@extends('layout')

@section('title', 'Resources')

@section('content')

@component('sidebar')
@endcomponent

<body>
  <div class="site">

    <div class="sidebar">
      <img class="logo-icon" src="images/icon.png" />
      <div class="nav">
        <div class="nav-item">
          <img src="images/icons8-dashboard-50.png" />
        </div>
        <div class="nav-item">
          <img src="images/icons8-today-100.png" />
        </div>
        <div class="nav-item">
          <img src="images/icons8-address-book-2-filled-100.png" />
        </div>
        <div class="nav-item nav-selected">
          <img src="images/icons8-open-50.png" />
        </div>
        <div class="nav-item">
          <img src="images/icons8-male-user-50.png" />
        </div>
      </div>
    </div>

    <div class="main">
      <div class="header">
        <div class="header-left">
          <div class="page-title">Resources</div>
        </div>
        <div class="header-center">
          <img src="images/logo.png" class="logo" />
        </div>
        <div class="header-right">
          <div class="header-logout"><img src="images/icons8-shutdown-50.png" /></div>
        </div>
      </div>
      <div class="width-fill">
        <div class="panel-subjects">
          <div class="add-subject">
            <div class="add-subject-title">Add Subject</div>
            <img src="images/icons8-plus-math-50.png" class="add-subject-button" />
          </div>
          <div class="subject-list">
            <div class="subject-list-headers">
              <div class="subject-list-header-item header-subject">Subject</div>
              <div class="subject-list-header-item header-level">Level</div>
              <div class="subject-list-header-item header-files">Files</div>
            </div>
            <div class="subject-list-item">
              <div class="subject-list-letter letter-green">M</div>
              <div class="subject-list-name">Mathematics</div>
              <div class="subject-list-level">GCSE</div>
              <div class="subject-list-files">12</div>
            </div>
            <div class="subject-list-item item-selected">
              <div class="subject-list-letter letter-red">F</div>
              <div class="subject-list-name">Further Mathematics</div>
              <div class="subject-list-level">A-Level</div>
              <div class="subject-list-files">9</div>
            </div>
            <div class="subject-list-item">
              <div class="subject-list-letter letter-blue">C</div>
              <div class="subject-list-name">Chemistry</div>
              <div class="subject-list-level">GCSE</div>
              <div class="subject-list-files">1</div>
            </div>
            <div class="subject-list-item">
              <div class="subject-list-letter letter-purple">M</div>
              <div class="subject-list-name">Mathematics</div>
              <div class="subject-list-level">11+</div>
              <div class="subject-list-files">0</div>
            </div>
          </div>
        </div>

        <div class="panel-resources">
          <div class="resources-tabs">
            <div class="resources-tab-item tab-selected">Documents</div>
            <div class="resources-tab-item">Photos</div>
            <div class="resources-tab-item">Videos</div>
          </div>
          <div class="resources-table">
            <div class="resources-table-header resources-row">
              <div class="resources-table-cell">Name <img src="images/icons8-sort-down-filled-50.png" /></div>
              <div class="resources-table-cell">Type <img src="images/icons8-sort-down-filled-50.png" /></div>
              <div class="resources-table-cell">Downloads <img src="images/icons8-sort-down-filled-50.png" /></div>
              <div class="resources-table-cell">Uploaded <img src="images/icons8-sort-down-filled-50.png" /></div>
              <div class="resources-table-cell">Students <img src="images/icons8-sort-down-filled-50.png" /></div>
            </div>
            <div class="resources-row">
              <div class="resources-table-cell">C1 January 2010</div>
              <div class="resources-table-cell">Past Paper</div>
              <div class="resources-table-cell">2</div>
              <div class="resources-table-cell">03/06/18</div>
              <div class="resources-table-cell resources-faces-list">
                <img src="images/jasonlipowicz.png" />
                <img src="images/alex.jpg" />
                <img src="images/icons8-plus-50.png" />
              </div>
            </div>
            <div class="resources-row">
              <div class="resources-table-cell">C1 January 2011</div>
              <div class="resources-table-cell">Past Paper</div>
              <div class="resources-table-cell">1</div>
              <div class="resources-table-cell">02/06/18</div>
              <div class="resources-table-cell resources-faces-list">
                <img src="images/shravan.jpg" />
                <img src="images/icons8-plus-50.png" />
              </div>
            </div>
            <div class="resources-row">
              <div class="resources-table-cell">Partial Fractions</div>
              <div class="resources-table-cell">Exercise</div>
              <div class="resources-table-cell">3</div>
              <div class="resources-table-cell">02/05/18</div>
              <div class="resources-table-cell resources-faces-list">
                <img src="images/boazfrancis.jpg" />
                <img src="images/icons8-plus-50.png" />
              </div>
            </div>
          </div>

          <form method="post" action="{{url('resources')}}">
            {{csrf_field()}}
          
            <input type="file" name="filename">          
            <input type="button" value="Add Resource" class="add-resource">

          </form>
          
        </div>
      </div>
    </div>
    
  </div>

@endsection