@extends('layouts.adm')

@section('content')
 <div class="col-12">
     <div class="bg-secondary rounded h-100 p-4">

         <div class="table-responsive">
             <table class="table">
                 <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">{{__('message.Name')}}</th>
                     <th scope="col">{{__('message.Email')}}</th>
                     <th scope="col">{{__('message.Role')}}</th>
                     <th scope="col">{{__('message.Status')}}</th>
                     <th scope="col">{{__('message.Edit')}}</th>

                 </tr>
                 </thead>
                 <tbody>
                 @for($i = 0; $i < count($users); $i++)
                     <tr>
                         <th scope="row">{{$i+1}}</th>
                         <td>{{$users[$i]->name}}</td>
                         <td>{{$users[$i]->email}}</td>
                         <td>{{$users[$i]->role->name}}</td>

                         <td>
                             @can('ban', $users)
                                 <form action="
                             @if($users[$i]->is_active)
                                 {{route('adm.users.ban', $users[$i]->id)}}
                             @else
                                 {{route('adm.users.unban', $users[$i]->id)}}
                             @endif" method="post">
                                     @csrf
                                     @method('PUT')
                                     <button class="btn {{$users[$i]->is_active ? 'btn-danger' :'btn-success'}}" type="submit">
                                         @if($users[$i]->is_active)
                                             Ban
                                         @else
                                             UnBan
                                         @endif
                                     </button>
                                 </form>
                             @endcan
                         </td>
                        @can('update', $users)
                             <td><a href="{{route('adm.users.edit',$users[$i]->id)}}" class="btn btn-warning">{{__('message.Edit')}}</a></td>
                         @endcan
                     </tr>
                 @endfor
                 </tbody>
             </table>
         </div>
     </div>
 </div>

 <!-- Table End -->
@endsection
