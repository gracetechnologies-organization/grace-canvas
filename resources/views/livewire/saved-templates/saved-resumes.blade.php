<div id="template-page">
    <style>
        .img-container {
            height: 500px;
            overflow: hidden;
        }

        .custom-border {
            border: 1px solid rgb(54, 54, 54);
        }

        .accordion-body {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }
    </style>
    <!-- Offcanvas for detail customization -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Only For Pro Users...!
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary standard-bg-color standard-border-color dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    Download Now
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">PDF</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>

    @include('components.crop-img-modal')

    <!-- Fixed buttons -->
    <div class="fixed-btn-container">
        @include('components.print-btn')
        {{-- @include('components.save-template-page-btn') --}}
    </div>

    <!-- Editing form & preview section -->
    <div class="container-fluid px-5 px-md-4 px-lg-5">
        <div class="row" id="form-and-template">
            {!! $SavedPageCode !!}
        </div>
    </div>

</div>