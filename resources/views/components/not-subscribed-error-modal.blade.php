<div class="modal fade show madel" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                {{ session('not_subscribed_error') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('subscription') }}" class="btn btn-success">Continue</a>
            </div>
        </div>
    </div>
</div>