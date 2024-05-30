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
<div class="col-xl-12 events">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 d-flex align-items-center justify-content-start">
                    <div>
                        <h4 class="card-title">Events - Calendar</h4>
                    </div>
                </div>
                <div class="col-sm-6 d-flex align-items-center justify-content-end">
                    <div class="d-flex">
                        <div>
                            <select class="form-select me-3" name="trainers">
                                <option selected>All Trainers</option>
                                <option value="1">One</option>
                              </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"  name="url" value="/admin/events/calender" id="flexRadioDefault1" >
                            <label class="form-check-label" for="flexRadioDefault1">
                                Schedule         
                            </label>
                          </div>
                          <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="url" value="/admin/events/calender/session" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Sessions
                            </label>
                          </div>
                    </div>
                </div>
            </div>
            <div class="card-block pt-4">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{ route('event.calender', ['date' => $prevMonth]) }} " class="btn btn-primary mb-2 float-end">Last Month</a>
                            </div>
                            <div class="col-sm-6">
                                <input type="month" id="date" name="start" min="2000-03" value="{{ $calendar[0]['date']->format('Y-m') }}" class="form-control"/>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{ route('event.calender', ['date' => $prevMonth]) }} " class="btn btn-primary mb-2">Next Month</a>
                            </div>
                        </div>
{{-- <a href="{{ route('calendar.index', ['date' => $selectedDate->copy()->addMonth()->format('Y-m-d')]) }}">Next Month</a> --}}
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          {{-- ///////////////////////////month day and table start///////////////////////////// --}}
                          <table class="">
                            {{-- @dd($calendar[0]['date']->format('Y-m-d')) --}}
                            <thead>
                                <tr class="py-2">
                                    @foreach ($calendar as $day)
                                    <td  class="text-center py-2" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid;width:55px;background:#A0CF1A;color:#fff;">
                                        {!! $day['date']->format('D') . '<br>' . $day['date']->format('d') . '<br>' . $day['date']->format('M')!!}
                                    </td>
                                        {{-- <td>{{ $day['date']->format('d M') }}</td> --}}
                                    @endforeach
                                </tr>
                                <tr class="text-center py-2">
                                    @foreach ($calendar as $day)
                                    <td class="text-center py-3" style="border-bottom:#ffffff 1px solid;border-right:#ffffff 1px solid;width:55p0x;background:#A0CF1A;color:#fff;">
                                        {{-- {!! $day['date']->format('D') . '<br>' . $day['date']->format('d') . '<br>' . $day['date']->format('M')!!} --}}
                                    </td>
                                        {{-- <td>{{ $day['date']->format('d M') }}</td> --}}
                                    @endforeach
                                </tr>
                            </thead>
                        </table>
                        {{-- ///////////////////////////month day and table end///////////////////////////// --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
       $('input[type="radio"]').change(function(){
                   if($(this).is(':checked')){
                       var radioValue = $(this).val();
                     var domain =  window.location.origin
                     console.log(domain)
                   //   window.location = domain;
                   window.location.href = domain + radioValue;
                   }
               });
   
               $('#date').change(function() {
                   var selectedDate = $(this).val();
                   var dateArray = selectedDate.split('-');
                   var year = dateArray[0];
                   var month = dateArray[1];
                   var slug = '?date='+ year + '-' + month +'-' + '01';
                   window.location.href = slug; 
                   // console.log('?date='+ year + '-' + month +'-' + '01')
                   // $('#result').text('Year: ' + year + ', Month: ' + month);
               });
           });
      
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
@stop