<div class="site-blocks-cover overlay" style="background-image: url('jobfinder/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
            <h1>Find Job</h1>
            <form action="{{ route('alljobs') }}" method="GET">
                @csrf
                <div class="row mb-3">
                <div class="col-md-9">
                    <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <input type="text" name="search" class="mr-3 form-control border-0 px-4" placeholder="Хүссэн үгээр хайх">
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="input-wrap">
                        <span class="icon icon-room"></span>
                        <input type="text" name="address" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="Хаяг">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                </div>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
