<script>
    $(document).ready(function() {
        @if (session('not_subscribed_error'))
            $('#not-subscribed-error-modal').modal('show');
        @endif

        @if (session('subscription_message'))
            $('#subscription-message-modal').modal('show');
        @endif

        @if (session('subscription_success'))
            $('#subscription-success-modal').modal('show');
        @endif

        @if (session('subscription_error'))
        $('#subscription-error-modal').modal('show');
        @endif
    });

    // document.addEventListener("DOMContentLoaded", function() {
    //     if (performance.navigation.type === 1) {
    //         $('#template-saved-success-model').modal('show');
    //     } else {
    //         $('#template-saved-success-model').modal('hide');
    //     }
    // });
</script>
