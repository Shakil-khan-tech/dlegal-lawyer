@extends('layouts.lawyer.layout')
@section('title')
<title>Schedule List</title>
@endsection
@section('style')
<style>
    .shadow {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
        margin-bottom: 10px;
    }
    .card-header-report {
        padding-bottom: 0px !important;
        padding-left: 1rem !important;

    }

    .card-header-report h3 {
        color: #36b9cc;
        width: max-content;
        border-bottom: 3px solid #36b9cc;
    }
    .task-custom{
        width: 60px;
        height: 30px;
        padding-top: 3px;
        border: 1px solid #d1d3e2 !important;
        margin: 0 5px;
    }
    .dataTables_length label{
        display:flex;
        line-height: 30px;
    }
    div.dataTables_wrapper div.dataTables_length label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
    }
    .dataTables_filter{
        text-align: right;
    }

    div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
    }
    .form-control-sm {
        height: calc(1.5em + 0.5rem + 2px);
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
        border: 1px solid #d1d3e2 !important;
    }
    .dataTables_filter{
        display:flex;
        justify-content: end;
    }
    .btn-info{
        width: 80px;
        height: 32px;
        margin-left: 10px;
        line-height: 20px;
    }
    .taskbox-one-head{
        color:#36b9cc;
        padding-bottom: 15px;
    }
    .taskbox-tow-head{
        color:#fcab8d;
        padding-bottom: 15px;
    }
    .taskbox-three-head{
        color:#f1bf23;
        padding-bottom: 15px;
    }
    .taskbox-four-head{
        color:#2aa645;
        padding-bottom: 15px;
    }
    .view{
      color:#36b9cc;   
  }
  .edit{
   color:#2aa645;  
}
.trash{
    color:red;
}
.taskbox{
    background:#36b9cc;
    width:6px;
    height:6px;
    margin-right: 4px;
    margin-top: 1px;
}
.taskbox-2{
    background:#fcab8d;
    width:6px;
    height:6px;
    margin-right: 4px;
    margin-top: 1px; 
}
.taskbox-3{
    background:#f1bf23;
    width:6px;
    height:6px;
    margin-right: 4px;
    margin-top: 1px; 
}
.taskbox-4{
    background:#2aa645;
    width:6px;
    height:6px;
    margin-right: 4px;
    margin-top: 1px; 
}
.taskbox-1{
    background:#fff;
    width:6px;
    height:6px;
    margin-right: 4px;
    margin-top: 1px;
}
.task-main{
    display: flex;
    justify-content: space-between;
}
.taskbox-dot{
    display: flex;
    line-height: 10px;
}
.taskbox-dot p{
    font-size: 13px;
    margin: 0;
    color: #000;
}
.date p{
    font-size: 13px;
    color: #000;
    line-height: 10px;
}
.taskbox-section{
    padding: 10px;
    padding-bottom: 0;
    border-bottom: 6px solid #36b9cc;
}
.taskbox-section-2nd{
    padding: 10px;
    padding-bottom: 0;
    border-bottom: 6px solid #fcab8d;

}
.taskbox-section-3rd{
    padding: 10px;
    padding-bottom: 0;
    border-bottom: 6px solid #f1bf23;

}
.taskbox-section-4th{
    padding: 10px;
    padding-bottom: 0;
    border-bottom: 6px solid #2aa645;

}
.icon{
    text-align: end; 
    font-size: 13px;
    padding-bottom: 10px;
}
.icon i{
   margin-left: 3px;
}
.main-box .col-md-12{
    padding-right:0;
}
@media(max-width:992px){
    div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        max-width: 135px;
    }
    label {
        display: flex;
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection
@section('lawyer-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header-report py-3">
                <div class="d-flex header-main">
                    <h3 class="font-weight-bold">Schedule List</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="">
                    @csrf

                    {{-- report info section --}}
                    <div class="case-info-section section">
                       <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="">
                                <label>Show 
                                    <select name="" aria-controls="" class="custom-select task-custom custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="" class="dataTables_filter">
                                <label>Search:
                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="">
                                </label>
                                <a href="{{ route('lawyer.task.assignment.create') }}" class="btn btn-info text-white">ADD</a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5 main-box">
                       <div class="col-md-3">
                           <h6 class="taskbox-one-head">To Do</h6>
                           <div class="row">
                               <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="taskbox-section">
                                        <div class="task-main">
                                            <div class="taskbox-dot">
                                                <div class="taskbox"></div>
                                                <p>To Read Company Law</p>
                                            </div>
                                            <div class="date">
                                                <p>30/03/23</p>
                                            </div>
                                        </div>
                                        <div class="icon"> 
                                            <i class="fas fa-fw fa-eye view"></i>
                                            <i class="fas fa-fw fa-edit edit"></i>
                                            <i class="fas fa-fw fa-trash-alt trash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="taskbox-section">
                                        <div class="task-main">
                                            <div class="taskbox-dot">
                                                <div class="taskbox-1"></div>
                                                <p>To Read Company Law</p>
                                            </div>
                                            <div class="date">
                                                <p>30/03/23</p>
                                            </div>
                                        </div>
                                        <div class="icon"> 
                                            <i class="fas fa-fw fa-eye view"></i>
                                            <i class="fas fa-fw fa-edit edit"></i>
                                            <i class="fas fa-fw fa-trash-alt trash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="taskbox-section">
                                        <div class="task-main">
                                            <div class="taskbox-dot">
                                                <div class="taskbox-1"></div>
                                                <p>To Read Company Law</p>
                                            </div>
                                            <div class="date">
                                                <p>30/03/23</p>
                                            </div>
                                        </div>
                                        <div class="icon"> 
                                            <i class="fas fa-fw fa-eye view"></i>
                                            <i class="fas fa-fw fa-edit edit"></i>
                                            <i class="fas fa-fw fa-trash-alt trash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="taskbox-section">
                                        <div class="task-main">
                                            <div class="taskbox-dot">
                                                <div class="taskbox-1"></div>
                                                <p>To Read Company Law</p>
                                            </div>
                                            <div class="date">
                                                <p>30/03/23</p>
                                            </div>
                                        </div>
                                        <div class="icon"> 
                                            <i class="fas fa-fw fa-eye view"></i>
                                            <i class="fas fa-fw fa-edit edit"></i>
                                            <i class="fas fa-fw fa-trash-alt trash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                     <h6 class="taskbox-tow-head">To Progress</h6>
                     <div class="row">
                       <div class="col-md-12">
                        <div class="card shadow">
                            <div class="taskbox-section-2nd">
                                <div class="task-main">
                                    <div class="taskbox-dot">
                                        <div class="taskbox-2"></div>
                                        <p>To Find Case File</p>
                                    </div>
                                    <div class="date">
                                        <p>30/03/23</p>
                                    </div>
                                </div>
                                <div class="icon"> 
                                    <i class="fas fa-fw fa-eye view"></i>
                                    <i class="fas fa-fw fa-edit edit"></i>
                                    <i class="fas fa-fw fa-trash-alt trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="taskbox-section-2nd">
                                <div class="task-main">
                                    <div class="taskbox-dot">
                                        <div class="taskbox-2"></div>
                                        <p>To Find Case File</p>
                                    </div>
                                    <div class="date">
                                        <p>30/03/23</p>
                                    </div>
                                </div>
                                <div class="icon"> 
                                    <i class="fas fa-fw fa-eye view"></i>
                                    <i class="fas fa-fw fa-edit edit"></i>
                                    <i class="fas fa-fw fa-trash-alt trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="taskbox-section-2nd">
                                <div class="task-main">
                                    <div class="taskbox-dot">
                                        <div class="taskbox-2"></div>
                                        <p>To Find Case File</p>
                                    </div>
                                    <div class="date">
                                        <p>30/03/23</p>
                                    </div>
                                </div>
                                <div class="icon"> 
                                    <i class="fas fa-fw fa-eye view"></i>
                                    <i class="fas fa-fw fa-edit edit"></i>
                                    <i class="fas fa-fw fa-trash-alt trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="taskbox-section-2nd">
                                <div class="task-main">
                                    <div class="taskbox-dot">
                                        <div class="taskbox-2"></div>
                                        <p>To Find Case File</p>
                                    </div>
                                    <div class="date">
                                        <p>30/03/23</p>
                                    </div>
                                </div>
                                <div class="icon"> 
                                    <i class="fas fa-fw fa-eye view"></i>
                                    <i class="fas fa-fw fa-edit edit"></i>
                                    <i class="fas fa-fw fa-trash-alt trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
             <h6 class="taskbox-three-head">Due</h6>
             <div class="row">
               <div class="col-md-12">
                <div class="card shadow">
                    <div class="taskbox-section-3rd">
                        <div class="task-main">
                            <div class="taskbox-dot">
                                <div class="taskbox-3"></div>
                                <p>To Read Company Law</p>
                            </div>
                            <div class="date">
                                <p>30/03/23</p>
                            </div>
                        </div>
                        <div class="icon"> 
                            <i class="fas fa-fw fa-eye view"></i>
                            <i class="fas fa-fw fa-edit edit"></i>
                            <i class="fas fa-fw fa-trash-alt trash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="taskbox-section-3rd">
                        <div class="task-main">
                            <div class="taskbox-dot">
                                <div class="taskbox-3"></div>
                                <p>To Read Company Law</p>
                            </div>
                            <div class="date">
                                <p>30/03/23</p>
                            </div>
                        </div>
                        <div class="icon"> 
                            <i class="fas fa-fw fa-eye view"></i>
                            <i class="fas fa-fw fa-edit edit"></i>
                            <i class="fas fa-fw fa-trash-alt trash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="taskbox-section-3rd">
                        <div class="task-main">
                            <div class="taskbox-dot">
                                <div class="taskbox-3"></div>
                                <p>To Read Company Law</p>
                            </div>
                            <div class="date">
                                <p>30/03/23</p>
                            </div>
                        </div>
                        <div class="icon"> 
                            <i class="fas fa-fw fa-eye view"></i>
                            <i class="fas fa-fw fa-edit edit"></i>
                            <i class="fas fa-fw fa-trash-alt trash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="taskbox-section-3rd">
                        <div class="task-main">
                            <div class="taskbox-dot">
                                <div class="taskbox-3"></div>
                                <p>To Read Company Law</p>
                            </div>
                            <div class="date">
                                <p>30/03/23</p>
                            </div>
                        </div>
                        <div class="icon"> 
                            <i class="fas fa-fw fa-eye view"></i>
                            <i class="fas fa-fw fa-edit edit"></i>
                            <i class="fas fa-fw fa-trash-alt trash"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
     <h6 class="taskbox-four-head">Completed</h6>
     <div class="row">
       <div class="col-md-12">
        <div class="card shadow">
            <div class="taskbox-section-4th">
                <div class="task-main">
                    <div class="taskbox-dot">
                        <div class="taskbox-4"></div>
                        <p>To Find Case File</p>
                    </div>
                    <div class="date">
                        <p>30/03/23</p>
                    </div>
                </div>
                <div class="icon"> 
                    <i class="fas fa-fw fa-eye view"></i>
                    <i class="fas fa-fw fa-edit edit"></i>
                    <i class="fas fa-fw fa-trash-alt trash"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow">
            <div class="taskbox-section-4th">
                <div class="task-main">
                    <div class="taskbox-dot">
                        <div class="taskbox-4"></div>
                        <p>To Find Case File</p>
                    </div>
                    <div class="date">
                        <p>30/03/23</p>
                    </div>
                </div>
                <div class="icon"> 
                    <i class="fas fa-fw fa-eye view"></i>
                    <i class="fas fa-fw fa-edit edit"></i>
                    <i class="fas fa-fw fa-trash-alt trash"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow">
            <div class="taskbox-section-4th">
                <div class="task-main">
                    <div class="taskbox-dot">
                        <div class="taskbox-4"></div>
                        <p>To Find Case File</p>
                    </div>
                    <div class="date">
                        <p>30/03/23</p>
                    </div>
                </div>
                <div class="icon"> 
                    <i class="fas fa-fw fa-eye view"></i>
                    <i class="fas fa-fw fa-edit edit"></i>
                    <i class="fas fa-fw fa-trash-alt trash"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow">
            <div class="taskbox-section-4th">
                <div class="task-main">
                    <div class="taskbox-dot">
                        <div class="taskbox-4"></div>
                        <p>To Find Case File</p>
                    </div>
                    <div class="date">
                        <p>30/03/23</p>
                    </div>
                </div>
                <div class="icon"> 
                    <i class="fas fa-fw fa-eye view"></i>
                    <i class="fas fa-fw fa-edit edit"></i>
                    <i class="fas fa-fw fa-trash-alt trash"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection