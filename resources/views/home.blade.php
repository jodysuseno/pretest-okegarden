@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Projects') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>   
                    @endif
                    @if (Auth::user()->role != "user")
                    <a href="{{ route('tambah') }}" class="btn btn-sm btn-primary">Tambah</a>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Project</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">Status</th>
                                @if (Auth::user()->role != "user")
                                    <th scope="col">Option</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $project->nama_project }}</td>
                                    <td>{{ $project->keterangan }}</td>
                                    <td>
                                        @if ($project->status == 1)
                                            Approved
                                        @else
                                            Disapproved
                                        @endif
                                    </td>
                                    @if (Auth::user()->role != "user")
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('edit', $project->id) }}">Edit</a>
                                            <form action="{{ route('destroy', $project->id) }}" onsubmit="return confirm('yakin untuk menghapus data ini?')" class="d-inline" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td>Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
