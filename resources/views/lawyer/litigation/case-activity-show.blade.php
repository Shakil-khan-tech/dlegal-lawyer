@extends('layouts.lawyer.layout')
@section('title')
<title>View Cases Activity</title>
@endsection
@section('lawyer-content')

<form action="{{ route('lawyer.litigation.case.activity.store') }}" method="POST">
      @csrf
      {{--<input type="hidden" value="{{ $cases->id }}" name="cases_id">--}}
      
  <div class="card shadow mb-3 ">
    <div class="card-header_show py-2" style="margin-bottom: 0px !important;">
      <h4 style="color: #2c9faf;margin-bottom:0;padding-bottom:0;" class="font-weight-bold">View Case Activity Log</h4>
      <div id="accordion" class="accordion d-flex ">
        <button type="button" class="btn btn-primary btn-sm document-btn Click-here"
        data-toggle="modal" data-target="#working_documents_modal"
        data-placement="top"><i class="fas fa-recycle nav-icon"></i></button>
      </div>
    </div>
    
      <div class="custom-model-main p-4">
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
                          class="font-weight-bold text-info">
                        Date</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <input type="date" class="form-control" value="{{ \Carbon\Carbon::parse($activity->activity_date)->format('Y-m-d') }}"  name="activity_date">
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Activity/Action</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <textarea name="activity_action" id="activity_action" cols="30" rows="2"
                        class="form-control new"  spellcheck="false">{!! @$activity->activity_action !!}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Progress</label>
                      </div>
                      <div class="col-lg-8 col-12">
                        <textarea name="activity_progress" id="activity_progress" cols="30" rows="2"
                        class="form-control new"  spellcheck="false">{!! @$activity->activity_progress !!}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Mode</label>
                      </div>
                      <div class="col-lg-5 col-9">
                        <select name="activity_mode_id" id="activity_mode_id" class="form-control">
                          <option value="" disabled="" selected="">select</option>
                          <option value="1" {{ @$activity->activity_mode_id==1 ? 'selected':'' }}>Email</option>
                          <option value="2" {{ @$activity->activity_mode_id==2 ? 'selected':'' }}>Hard Copy</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-3">
                        <input type="text" class="form-control" value="{{ @$activity->activity_mode_write }}" name="activity_mode_write" placeholder="Mode">
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-lg-4 col-12 ">
                        <label for=""
                        class="font-weight-bold text-info">Start
                      Time</label>
                    </div>
                    <div class="col-lg-8 col-12">
                      <input type="datetime-local" value="{{ @$activity->start_time }}" class="form-control" name="start_time" placeholder="Type">
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="row">
                    <div class="col-lg-4 col-12 ">
                      <label for=""
                      class="font-weight-bold text-info">End
                    Time</label>
                  </div>
                  <div class="col-lg-8 col-12">
                    <input type="datetime-local" value="{{ @$activity->end_time }}" class="form-control" name="end_time" placeholder="Type">
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                  <div class="col-lg-4 col-12 ">
                    <label for=""
                    class="font-weight-bold text-info">Time
                  Spent</label>
                </div>
                <div class="col-lg-8 col-12">
                  <input readonly="" type="text" value="{{ @$activity->setup_hours }}" class="form-control" name="setup_hours" id="setup_hours" placeholder="">
                </div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="row">
                <div class="col-lg-4 col-12 ">
                  <label for=""
                  class="font-weight-bold text-info">Time
                Spent Manual</label>
              </div>
              <div class="col-lg-8 col-12">
                <input type="text" class="form-control" value="{{ @$activity->time_spend_manual }}" id="time_spend_manual" name="time_spend_manual">
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
                class="font-weight-bold text-info">Engaged</label>
              </div>
              <div class="col-lg-4 col-12">
                <select name="activity_engaged_id" class="form-control" id="activity_engaged_id">
                  <option value="" disabled="" selected="">select</option>
                  <option value="1" {{ @$activity->activity_engaged_id==1 ? 'selected':'' }}>Md. Johirul Islam</option>
                  <option value="2" {{ @$activity->activity_engaged_id==2 ? 'selected':'' }}>Md. Niamul Kabir</option>
                </select>
              </div>
              <div class="col-lg-4 col-12">
                <input type="text" class="form-control" value="{{ @$activity->activity_engaged_write }}" name="activity_engaged_write" id="activity_engaged_write" placeholder="Activity Engaged">
              </div>
            </div>
          </div>
          <div class="col-12 mb-2">
            <div class="row">
              <div class="col-lg-4 col-12 ">
                <label for=""
                class="font-weight-bold text-info">Forwarded
              To</label>
            </div>
            <div class="col-lg-4 col-12">
              <select name="activity_forwarded_to_id" class="form-control" id="activity_forwarded_to_id">
                <option value="" disabled="" selected="">select</option>
                <option value="1" {{ @$activity->activity_forwarded_to_id==1 ? 'selected':'' }}>Md. Johirul Islam</option>
                <option value="2" {{ @$activity->activity_forwarded_to_id==1 ? 'selected':'' }}>Md. Niamul Kabir</option>
              </select>
            </div>
            <div class="col-lg-4 col-12">
              <input type="text" class="form-control" value="{{ @$activity->activity_forwarded_to_write }}" name="activity_forwarded_to_write" id="activity_forwarded_to_write" placeholder="Forwarded To">
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row ">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Requirements</label>
            </div>
            <div class="col-lg-8 col-12">
              <textarea name="activity_requirements" id="activity_requirements" cols="30" rows="2" class="form-control">
                  {!! @$activity->activity_requirements !!}
              </textarea>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="row">
            <div class="col-lg-4 col-12 ">
              <label for=""
              class="font-weight-bold text-info">Note</label>
            </div>
            <div class="col-lg-8 col-12">
              <textarea name="activity_remarks" id="activity_remarks" cols="30" rows="2" class="form-control">
                  {!! @$activity->activity_remarks !!}
              </textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="popup-footer">
  <div class="popup-footer-btn">
    <a
    class="btn btn-outline-secondary close-btn f-btn" href="{{ route('lawyer.litigation.case.show',[$activity->cases_id,'activity'=>'true']) }}">close</a>
    <!--<button type="submit" class="btn btn-info text-white f-btn"><i-->
    <!--  class="fa-clipboard-check fa-fw fas"></i>-->
    <!--Save</button>-->
  </div>
</div>
</div>
</div>
<div class="bg-overlay"></div>
</div>
</div>
</form>

@section('script')
<script>
    $(document).ready(function(){
        $('textarea').each(function(){
            $(this).val($(this).val().trim());
        })
    })
</script>
@endsection

@endsection