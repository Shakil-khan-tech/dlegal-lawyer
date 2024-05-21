@extends('layouts.lawyer.layout')
@section('title')
<title>Subsequent Case Edit</title>
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

<form action="{{ route('lawyer.litigation.case.sequent.update',$sub->id) }}" method="POST">
@csrf
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-users text-primary"></i> Subsequent Case Edit</h4>
            </div>
        </div>
        <div class="col-6">
          <div class="form-group row"> <label for="new_case_infos_case_title_id"
              class="col-form-label font-weight-bold text-info col-md-4">Case Title (Full)</label>
            <div class="col-md-8"> 
              <select required name="case_infos_case_title_id" class="form-control select2"
                id="case_infos_case_title_id">
                <option selected disabled hidden>Select</option>
                 @foreach ($case_titles as $row) 
                <option {{$sub->case_infos_case_title_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option> 
                @endforeach
              </select> 
            </div>
          </div>

          <div class="form-group row"> <label for="law_id"
              class="col-form-label font-weight-bold text-info col-md-4">Law</label>
            <div class="col-md-8"> 
              <select name="law_id" class="form-control">
                <option selected disabled hidden>Select</option>
                @foreach ($case_laws as $row)
                 <option {{$sub->law_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }} </option> 
                  @endforeach
              </select> 
            </div>
          </div>
          <div class="form-group row">
            <label for="new_section_id" class="col-form-label font-weight-bold text-info col-md-4">Section</label>
            <div class="col-md-8">
              <select name="section_id" class="form-control" id="section_id">
              <option selected disabled hidden>Select</option>
                @foreach ($case_sections as $row)
                <option {{$sub->section_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-6">

          <div class="form-group row"> <label for="new_case_infos_case_no"
              class="col-form-label font-weight-bold text-info col-md-4">Case No</label>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6"> <input required type="number" class="form-control" name="case_infos_case_no"
                    value="{{$sub->case_infos_case_no}}" placeholder="Case No"> </div>
                <div class="col-md-6"> <input required type="number" class="form-control" name="case_infos_case_year"
                    value="{{$sub->case_infos_case_year}}" placeholder="Case Year"> </div>
              </div>
            </div>
          </div>

          <div class="form-group row"> <label for="case_filing_date"
              class="col-form-label font-weight-bold text-info col-md-4">Case Filing Date</label>
            <div class="col-md-8"> <input required type="date" id="case_filing_date" class="form-control"
                name="case_filing_date" value="{{$sub->case_filing_date->format('Y-m-d')}}"> </div>
          </div>

          <div class="form-group row"> <label for="new_court_id"
              class="col-form-label font-weight-bold text-info col-md-4">Court</label>
            <div class="col-md-8"> 
              <select name="court_id" class="form-control select2" id="court_id">
                <option selected disabled hidden>Select</option>
                 @foreach ($case_courts as $row) 
                 <option {{$sub->court_id == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }} </option>
                @endforeach
              </select>
             </div>
          </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-info text-white f-btn float-right"><i
              class="fa-clipboard-check fa-fw fas"></i>
            Update</button>
        </div>
      </div>
</form>


@endsection