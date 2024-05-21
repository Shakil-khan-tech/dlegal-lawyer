@extends('layouts.lawyer.layout')
@section('title')
<title>Case Proceeding Edit</title>
@endsection
@section('lawyer-content')
<style>
    .close-btn {
  cursor: pointer;
  z-index: 99;
  font-size: 20px;
  color: red;
  border: 1px solid red;
  padding: 5px;
  height: 22px;
  line-height: 10px;
  border-radius: 6px;
}
.popup-footer {
    padding: 20px;
    border-top: 1px solid #ccc;
}
.f-btn-c {
    height: 30px !important;
    line-height: 15px !important;
    font-size: 14px;
    width: 80px;
}
</style>

<form action="{{ route('lawyer.litigation.case.proceeding.update',$log->id) }}" method="POST">
@csrf
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-users text-primary"></i> Case Proceeding Edit</h4>
                <p class="font-weight-bold text-danger" style="font-size:20px;">{{ @$log->cases->caseTitleShort->name_short.' '.$log->cases->case_infos_case_no.'/'.$log->cases->case_infos_case_year }}</p>
            </div>
            <div class="card-body">
                
                <div class="custom-model-main">
                  <div class="custom-model-inner log">
                    <div class="custom-model-wrap">
                      <div class="pop-up-content-wrap">
                        <div class="row Party popup-m">
                          <div class="col-lg-6">
                            <div class="row">
                              <div class="col-12 mb-2">
                                <div class="row ">
                                  <div class="col-lg-4 col-12 ">
                                    <label for=""
                                    class="font-weight-bold text-info">Status</label>
                                  </div>
                                  <div class="col-lg-4 col-12">
                                    <select name="updated_case_status_id"
                                    class="form-control" id="updated_case_status_id" required>
                                    <option value="">select</option>
                                    @foreach($cpl_status as $row)
                                    <option {{ $log->updated_case_status_id == $row->id ? 'selected':''}} value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-lg-4 col-12">
                                  <input type="text" class="form-control"
                                  name="updated_case_status_write" placeholder="Status" value="{{$log->updated_case_status_write}}">
                                </div>
                              </div>
                            </div>
                            <div class="col-12 mb-2">
                              <div class="row">
                                <div class="col-lg-4 col-12 ">
                                  <label for=""
                                  class="font-weight-bold text-info">Case/Order
                                Date</label>
                              </div>
                              <div class="col-lg-8 col-12">
                                <input type="date" class="form-control"
                                name="updated_order_date"
                                placeholder="" value="{{$log->updated_order_date ? $log->updated_order_date->format('Y-m-d'):''}}">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mb-2">
                            <div class="row ">
                              <div class="col-lg-4 col-12 ">
                                <label for=""
                                class="font-weight-bold text-info">Fixed
                              For</label>
                            </div>
                            <div class="col-lg-4 col-12">
                              <select name="updated_fixed_for_id" onchange="fixedFor();"
                              class="form-control" id="updated_fixed_for_id" @if($log->updated_fixed_for_id) @else @if(!$log->updated_fixed_for_write) required @endif @endif>
                                <option value="">select</option>
                                  @foreach($fixed_for as $row)
                                  <option {{ $log->updated_fixed_for_id == $row->id ? 'selected':''}} value="{{$row->id}}">{{$row->name}}</option>
                                  @endforeach
                            </select>
                          </div>
                          <div class="col-lg-4 col-12">
                            <input onkeyup="fixedForUpdate();" id="updated_fixed_for_write" type="text" class="form-control" name="updated_fixed_for_write" placeholder="Fixed For" value="{{$log->updated_fixed_for_write}}"  @if($log->updated_fixed_for_write) @else @if(!$log->updated_fixed_for_id) required @endif @endif>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mb-2">
                        <div class="row ">
                          <div class="col-lg-4 col-12 ">
                            <label for=""
                            class="font-weight-bold text-info">Court
                          Proceeding</label>
                        </div>
                        <div class="col-lg-4 col-12">
                          <select name="court_proceedings_id" onchange="courtProceeding();"
                          class="form-control" id="court_proceedings_id" @if($log->court_proceedings_id) @else @if(!$log->court_proceedings_write) required @endif @endif>
                          <option value="">select</option>
                          @foreach($court_proceedings as $row)
                          <option {{$log->court_proceedings_id == $row->id ? 'selected' : ''}} value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-lg-4 col-12">
                        <input id="court_proceedings_write" onkeyup="courtProceedingWrite();" type="text" class="form-control" name="court_proceedings_write" placeholder="Court Proceeding" value="{{$log->court_proceedings_write}}" @if($log->court_proceedings_write) @else @if(!$log->court_proceedings_id) required @endif @endif>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row ">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Court
                      Order</label>
                    </div>
                    <div class="col-lg-4 col-12">
                      <select name="updated_court_order_id" onchange="orderCourt();"
                      class="form-control" id="updated_court_order_id" @if($log->updated_court_order_id) @else @if(!$log->updated_court_order_write) required @endif @endif>
                      <option value="">select</option>
                      @foreach($court_orders as $row)
                      <option {{$log->updated_court_order_id == $row->id ? 'selected' : ''}} value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-lg-4 col-12">
                    <input onkeyup="orderCourtWrite();" id="updated_court_order_write" type="text" class="form-control" name="updated_court_order_write" placeholder="Court Order" value="{{$log->updated_court_order_write}}" @if($log->updated_court_order_write) @else @if(!$log->updated_court_order_id) required @endif @endif>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Next
                  Date</label>
                </div>
                <div class="col-lg-8 col-12">
                  <input type="date" class="form-control" id="updated_next_date" {{ $log->next_fixed_for && ($log->next_fixed_for->id =='95' || $log->next_fixed_for->id =='130') ? '':'required' }}   name="updated_next_date" value="{{$log->updated_next_date ? $log->updated_next_date->format('Y-m-d'):''}}">
                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row ">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Next Date
                Fixed For</label>
              </div>
              <div class="col-lg-4 col-12">
                <select onchange="courTransfer();" name="updated_index_fixed_for_id"
                class="form-control" id="updated_index_fixed_for_id">
                <option value="">select</option>
                @foreach($fixed_for as $row)
                <option {{$log->updated_index_fixed_for_id == $row->id ? 'selected' : ''}} value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-12">
              <input type="text" class="form-control" name="updated_index_fixed_for_write" placeholder="Next Date Fixed For" value="{{$log->updated_index_fixed_for_write}}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="row">
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Day
            Notes</label>
          </div>
          <div class="col-lg-4 col-12">
            <select name="updated_day_notes_id"
            class="form-control" id="updated_day_notes_id">
            <option value="">select</option>
            @foreach($day_notes as $row)
            <option {{$log->updated_day_notes_id == $row->id ? 'selected' : ''}} value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-lg-4 col-12">
          <input type="text" class="form-control" name="updated_day_notes_write" placeholder="Day Notes" value="{{$log->updated_day_notes_write}}">
        </div>
      </div>
    </div>
    <div class="col-12 mb-2">
      <div class="row">
        <div class="col-lg-4 col-12 ">
          <label for=""
          class="font-weight-bold text-info">Engaged
        Advocate</label>
      </div>
      <div class="col-lg-4 col-12">
        <select name="updated_engaged_advocate_id" onchange="engaged();"
        class="form-control" id="updated_engaged_advocate_id"  @if($log->updated_engaged_advocate_id) @else @if(!$log->updated_engaged_advocate_write) required @endif @endif>
        <option value="">select</option>
        @foreach($lawyers as $row)
        <option {{$log->updated_engaged_advocate_id == $row->id ? 'selected' : ''}} value="{{$row->id}}">{{$row->personal_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-lg-4 col-12">
      <input type="text" onkeyup="engagedWrite();" id="updated_engaged_advocate_write" class="form-control" name="updated_engaged_advocate_write" placeholder="Engaged Advocate" value="{{$log->updated_engaged_advocate_write}}" @if($log->updated_engaged_advocate_write) @else @if(!$log->updated_engaged_advocate_id) required @endif @endif>
    </div>
  </div>
</div>
<div class="col-12 mb-2">
  <div class="row ">
    <div class="col-lg-4 col-12 ">
      <label for=""
      class="font-weight-bold text-info">Next Day
    Presence</label>
  </div>
  <div class="col-lg-8 col-12">
    <select name="updated_next_day_presence_id"
    class="form-control" id="updated_next_day_presence_id">
    <option value="">select</option>
    @foreach($next_day_presence as $row)
    <option {{$log->updated_next_day_presence_id == $row->id ? 'selected' : ''}} value="{{$row->id}}">{{$row->name}}</option>
    @endforeach
  </select>
</div>
</div>
</div>
<div class="col-12 mb-2">
  <div class="row">
    <div class="col-lg-4 col-12 ">
      <label for=""
      class="font-weight-bold text-info">Steps To be
    taken next date</label>
  </div>
  <div class="col-lg-8 col-12">
    <textarea name="updated_remarks" id="updated_remarks" cols="30" rows="2"
    class="form-control new"  spellcheck="false">{{$log->updated_remarks}}</textarea>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<div class="bg-overlay"></div>
</div>

            </div>
            <div class="popup-footer">
  <div class="popup-footer-btn">
     <a href="{{ url()->previous() }}" class="btn btn-outline-secondary close-btn f-btn-c">close</a>
    <button type="submit" class="btn btn-info text-white f-btn float-right"><i
      class="fa-clipboard-check fa-fw fas"></i>
    Update</button>
  </div>
</div>


        </div>
        
    </div>
    
</div>

</form>

@section('script')
  <script>
     
      function courTransfer() {
            var court = $('#updated_index_fixed_for_id').val();
            if (court== 95 || court== 130) {
                $('#updated_next_date').attr('required',false);
            }else{
                $('#updated_next_date').attr('required',true);
            }
        }
        
        function fixedFor()
        {
            var fixedfor = $('#updated_fixed_for_id').val();
            
            if(fixedfor=='')
            {
                 $('#updated_fixed_for_write').attr('required',true);
                 
            }else{
                $('#updated_fixed_for_id').attr('required',false);
            }
            
        }
        
        function fixedForUpdate()
        {
         
            var fixedforwrite = $('#updated_fixed_for_write').val();
            
            if(fixedforwrite=='')
            {
                 $('#updated_fixed_for_id').attr('required',true);
            }else{
                $('#updated_fixed_for_write').attr('required',false);
            }
        }
        
        // court proceeding
        function courtProceeding()
        {
            var courtproceeding = $('#court_proceedings_id').val();
            
            if(courtproceeding=='')
            {
                 $('#court_proceedings_write').attr('required',true);
                 
            }else{
                $('#court_proceedings_id').attr('required',false);
                $('#court_proceedings_write').attr('required',false);
            }
            
        }
        
        function courtProceedingWrite()
        {
         
            var courtproceedingwrite = $('#court_proceedings_write').val();
            
            if(courtproceedingwrite=='')
            {
                 $('#court_proceedings_id').attr('required',true);
            }else{
                $('#court_proceedings_write').attr('required',false);
                $('#court_proceedings_id').attr('required',false);
            }
        }
        
        // order court
        function orderCourt()
        {
            var ordercourtid = $('#updated_court_order_id').val();
            
            if(ordercourtid=='')
            {
                 $('#updated_court_order_write').attr('required',true);
                 
            }else{
                $('#updated_court_order_id').attr('required',false);
                $('#updated_court_order_write').attr('required',false);
            }
            
        }
        
        function orderCourtWrite()
        {
         
            var courtwrite = $('#updated_court_order_write').val();
            
            if(courtwrite=='')
            {
                 $('#updated_court_order_id').attr('required',true);
            }else{
                $('#updated_court_order_write').attr('required',false);
                $('#updated_court_order_id').attr('required',false);
            }
        }
        
        // Engaged
        function engaged()
        {
            var engaged_id = $('#updated_engaged_advocate_id').val();
            
            if(engaged_id=='')
            {
                 $('#updated_engaged_advocate_write').attr('required',true);
                 
            }else{
                $('#updated_engaged_advocate_id').attr('required',false);
                $('#updated_engaged_advocate_write').attr('required',false);
            }
            
        }
        
        function engagedWrite()
        {
         
            var engaged_write = $('#updated_engaged_advocate_write').val();
            
            if(engaged_write=='')
            {
                 $('#updated_engaged_advocate_id').attr('required',true);
            }else{
                $('#updated_engaged_advocate_write').attr('required',false);
                $('#updated_engaged_advocate_id').attr('required',false);
            }
        }
        
        
     
  </script>

@endsection


@endsection