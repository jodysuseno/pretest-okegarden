@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Projects') }}</div>

                <div class="card-body">
                  <form action="{{ route('update', $project->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label for="nama_project" class="form-label">Nama Project</label>
                      <input name="nama_project" type="text" class="form-control @error('nama_project') is-invalid @enderror" value="{{ old('nama_project', $project->nama_project) }}" id="nama_project">
                      @error('nama_project')
                      <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}.
                      </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" cols="30" rows="3">{{ old('keterangan', $project->keterangan) }}</textarea>
                      @error('keterangan')
                      <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}.
                      </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">Status</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value=1 id="status1" {{ $project->status == 1 ? "checked" : "" }}>
                        <label class="form-check-label" for="status1">
                          Approval
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value=0 id="status2" {{ $project->status == 0 ? "checked" : "" }}>
                        <label class="form-check-label" for="status2">
                          Disapproval
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
