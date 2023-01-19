@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Username</th>
                            <th>Email</th>
                        </thead>
                        <tbody>
                           
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}} </td>
                                    <td>{{$user->email}} </td>
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    
                </div>
                @if ($users->hasPages())
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link --}}
                            @if ($users->onFirstPage())
                                <!-- <li class="page-item disabled"><span class="page-link">{{ __('Prev') }}</span></li> -->
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                            @else
                                <!-- <li><a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">{{ __('Prev') }}__</a></li> -->
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
                                </li>
                            @endif
                            
                            <!-- {{ "Page " . $users->currentPage() . "  of  " . $users->lastPage() }}
                        
                            {{-- Next Page Link --}} -->
                            <li class="page-item disabled">
                                <a class="page-link">{{ $users->currentPage()}}</a>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">{{ $users->lastPage()}}</a>
                                </li>
                            </li>
                            
                            @if ($users->hasMorePages())
                                <!-- <li><a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">{{ __('Next') }}</a></li> -->
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">Next</a>
                                </li>
                            @else
                                <!-- <li class="page-item disabled"><span>{{ __('Next') }}</span></li> -->
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection