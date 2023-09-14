<div>
    <div class="container mt-5 mb-5">
        <div>
            <p class="mb-5 text-center h2 standard-heading-css">Choose Your Perfect Plans</p>
        </div>
        <div class="mt-3 row">
            @foreach ($Plans as $Plan)
                <div class="col-lg-3 col-md-6 ">
                    <div class="card d-flex align-items-center justify-content-center">
                        <a href="{{ route('plan.checkout',['Plan' => $Plan]) }}" {{-- wire:click="selectPlan($Plan->id)" --}} class="nav-link">
                        <div class="ribon">
                            <span class="fas fa-spray-can"></span> </div>
                            <p class="h-1 pt-5">{{ $Plan->name }}</p> <span class="price"><span class="number">${{ number_format($Plan->price, 2) }}</span> </span>
                            <ul class="mb-5 list-unstyled text-muted">
                            <li><span class="fa fa-check me-2"></span>{{ $Plan->description }}</li>
                            {{--  <li><span class="fa fa-check me-2"></span>Vacuuming</li>
                            <li><span class="fa fa-check me-2"></span>Bathroom cleaning</li>
                            <li><span class="fa fa-check me-2"></span>Mirrow cleaning</li>
                           <li><span class="fa fa-check me-2"></span>Livingroom cleaning</li>  --}}
                           </ul>
                        <button class="btn btn-primary" wire:click.live="selectPlan({{ $Plan->id }})" wire:loading.attr="disabled">
                            <span wire:loading.remove wire.target.live="selectPlan({{ $Plan->id }})">Select</span>
                            <span wire:loading wire.target.live="selectPlan({{ $Plan->id }})"><div class="spinner-border text-danger"></div></span>
                        </button>


                        {{--  <div class="btn btn-primary" wire:loading wire:target="selectPlan({{ $Plan->id }})">
                            <span>Loding</span>
                                Select
                        </div>  --}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    .card {
        max-width: 250px;
        height: 380px;
        position: relative;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        color:black;
    }

    .h-1 {
        text-transform: uppercase
    }

    .ribon {
        position: absolute;
        left: 50%;
        top: 0;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background-color: #2b98f0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .ribon .fas.fa-spray-can,
    .ribon .fas.fa-broom,
    .ribon .fas.fa-shower,
    .ribon .fas.fa-infinity {
        font-size: 30px;
        color: rgb(255, 255, 255)
    }

    .card .price {
        color: #2b98f0;
        font-size: 30px
    }

    .card ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center
    }

    .card ul li {
        font-size: 12px;
        margin-bottom: 8px
    }

    .card ul .fa.fa-check {
        font-size: 8px;
        color: gold
    }

    .card:hover {
        background-color: #f0975b
    }

    .card:hover .fa.fa-check {
        color: #2b98f0
    }

    .card .btn {
        width: 200px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #2b98f0;
        border: none;
        border-radius: 0px;
        box-shadow: none
    }

    @media (max-width:500px) {
        .card {
            max-width: 100%
        }
    }
</style>
