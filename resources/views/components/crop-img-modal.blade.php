<!-- Crop Image Modal -->
<div class="modal fade" id="crop-image-modal" tabindex="-1" aria-labelledby="crop-image-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label">
                    {{ app('googleTranslator', ['string' => 'Crop Your Image']) }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img src="" id="image" width="500px">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ app('googleTranslator', ['string' => 'Cancel']) }}
                </button>
                <button type="button" class="btn btn-primary standard-bg-color standard-border-color" onclick="cropImg()">
                    {{ app('googleTranslator', ['string' => 'Crop']) }}
                </button>
            </div>
        </div>
    </div>
</div>
