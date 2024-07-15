<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
@php
    use Carbon\Carbon;
    use App\Models\Event;
    use App\Models\City;
@endphp
<div class="col-xl-12 events">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 d-flex align-items-center justify-content-start">
                    <div>
                        <h4 class="card-title">Events - Sessions</h4>
                    </div>
                </div>
                <div class="col-sm-6 d-flex align-items-center justify-content-end">
                </div>
            </div>
            <div class="card-block">
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <div class="d-flex">
                            <span class="me-2">View : </span>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"  name="view" value="week" id="flexRadioDefault1" @if($view == 'week') checked @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Weekly    
                                </label>
                              </div>
                              <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="view" value="month" id="flexRadioDefault2"  @if($view == 'month') checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Monthly
                                </label>
                              </div>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select Trainer</option>
                                          </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select Course</option>
                                          </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select City</option>
                                          </select>
                                    </div>
                                </div>
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                            @if($view == 'month')
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{ route('event.calender', ['date' => $prevMonth]) }} " class="btn btn-primary mb-2 float-end">Last Month</a>
                            </div>
                            <div class="col-sm-6">
                                <input type="month" id="date" name="start" min="2000-03" value="{{ $calendar[0]['date']->format('Y-m') }}" class="form-control"/>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{ route('event.calender', ['date' => $next]) }} " class="btn btn-primary mb-2">Next Month</a>
                            </div>
                        </div>
                            @else
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                <a href="{{ route('event.session.index', ['date' => $prev]) }} " class="btn btn-primary mb-2 float-end">Last Week</a>
                            </div>
                            <div class="col-sm-6">
                                {{-- <input type="month" id="date" name="start" min="2000-03" value="{{ $calendar[0]['date']->format('Y-m') }}" class="form-control"/> --}}
                                <input type="date" class="form-control" id="date" name="date" value="{{ $weekDays[0]->format('Y-m-d') }}">
                            </div>
                            <div class="col-sm-3">
                                <a href="{{ route('event.session.index', ['date' => $next]) }} " class="btn btn-primary mb-2">Next Week</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">

                </div>
                <div class="row mt-4">
                    @if($view == 'month')
                        {{-- ///////////////////////////month day and table start///////////////////////////// --}}
                        <table class="">
                            {{-- @dd($calendar[0]['date']->format('Y-m-d')) --}}
                            <thead>
                                <tr class="py-2">
                                    @foreach ($calendar as $day)
                                    <td  class="text-center py-2" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid;width:55px;background:#A0CF1A;color:#fff;">
                                        {!! $day['date']->format('D') . '<br>' . $day['date']->format('d') . '<br>' . $day['date']->format('M')!!}
                                    </td>
                               
                                    @endforeach
                                </tr>
                        @foreach ($sessions as $session)
                                @php
                                // Convert session start and end dates to Carbon instances
                                $startDate = \Carbon\Carbon::parse($session->start_date);
                                $endDate = \Carbon\Carbon::parse($session->end_date);
                                
                                // Calculate the number of days the session spans
                                $daysSpan = $startDate->diffInDays($endDate) + 1;
                                
                                // Prepare an array to keep track of the days covered by the session
                                $coveredDays = [];
                                for ($i = 0; $i < $daysSpan; $i++) {
                                    $coveredDays[] = $startDate->copy()->addDays($i)->toDateString();
                                }
                            @endphp
                        
                        <tr class="text-center py-2">
                            @foreach ($calendar as $day)
                                @php
                                    $currentDay = \Carbon\Carbon::parse($day['date']);
                                    $cellContent = '';
                                    $colspan = 1;
                                    $event = Event::find($session->event_id);
                                    $city = city::find($event->city);
                                    if (in_array($currentDay->toDateString(), $coveredDays)) {
                                        if ($currentDay->isSameDay($startDate)) {
                                        
                                            $cellContent .=  $city->name . '<br>';
                                          $cellContent .= $session->title . '<br>';
                                          $cellContent .=  $session->course->name . '<br>';
                                          if($event->course_type == "2"){
                                              $cellContent .= "Public". '<br>';
                                          }
                                          if($event->course_type == "3"){
                                              $cellContent .= "Private". '<br>';
                                          }
                                          
                                            $colspan = $daysSpan;
                                        } else {
                                            // Skip rendering cells for covered days
                                            continue;
                                        }
                                    }
                                @endphp
            
                                <td class="text-center py-3" colspan="{{ $colspan }}" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid;width:55px;background:#A0CF1A;color:#fff;">
                                    {!! $cellContent !!}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                            </thead>
                        </table>
                        {{-- ///////////////////////////month day and table end///////////////////////////// --}}
                        @else
                    <table>
                        <tr>
                            @foreach ($weekDays as $day)
                            <td  class="text-center py-2" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid;width:55px;background:#A0CF1A;color:#fff;">
                                    {{ $day->format('D') }} <br> {{ $day->format('M d') }}
                            </td>
                            @endforeach
                        </tr>
                        @foreach ($sessions as $session)
                        @php
                        // Convert session start and end dates to Carbon instances
                        $startDate = \Carbon\Carbon::parse($session->start_date);
                        $endDate = \Carbon\Carbon::parse($session->end_date);
                        
                        // Calculate the number of days the session spans
                        $daysSpan = $startDate->diffInDays($endDate) + 1;
                        
                        // Prepare an array to keep track of the days covered by the session
                        $coveredDays = [];
                        for ($i = 0; $i < $daysSpan; $i++) {
                            $coveredDays[] = $startDate->copy()->addDays($i)->toDateString();
                        }
                    @endphp
                        <tr>
                            @foreach ($weekDays as $day)
                            <td  class="text-center py-3" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid;width:55px;background:#A0CF1A;color:#fff;">
                            
                            </td>
                            @endforeach
                          </td>
                        </tr>
                        @endforeach
                    </table>  
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

   
</script>
<style>
    span.custom_inactive {
        background: #f44236;
        color: #fff;
        padding: 3px 10px;
        border-radius: 6px;
    }
    
    span.custom_active {
        background: #1de9b6;
        color: #fff;
        padding: 3px 10px;
        border-radius: 6px;
    }
    .events .card-header {
    border-color: #000000;
    position: relative;
    background: transparent;
    padding: 11px 20px;
    display: block;
    justify-content: space-between;
    align-items: center;
}
.modal-backdrop{
    display: none;
}
.leading-5 svg{
width:20px !important;
}
</style>
<script>
    $(document).ready(function() {
        //date selected
        $('#date').change(function() {
                var selectedDate = $(this).val();
                var dateArray = selectedDate.split('-');
                console.log(dateArray)
                var year = dateArray[0];
                var month = dateArray[1];
                var day = dateArray[2];
                var slug = '?date='+ year + '-' + month +'-' + day;
                window.location.href = slug;
            });
            // radio change checked
            $('input[type="radio"]').change(function(){
                if($(this).is(':checked')){
                    var radioValue = $(this).val();
                    console.log(radioValue);
                //   var domain =  window.location.origin
                //   window.location = domain;
                window.location.href = "?view=" + radioValue;
                }
            });
});
</script>
@stop