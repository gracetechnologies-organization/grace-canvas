<div>
    @extends('livewire.user-dashboard.user-dashboard')
    @section('user-dashboard')
    <div class="row">
    <div class="card mb-4 custome-card-border">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
                <input type="hidden" name="id" value="">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <p>{{ $data->name }}</p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <p>{{ $data->email }}</p>
                    </div>
                </div>
        </div>
        <!-- /Account -->
    </div>
    </div>
    @endsection
</div>
