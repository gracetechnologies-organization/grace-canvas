<div class="modal fade show " id="not-loggedin-error-modal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                {{ session('login_error') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('login') }}" class="btn btn-primary">Go To Login</a>
            </div>
        </div>
    </div>
</div>
