<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\InteractsWithModel;
use App\Http\Controllers\Concerns\PaginatesQuery;
use App\Http\Controllers\Concerns\ParsesRequestParameters;
use App\Http\Controllers\Concerns\SortsQuery;
use App\Http\Controllers\Concerns\TransformsModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller {
    use AuthorizesRequests,
        InteractsWithModel,
        TransformsModel,
        PaginatesQuery,
        SortsQuery,
        ParsesRequestParameters;
}