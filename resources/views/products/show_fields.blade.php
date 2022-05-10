<div>
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">
                        <img src="{{ $product->product_image }}" alt="image" class="object-fit-cover"/>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <span
                                    class="text-gray-800 text-hover-primary fs-2 fw-bolder me-4">{{ $product->name }}</span>
                            </div>
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex overflow-auto h-55px">
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary me-6 active" data-bs-toggle="tab"
                           href="#aoverview">{{ __('messages.invoice.overview') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">{{ __('messages.invoice.overview') }}</h3>
                    </div>
                </div>
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">{{ __('messages.product.unit_price') }}</label>
                            <div class="col-lg-8">
                                <span
                                        class="fw-bolder fs-6 text-gray-800">{{ getCurrencySymbol() }}&nbsp;{{ !empty($product->unit_price) ? numberFormat($product->unit_price): 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">{{ __('messages.category.category') }}</label>
                            <div class="col-lg-8">
                                <span
                                        class="fw-bolder fs-6 text-gray-800 me-2">{{ !empty($product->category->name) ? $product->category->name: 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">{{ __('messages.product.code') }}</label>
                            <div class="col-lg-8">
                                <span
                                        class="fw-bolder fs-6 text-gray-800 me-2">{{ !empty($product->code) ? $product->code: 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">{{ __('messages.product.description') }}</label>
                            <div class="col-lg-8">
                                <span
                                        class="fw-bolder fs-6 text-gray-800 me-2">{{ !empty($product->description) ? $product->description: 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">{{ __('messages.common.last_update') }}</label>
                            <div class="col-lg-8">
                                <span
                                        class="fw-bolder fs-6 text-gray-800 me-2">{{ !empty($product->updated_at) ? $product->updated_at->diffForHumans(): 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
