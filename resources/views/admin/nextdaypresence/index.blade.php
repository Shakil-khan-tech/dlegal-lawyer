@extends('layouts.admin.layout')
@section('title')
<title></title>
@endsection
@section('admin-content')
    <!-- Page Heading -->
    
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.next-day-presence.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i>  Add Next Day Presence </a></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Next Day Presence</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="height: 30px">
                            <th>Id</th>
                            <th>Next Day Presence</th>
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
                        <td>
                            @if ($item->status==1)
                            <a href="" onclick="presenceStatus({{ $item->id }})"><input type="checkbox" checked data-toggle="toggle" data-on="active" data-off="inactive" data-onstyle="success" data-offstyle="danger"></a>
                            @else
                                <a href="" onclick="presenceStatus({{ $item->id }})"><input type="checkbox" data-toggle="toggle" data-on="active" data-off="inactive" data-onstyle="success" data-offstyle="danger"></a>

                            @endif
                        
                        </td>
                        <td>{{ $item->created_at?->format('m-d-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.next-day-presence.edit',$item->id) }}" ><i class="fas fa-edit"></i></a>
                            <a  href="{{ route('admin.next-day-presence.show',$item->id) }}" class="mx-2" ><i class="fas fa-eye text-info"></i></a>
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
            $("#deleteForm").attr("action",'{{ url("admin/next-day-presence/") }}'+"/"+id)
        }

        function presenceStatus(id){
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
                url:"{{url('/admin/next-day-presence-status/')}}"+"/"+id,
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
