@extends('layouts.lawyer.layout')
@section('title')
<title>	</title>
@endsection
@section('lawyer-content')

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-body">

                <u class="text-info"><h3 class="pb-3 pt-3 font-weight-bold text-info">Create Task</h3></u>

                <div class="case-info-section section">
                    <div class="row pb-3">
                        <div class="col-md-12">
                            <form action="{{ route('lawyer.task.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="lawyer_id" value="{{auth()->guard('lawyer')->id()}}">
                                <div class="form-group row px-5">
                                    <label for="task_category_id" class="col-form-label font-weight-bold text-info">Task Category</label>
                                    <select name="task_category_id" class="form-control" id="task_category_id" required>
                                        <option selected disabled hidden value="">Select</option>
                                        <option value="Task">Task</option>
                                        <option value="Schedule">Schedule</option>
                                        <option value="Assignment">Assignment</option>
                                    </select>   
                                </div>
                                <div class="form-group row px-5">
                                    <label for="task_title" class="col-form-label font-weight-bold text-info">Task Title</label>
                                    <input type="text" class="form-control" name="task_title" value="{{ old('task_title') }}" placeholder="Type title">    
                                </div>
                                <div class="form-group row px-5">
                                    <label for="note" class="col-form-label font-weight-bold text-info">Note</label>
                                    <textarea name="note" id="note" class="form-control" placeholder="Type" aria-invalid="false" rows="5">{{ old('note') }}</textarea>    
                                </div>
                                <div class="form-group row px-5">
                                    <label for="status" class="col-form-label font-weight-bold text-info">Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option selected disabled hidden value="">Select</option>
                                        <option value="To Do">To Due</option>
                                        <option value="To Progress">To Progress</option>
                                        <option value="Due">Due</option>
                                        <option value="Completed">Completed</option>
                                    </select>   
                                </div>
                                <!-- <div class="form-group row px-5">
                                    <label for="status" class="col-form-label font-weight-bold text-info">Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option selected disabled hidden value="">Select</option>
                                        <option value=""></option>
                                    </select>   
                                </div> -->
                                <div class="form-group row px-5">
                                    <label for="date" class="col-form-label font-weight-bold text-info">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                                </div>
                                <div class="form-group row px-5">
                                    <label for="priority_id" class="col-form-label font-weight-bold text-info">Priority</label>
                                    <select name="priority_id" class="form-control" id="priority_id" required>
                                        <option selected disabled hidden value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Low">Low</option>
                                    </select>   
                                </div>
                                <div class="form-group row px-5">
                                    <label for="details" class="col-form-label font-weight-bold text-info">Details</label>
                                    <textarea name="details" id="details" class="form-control" placeholder="Type" aria-invalid="false" rows="5">{{ old('details') }}</textarea>    
                                </div>
                                <button type="submit" class="btn btn-secondary float-right mb-2 mt-3 px-4 mr-5"><i class="fa fa-file"></i> Save</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection