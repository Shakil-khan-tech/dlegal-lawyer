@extends('layouts.admin.layout')
@section('title')
<title></title>
@endsection
@section('admin-content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.evidence-type.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i>  Add Evidence Type </a></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Evidence Type </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="height: 30px">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Name Short</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                       @foreach($data as $item)
                       <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->name_short }}</td>
                        <td>
                            @if ($item->status==1)
                            <a href="" onclick="evidencetypeStatus({{ $item->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="active" data-off="inactive" data-onstyle="success" data-offstyle="danger"></a>
                            @else
                                <a href="" onclick="evidencetypeStatus({{ $item->id }})"><input type="checkbox" data-toggle="toggle" data-on="active" data-off="inactive" data-onstyle="success" data-offstyle="danger"></a>

                            @endif
                        
                        </td>
                        <td>{{ $item->created_at?->format('m-d-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.evidence-type.edit',$item->id) }}" ><i class="fas fa-edit"></i></a>
                            <a  href="{{ route('admin.evidence-type.show',$item->id) }}" class="mx-2" ><i class="fas fa-eye text-info"></i></a>
                            <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" onclick="deleteData({{ $item->id }})" ><i class="fas fa-trash text-danger   "></i></a>
                        </td>
                      
                        
                    </tr>
                       @endforeach
                        
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/evidence-type/") }}'+"/"+id)
        }

        function evidencetypeStatus(id){
            // project demo mode check
         var isDemo="{{ env('PROJECT_MODE') }}"
         var demoNotify="{{ env('NOTIFY_TEXT') }}"
         if(isDemo==0){
             toastr.error(demoNotify);
             return;
         }
         // end
            $.ajax({
                type:"get",
                url:"{{url('/admin/evidence-type-status/')}}"+"/"+id,
                success:function(response){
                   toastr.success(response)
                },
                error:function(err){
                    console.log(err);

                }
            })
        }
    </script>
  
@endsection
