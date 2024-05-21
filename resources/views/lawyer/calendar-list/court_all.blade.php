@extends('layouts.lawyer.layout')
@section('title')
<title>Calander Court List</title>
<style>
        .fc {
            font-size: 13px;
            background: #fff;
        }

        .fc th {

            color: #fff;
        }
        .fc-event-time{
            display:none !important;
        }
        .fc-list-event-time {
             display:none !important;
        }
        #calendar{
            padding:15px;
        }
        .fc-toolbar-title{
            color:#000;
        }
        .fc-button{
            background-color:#3AAFA9 !important;
        }
        .fc .fc-button-primary:disabled{
            background-color:#2C3E50 !important;
        }
        @media(max-width:575px){
            .fc-direction-ltr .fc-toolbar > * > :not(:first-child) {
                margin-left: 1px !important;
                margin-bottom: 5px;
            }
            .fc .fc-toolbar{
                display:block !important;
            }
        }
        .badge-color1{
          background-color:#E0EDCF;
          color:#82B54B;
        }
        .badge-color2{
          background-color:#FBDECE;
          color:#E87C52;
        }
        .badge-color3{
          background-color:#FFEAC0;
          color:#FFBC38;
        }
        .badge-color4{
          background-color:#CEE9F0;
          color:#547FDE;
        }
        p{
            color:#000;
            font-size:16px;
        }
         .badge.d-flex.justify-content-between.mb-1.p-2.py-2{
            font-size:14px;
        }
        .fc-header-toolbar.fc-toolbar.fc-toolbar-ltr {
            margin-bottom: 12px !important;
        }
    </style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
     <link href="{{asset('backend')}}/custom/celendar/main.css" rel="stylesheet" />
   
@endsection
@section('lawyer-content')

<!-- DataTales Example -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <div id="calendar"></div>
            </div>
            <div class="col-lg-2 col-md-2">
                <div class="pt-3">
                    <a class="border border-primary btn btn-white text-dark" href="{{route('lawyer.litigation-calender-short')}}">Case</a>
                    <a class="btn btn-primary text-white" href="#">Court</a>
                </div>
                
                
                <!--<p class="mt-5">Court View</p>-->
                <!--    <div class="badge badge-color1 d-block py-2 mb-1">District : {{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','District')->count()}}</div>-->
                <!--    <div class="badge badge-color2 d-block py-2 mb-1">Special : {{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','Special')->count()}}</div>-->
                <!--    <div class="badge badge-color3 d-block py-2 mb-1">High Court : {{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','High Court')->count()}}</div>-->
                <!--    <div class="badge badge-color4 d-block py-2 mb-1">Appellate Court : {{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','Appellate')->count()}}</div>-->
                    
                    
                @php
                    $currentMonth = \Carbon\Carbon::now()->month;
                    $currentYear = \Carbon\Carbon::now()->year;
                    $count = \App\Cases::whereMonth('updated_at', $currentMonth)
                   ->whereYear('updated_at', $currentYear)
                   ->count();
                @endphp
                    
                    
                <p style="margin-top: 35px;margin-bottom: 7px;">Case View</p>
                    <div class="badge badge-color1 d-flex justify-content-between mb-1 p-2 py-2"><span>Civil Case :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_category_id',1)->count()}}</span></div>
                    {{--<div class="badge badge-color2 d-block py-2 mb-1">Criminal Case : {{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_category_id',2)->count()}}</div>--}}
                <div class="badge badge-color2 d-flex justify-content-between mb-1 p-2 py-2"><span>Criminal Case :</span> <span>{{ $count }}</span></div>
                <div class="badge badge-color3 d-flex justify-content-between mb-1 p-2 py-2"><span>Appeal :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','High Court')->count()}}</span></div>
                <div class="badge badge-color4 d-flex justify-content-between mb-1 p-2 py-2"><span>Revision :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','Appellate')->count()}}</span></div>
                
                
                 <p style="margin-bottom: 7px;" class="mt-5">Court View</p>
                <div class="badge badge-color1 d-flex justify-content-between mb-1 p-2 py-2"><span>District :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','District')->count()}}</span></div>
                <div class="badge badge-color2 d-flex justify-content-between mb-1 p-2 py-2"><span>Special :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','Special')->count()}}</span></div>
                <div class="badge badge-color3 d-flex justify-content-between mb-1 p-2 py-2"><span>High Court :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','High Court')->count()}}</span></div>
                <div class="badge badge-color4 d-flex justify-content-between mb-1 p-2 py-2"><span>Appellate Court :</span> <span>{{\App\Cases::whereLawyerId(auth()->guard('lawyer')->id())->where('case_class_id','Appellate')->count()}}</span></div>
                
                
                    
               
                
            </div>
        </div>
    </div>
    


    @endsection

    @section('script')
     <script src="{{asset('backend')}}/fullcalendar/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-daygrid/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-timegrid/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-interaction/main.min.js"></script>
    <script src="{{asset('backend')}}/fullcalendar-bootstrap/main.min.js"></script>
    <script src="{{asset('backend')}}/moment/moment.min.js"></script>

     <script src="{{asset('backend')}}/custom/celendar/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var eve = @json($events);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "title",
                    center: "",
                    // right: "prev next today dayGridMonth timeGridWeek timeGridDay listWeek",
                    right: "prev next",
                },
                height: "auto",
                navLinks: true,
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: eve
            });

            calendar.render();
        });
    </script>

    @endsection